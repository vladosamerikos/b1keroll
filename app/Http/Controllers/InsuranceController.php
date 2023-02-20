<?php

namespace App\Http\Controllers;

use App\Models\Insurance;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InsuranceController extends Controller
{
    public function createInsuranceForm(){
        return view('admin.insuranceform');
        
    }

    public function createInsuranceStore(){

        Insurance::create([
            'cif'=>request('cif'),
            'name'=>request('name'),
            // 'logo'=>request('logo'),
            'address'=>request('address'),
            'price_per_race'=>request('price_per_race')
        ]);

    }

    public function insurancesList(){
        $insurances = Insurance::get();
        return view('admin.insurancelist',
        [
            'insurances'=>$insurances
        ]);
        
    }

  

    public function editInsuranceForm(Insurance $id){
        return view('admin.editinsurance',
        [
            'insurance'=>$id
        ]);
    }

    public function updateInsurance($id){
        $insurances = Insurance::where('insurance','id')->first();
        
        return view('admin.editInsurance',
        [
            'insurance'=>$insurances
        ]);
    }





}
