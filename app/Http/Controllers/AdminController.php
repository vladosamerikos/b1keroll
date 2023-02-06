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

    public function createSponsorStore(){

        Sponsor::create([
            'cif'=>request('cif'),
            'name'=>request('name'),
            // 'logo'=>request('logo'),
            'address'=>request('address'),
            'price_per_race'=>request('price_per_race')
        ]);

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





}
