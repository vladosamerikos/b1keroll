<?php

namespace App\Http\Controllers;

use App\Models\Race;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RaceController extends Controller
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


    public function racesList(){
        $races = Race::get();
        return view('admin.racelist',
        [
            'races'=>$races
        ]);
        
    }


}
