<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Race;
use App\Models\Insurance;
use App\Models\PhotosRace;
use App\Http\Controllers\Controller;
use App\Models\Sponsor;
use Illuminate\Http\Request;
use ErrorException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;



class RaceController extends Controller
{

    // Admin part

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


    public function changeStatus(Race $race){
        
        $race->active = !$race->active;
        $race->save();

        return redirect()->route('race.list');
    }

    public function uploadImages(Race $race){

        $photosRace = PhotosRace::where('race_id',$race->id)->get();

        return view('admin.race.uploadimages',
        [
            'race'=>$race,
            'photos'=>$photosRace
        ]);
    }

    public function storeImages(Race $race, Request $request){

        $folder = $race->id;

        $image = $request->file('file');


        $imageName = time().rand(1, 999).'.'.$image->extension(); 
        $image->move(public_path('/storage/image/race_album/'.$folder),$imageName);
        $photosRace = new PhotosRace;
        $photosRace->race_id = $race->id;
        $photosRace->photo = 'race_album/'.$race->id.'/'.$imageName;
        $photosRace->save();
        return response()->json(['success'=>$imageName]);
    }

    public function editInsurances(Race $race){
        $insurances = Insurance::where('active',1)->get();
        $actual= $race->insurances;
        $selected = [];
        foreach ($actual as $insurance){
           array_push($selected,$insurance->id);
        }

        return view('admin.race.editinsurances',
        [
            'race'=>$race,
            'insurances'=>$insurances,
            'selected'=>$selected,
        ]);

    }

    public function storeInsurances(Race $race){
        $race->insurances()->sync(request('insurances'));
        return redirect()->route('race.list');
    }



    // General part
    
    public function mainPageList(){
        $races = Race::get();
        return view('welcome',
        [
            'races'=>$races
        ]);
    }

    public function showRaceDetails(Race $race){
        return view('general.race',
        [
            'race'=>$race
        ]);
    }


    public function showRegister(Race $race){

        if (Auth::check()) {
            $insurances= $race->insurances;
            return view('general.registerrace',
            [
                'race'=>$race,
                'insurances'=>$insurances
            ]);
            echo('logined');
        }else{
            return view('general.registeruserrace',
            [
                'race'=>$race
            ]);
        }
    }

    public function userRegister(Race $race, Request $request){

        $this->validate($request, [
            'name' => 'required|string|max:255',
            'sex' => 'required|string|max:255',
            'address' => 'required|string|max:400',
            'birth_date' => 'required|date',
            'skill' => 'required|string',
            'dni' => 'required|string|max:9|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:3|confirmed',
        ]);

        $data = $request->all();

        $now = date("Y-m-d");
        $user = User::create([
            'name' => $data['name'],
            'age' =>  date_diff(date_create($data['birth_date']), date_create($now))->format('%y'),
            'sex' => $data['sex'],
            'address' => $data['address'],
            'birth_date' => $data['birth_date'],
            'skill' => $data['skill'],
            'dni' => $data['dni'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
        
        Auth::login($user);

        return redirect()->route('race.register',$race);
    }


}
