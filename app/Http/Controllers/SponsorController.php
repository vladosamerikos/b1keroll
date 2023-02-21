<?php

namespace App\Http\Controllers;

use App\Models\Sponsor;
use App\Models\Race;
use App\Http\Controllers\Controller;
use ErrorException;
use Illuminate\Http\Request;

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

    public function sponsoringForm(Sponsor $sponsor){
        $races = Race::get();

        return view('admin.sponsor.sponsoring',
        [
            'races'=>$races,
            'sponsor'=>$sponsor
        ]);
    }

    public function storeSponsoring(Sponsor $sponsor){
        
    }

}
