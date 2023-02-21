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

    public function createStore(Request $request){

        $request->validate([
            'cif' => 'required|string|max:9|unique:insurances',
        ]);
        Insurance::create([
            'cif'=>request('cif'),
            'name'=>request('name'),
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


    public function editForm(Insurance $insurance){
        return view('admin.insurance.edit',
        [
            'insurance'=>$insurance
        ]);
    }

    public function editStore(Request $request, Insurance $insurance){

        $insurance->name=request('name');
        $insurance->address=request('address');
        $insurance->price_per_race=request('price_per_race');
        $insurance->save();

        return redirect()->route('insurance.list');
    }

    public function changeStatus(Insurance $insurance){
        
        $insurance->active = !$insurance->active;
        $insurance->save();

        return redirect()->route('insurance.list');
    }
}
