<?php

namespace App\Http\Controllers;

use App\Models\Race;
use App\Models\Sponsor;
use App\Models\Insurance;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function createRaceForm(){
        return view('admin.raceform');
    }

    public function createRaceStore(Request $request){

        $request->validate([
            'promotional_poster' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10048',
        ]);
        $img_path = $request->file('promotional_poster')->store('image/races', 'public');
        Race::create([
            'name'=>request('name'),
            'description'=>request('description'),
            'unevenness'=>request('unevenness'),
            'map_frame'=>request('map_frame'),
            'number_of_competitors'=>request('number_of_competitors'),
            'length'=>request('length'),
            'start_date'=>request('start_date'),
            'start_time'=>request('start_time'),
            'start_point'=>request('start_point'),
            'promotional_poster'=>request('img_path'),
            'price'=>request('price')
        ]);

    }

    public function createSponsorForm(){
        return view('admin.sponsorform');
        
    }

    public function createSponsorStore(Request $request){

        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10048',
        ]);

        $img_path = $request->file('image')->store('image/sponsors', 'public');

        Sponsor::create([
            'cif'=>request('cif'),
            'name'=>request('name'),
            'logo'=>$img_path,
            'address'=>request('address'),
            'main_plain'=>request('main_plain'),
            'visibility'=>request('visibility')
        ]);
        return redirect()->route('sponsors.list');

    }

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

    public function sponsorsList(){
        $sponsors = Sponsor::get();
        return view('admin.sponsorlist',
        [
            'sponsors'=>$sponsors
        ]);
        
    }

    public function editInsuranceForm(Insurance $id){
        return view('admin.editinsurance',
        [
            'insurance'=>$id
        ]);
    }

    public function updateInsurance($id){
        $insurances = Insurances::where('insurance','id')->first();
        
        return view('admin.editInsurance',
        [
            'insurance'=>$insurances
        ]);
    }

    public function editSponsorForm(Sponsor $id){
        return view('admin.editsponsor',
        [
            'sponsor'=>$id
        ]);
    }

    public function updateSponsorForm($id){
        $sponsors = Sponsors::where('sponsor','id')->first();
        
        return view('admin.editSponsor',
        [
            'sponsor'=>$sponsors
        ]);
    }
    
    public function racesList(){
        $races = Race::get();
        return view('admin.racelist',
        [
            'races'=>$races
        ]);
        
    }

    

}
