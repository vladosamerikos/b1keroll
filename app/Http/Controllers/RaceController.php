<?php

namespace App\Http\Controllers;

use App\Models\Race;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use ErrorException;


class RaceController extends Controller
{

    public function createForm(){
        return view('admin.race.create');
    }

    public function createStore(Request $request){

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
            'promotional_poster'=>$img_path,
            'price'=>request('price')
        ]);
        return redirect()->route('race.list');
    }


    public function list(){
        $races = Race::get();
        return view('admin.race.list',
        [
            'races'=>$races
        ]);
        
    }

    public function editForm(Race $race){
        return view('admin.race.edit',
        [
            'race'=>$race
        ]);
    }

    public function editStore(Request $request, Race $race){

        $request->validate([
            'promotional_poster' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10048',
        ]);

        if ($request->file('promotional_poster')){

            // Delete old img
            $file_path =storage_path().'/app/public/'.$race->promotional_poster;
            try{
                unlink($file_path);
            }catch (ErrorException $e){
                echo "La foto no existe";
            }

            // Update new img
            $img_path = $request->file('promotional_poster')->store('image/races', 'public');
            $race->promotional_poster = $img_path;
        }else{
            echo "</br> Foto anterior";
        }

        $race->name=request('name');
        $race->description=request('description');
        $race->unevenness=request('unevenness');
        $race->map_frame=request('map_frame');
        $race->number_of_competitors=request('number_of_competitors');
        $race->length=request('length');
        $race->start_date=request('start_date');
        $race->start_time=request('start_time');
        $race->start_point=request('start_point');
        $race->price=request('price');
        $race->save();

        return redirect()->route('race.list');
    }
}
