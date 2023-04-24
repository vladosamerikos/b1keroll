<?php

namespace App\Http\Controllers;

use App\Models\Sponsor;
use App\Models\Race;
use App\Http\Controllers\Controller;
use ErrorException;
use Illuminate\Http\Request;
use PDF;

class SponsorController extends Controller
{
    public function createForm(){
        return view('admin.sponsor.create');
        
    }

    public function createStore(Request $request){

        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10048',
            'cif' => 'required|string|max:9|unique:sponsors',
        ]);

        $img_path = $request->file('image')->store('image/sponsors', 'public');

        Sponsor::create([
            'cif'=>request('cif'),
            'name'=>request('name'),
            'logo'=>$img_path,
            'address'=>request('address'),
            'main_plain'=>request('main_plain')
        ]);
        return redirect()->route('sponsor.list');

    }

    public function list(){
        $sponsors = Sponsor::get();
        return view('admin.sponsor.list',
        [
            'sponsors'=>$sponsors
        ]);
        
    }

    public function editForm(Sponsor $sponsor){
        return view('admin.sponsor.edit',
        [
            'sponsor'=>$sponsor
        ]);
    }


    public function editStore(Request $request, Sponsor $sponsor){

        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10048',
        ]);

        if ($request->file('image')){

            // Delete old img
            $file_path =storage_path().'/app/public/'.$sponsor->logo;
            try{
                unlink($file_path);
            }catch (ErrorException $e){
                echo "La foto no existe";
            }

            // Update new img
            $img_path = $request->file('image')->store('image/sponsors', 'public');
            $sponsor->logo = $img_path;
        }else{
            echo "</br> No hay foto";
        }
        
        $sponsor->cif = request('cif');
        $sponsor->name = request('name');
        $sponsor->address = request('address');
        $sponsor->main_plain = request('main_plain');
        $sponsor->save();

        return redirect()->route('sponsor.list');
    }

    public function changeStatus(Sponsor $sponsor){
        
        $sponsor->active = !$sponsor->active;
        $sponsor->save();

        return redirect()->route('sponsor.list');
    }

    public function sponsoringForm(Sponsor $sponsor){
        $races = Race::where('active',1)->get();
        
        $actual= $sponsor->races;
        $selected = [];
        foreach ($actual as $race){
           array_push($selected,$race->id);
        }

        return view('admin.sponsor.sponsoringform',
        [
            'races'=>$races,
            'sponsor'=>$sponsor,
            'selected'=>$selected
        ]);
    }

    public function storeSponsoring(Request $request, Sponsor $sponsor){
    
        $sponsor->races()->sync(request('races'));
        return redirect()->route('sponsor.list');
        
    }

    public function generateInvoice(Sponsor $sponsor)
    {
        $races=$sponsor->races;

        $subtotal= 0;
        foreach($races as $race){
            $subtotal+=$race['sponsor_price'];
        }
        # Coste del plano principal
        if ($sponsor->main_plain == 1){
            $subtotal +=200;
        }
        $total = $subtotal*1.21;

        $data = [
            'sponsor' => $sponsor,
            'races' =>$races,
            'subtotal' =>$subtotal,
            'total' =>$total,
        ];
        return view('admin.sponsor.invoice',$data);
    }

    public function generateInvoicePDF(Sponsor $sponsor)
    {
        $races=$sponsor->races;
        $subtotal= 0;
        foreach($races as $race){
            $subtotal+=$race['sponsor_price'];
        }
        # Coste del plano principal
        if ($sponsor->main_plain == 1){
            $subtotal +=200;
        }
        $total = $subtotal*1.21;
        $data = [
            'sponsor' => $sponsor,
            'races' =>$races,
            'subtotal' =>$subtotal,
            'total' =>$total,
        ];
        $pdf = PDF::loadView('admin.sponsor.invoicePDF',$data)->setOptions(['defaultFont' => 'sans-serif', 'isRemoteEnabled' => true]);
        return $pdf->download('pdf_file.pdf');
        // return view('admin.sponsor.invoicePDF',$data);
    }

}
