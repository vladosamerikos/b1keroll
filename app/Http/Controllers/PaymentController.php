<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Race;
use App\Models\Insurance;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Omnipay\Omnipay;
use Illuminate\Support\Str;
use PhpParser\Node\Stmt\TryCatch;
use Illuminate\Support\Facades\DB;
class PaymentController extends Controller
{
    private $gateway;

    public function __construct() {
        $this->gateway = Omnipay::create('PayPal_Rest');
        $this->gateway->setClientId(env('PAYPAL_CLIENT_ID'));
        $this->gateway->setSecret(env('PAYPAL_CLIENT_SECRET'));
        $this->gateway->setTestMode(true);
    }

    public function pay(Request $request)
    {
        $userId = $request->input('user_id');
        
        $raceId = $request->input('race_id');
        $race = Race::find($raceId);
        $insuranceId = $request->input('insurance_id');
        $insurance = Insurance::find($insuranceId);

        $amount =$insurance->price_per_race + $race->price;

        // Comprobar si el usuario ya está inscrito en la carrera
        $isAlreadyRegistered = DB::table('runner_number')
                                ->where('user_id', $userId)
                                ->where('race_id', $raceId)
                                ->exists();

        // Si el usuario ya está inscrito, mostrar un mensaje de error y redireccionar a la página de detalles de la carrera
        if ($isAlreadyRegistered) {
            return redirect()->route('race.details', $raceId)->with('error', 'Ya estás registrado en esta carrera.');
        }


        $token = Str::random(32); 

        DB::table('transactions')->insert([
            'token' => $token,
            'user_id' => $userId,
            'race_id' => $raceId,
            'insurance_id' => $insuranceId,
            'amount' => $amount,
            'is_paid' => false,
        ]);

        try {

            $response = $this->gateway->purchase(array(
                'amount' => $amount,
                'currency' => env('PAYPAL_CURRENCY'),
                'returnUrl' => url('/paypal/success').'?posttoken='.$token,
                'cancelUrl' => url('/paypal/error')
            ))->send();


            if ($response->isRedirect()) {
                $response->redirect();
            }
            else{
                return $response->getMessage();
            }



        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function success(Request $request)
    {
        if ($request->input('paymentId') && $request->input('PayerID') ) {
            $transaction = $this->gateway->completePurchase(array(
                'payer_id' => $request->input('PayerID'),
                'transactionReference' => $request->input('paymentId')
            ));

            $response = $transaction->send();

            if($response->isSuccessful()){
                
                $token = $request->query('posttoken');
                $postransaction = DB::table('transactions')->where('token', $token)->first();
                $postransaction->is_paid = 1;
                $userId = $postransaction->user_id;
                $insuranceId = $postransaction->insurance_id;
                $raceId = $postransaction->race_id;
                $race = Race::find($raceId);

                // Obtener el último número de dorsal utilizado para esta carrera
                $lastDorsal = DB::table('runner_number')
                                ->where('race_id', $raceId)
                                ->max('runner_number');

                // Si no se ha utilizado ningún número de dorsal todavía, el valor será NULL
                if (is_null($lastDorsal)) {
                    $nextDorsal = 1;
                } else {
                // Sumar uno al último número de dorsal utilizado para obtener el siguiente número disponible
                    $nextDorsal = $lastDorsal + 1;
                }

                $race->runners()->attach([$userId => ['insurance_id' => $insuranceId, 'runner_number' =>$nextDorsal, 'is_paid' => true]]);

                // tratar datos
                $arr = $response->getData();
                if (!$postransaction) {
                    return "Error al tratar postransaction token : ".$token;
                }

                return redirect()->route('race.details', $raceId)->with('success', '¡Te has registrado correctamente en esta carrera!');

                return "Payment is Successfull. Your Transaction Id is : " . $arr['id']." Token: ".$token;
            }
            else{
                return $response->getMessage();
            }
        }
        else{
            return 'Payment declined!!';
        }
    }

    public function error()
    {
        return 'User decline the payment!';
    }

}
