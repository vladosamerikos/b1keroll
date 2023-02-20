<?php

namespace App\Http\Controllers;

use App\Models\Insurance;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InsuranceController extends Controller
{
    public function createForm(){
        return view('admin.insurance.create');
        
    }

    public function createStore(){

        Insurance::create([
            'cif'=>request('cif'),
            'name'=>request('name'),
            // 'logo'=>request('logo'),
            'address'=>request('address'),
            'price_per_race'=>request('price_per_race')
        ]);
        return redirect()->route('insurance.list');
    }

    public function list(){
        $insurances = Insurance::get();
        return view('admin.insurance.list',
        [
            'insurances'=>$insurances
        ]);
        
    }


    public function editForm(Insurance $id){
        return view('admin.insurance.edit',
        [
            'insurance'=>$id
        ]);
    }



}
