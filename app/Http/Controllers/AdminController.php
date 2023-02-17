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

    public function createRaceStore(){

        Race::create([
            'name'=>request('name'),
            'description'=>request('description'),
            'unevenness'=>request('unevenness'),
            // 'map_img',
            'number_of_competitors'=>request('number_of_competitors'),
            'length'=>request('length'),
            'start_date'=>request('start_date'),
            'start_time'=>request('start_time'),
            'start_point'=>request('start_point'),
            // 'promotional_poster',
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

        $tmpName = $_FILES['image']['tmp_name'];
        $mimeType = $_FILES['image']['type'];
        try {
            Sponsor::create([
                'cif'=>request('cif'),
                'name'=>request('name'),
                'logo'=>file_get_contents($tmpName),
                'logoType'=>$mimeType,
                'address'=>request('address'),
                'main_plain'=>request('main_plain'),
            ]);
        }catch (\Throwable $th){
            Sponsor::create([
                'cif'=>request('cif'),
                'name'=>request('name'),
                'logo'=>"null",
                'address'=>request('address'),
                'main_plain'=>request('main_plain')
            ]);
        }
        
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

    public function updateSponsor($id){
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
