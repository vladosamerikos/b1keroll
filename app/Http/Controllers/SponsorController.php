<?php

namespace App\Http\Controllers;

use App\Models\Sponsor;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SponsorController extends Controller
{
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
            'main_plain'=>request('main_plain')
        ]);
        return redirect()->route('sponsors.list');

    }

    public function sponsorsList(){
        $sponsors = Sponsor::get();
        return view('admin.sponsorlist',
        [
            'sponsors'=>$sponsors
        ]);
        
    }

    public function updateSponsor($id){
        $sponsors = Sponsor::where('sponsor','id')->first();
        
        return view('admin.editSponsor',
        [
            'sponsor'=>$sponsors
        ]);
    }


    
    public function editSponsorForm(Sponsor $id){
        return view('admin.editsponsor',
        [
            'sponsor'=>$id
        ]);
    }
    

}
