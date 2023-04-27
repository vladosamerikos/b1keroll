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
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use PDF;




class RaceController extends Controller
{

    // Admin part

    public function createForm(){
        return view('admin.race.create');
    }

    public function createStore(Request $request){

        $request->validate([
            'unevenness' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10048',
            'promotional_poster' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10048',
        ]);
        $img_path = $request->file('promotional_poster')->store('image/races', 'public');
        try {
            $id=Race::latest()->first()->id+1;
        } catch (\Throwable $th) {
            $id=1;
        }

        $image = $request->file('unevenness');
        $unevenessName = 'uneveness.'.$image->extension(); 
        $image->move(public_path('/storage/image/uneveness/'.$id),$unevenessName);

        $uneveness_path = 'uneveness/'.$id.'/'.$unevenessName;

        Race::create([
            'name'=>request('name'),
            'description'=>request('description'),
            'unevenness'=>$uneveness_path,
            'map_frame'=>request('map_frame'),
            'number_of_competitors'=>request('number_of_competitors'),
            'length'=>request('length'),
            'start_date'=>request('start_date'),
            'start_time'=>request('start_time'),
            'start_point'=>request('start_point'),
            'promotional_poster'=>$img_path,
            'price'=>request('price'),
            'sponsor_price'=>request('sponsor_price')
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
            'unevenness' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10048',
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

        if ($request->file('unevenness')){
            // Delete old img
            $uneven_path =storage_path().'/app/public/image/'.$race->unevenness;
            try{
                unlink($uneven_path);
            }catch (ErrorException $e){
                echo "La foto no existe";
            }

            // Update new img  
            $id = $race->id;
            $image = $request->file('unevenness');
            $unevenessName = 'uneveness.'.$image->extension(); 
            $image->move(public_path('/storage/image/uneveness/'.$id),$unevenessName);
            $uneveness_path = 'uneveness/'.$id.'/'.$unevenessName;


            $race->unevenness = $uneveness_path;
        }else{
            echo "</br> Uneveness anterior";
        }

        $race->name=request('name');
        $race->description=request('description');
        $race->map_frame=request('map_frame');
        $race->number_of_competitors=request('number_of_competitors');
        $race->length=request('length');
        $race->start_date=request('start_date');
        $race->start_time=request('start_time');
        $race->start_point=request('start_point');
        $race->sponsor_price=request('sponsor_price');
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

    public function delImage( Race $race, PhotosRace $image, Request $request){

        $path = public_path("storage/image/".$image->photo);
        $format_path = str_replace("/", "\\", $path);
        if (@unlink($format_path)) {
            echo"file exist and deleted";
            $image->delete();
        }else{
            echo"file dont exist";
        }
        return redirect()->route('race.uploadimages', ['race'=>$race]);
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

    public function listRunners (Race $race){
        $runners = $race->runners;
        return view('admin.race.listrunners', 
        [
            'runners'=>$runners,
            'race'=>$race
        ]);
    }

    public function stopTimer(Race $race, User $user)
    {
        $start=$race->start_time;
        $now=date("H:i:s");
        $elapse = (date("H:i:s", strtotime("00:00:00") + strtotime($now) - strtotime($start)));
        $user->races()->updateExistingPivot($race->id,['elapsed_time'=> $elapse]);
        return redirect()->route('race.listrunners', $race);
    }
    // TODO pass runner_number
    public function dorsalPage(Race $race, User $user)
    {
        $number=$race->runners()->where('user_id', $user->id)->first()->pivot->runner_number;
        $data = [
            'race' => $race,
            'user' =>$user,
            'number'=>$number,
        ];
        return view('admin.race.dorsalpage', $data);
    }
    // Todo
    public function downloadDorsal(Race $race, User $user)
    {
        $number=$race->runners()->where('user_id', $user->id)->first()->pivot->runner_number;
        $data = [
            'race' => $race,
            'user' =>$user,
            'number'=>$number,
        ];

        // $pdf = PDF::loadView('admin.race.dorsalpdf',$data)->setOptions(['defaultFont' => 'sans-serif']);
        // return $pdf->download('pdf_file.pdf');
        return view('admin.race.dorsalpdf',$data);

    }

    // General part
    
    public function mainPageList(){
        $races = Race::
            where('active',1)
            ->where('start_date' , '>=' , date('Y-m-d'))
            ->orderBy('start_date', 'asc')
            ->limit(4)
            ->get();
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


    public function getEmail(Race $race){

        return view('general.getemail',
        [
            'race'=>$race
        ]);
    }

    public function checkEmail(Race $race, Request $request){

        $user = User::where('email', $request->input('email'))->first();


        if ($user) {
            // Federado
            $insurances= $race->insurances;
            return view('general.getinsurance',
            [
                'race'=>$race,
                'user'=>$user,
                'insurances'=>$insurances
            ]);
        } else {
            echo "No federado";
            // No federado
            return redirect()->route('race.register', $race);
        }

    }

    public function showRegister(Race $race){

        return view('general.userregister',
        [
            'race'=>$race
        ]);
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
            'password' => Hash::make('123'),
        ]);
        
        $insurances= $race->insurances;
        
        return view('general.getinsurance',
        [
            'race'=>$race,
            'user'=>$user,
            'insurances'=>$insurances
        ]);

    }

    public function prePayment(Race $race, User $user){
        print $race->name;
        echo "<br>";
        print $user->name;
        echo "<br>";

        $insurance = request('insurance');
        print $insurance;
        // $lastnum= count($race->runners)+1;
        // $race->runners()->attach([$user->id => ['insurance_id' => $insurance, 'runner_number' => $lastnum, 'is_paid' => false]]);
        // print "Apuntado a la carrera";
    }

    public function showAll(){
        $races = Race::
            where('active',1)
            ->orderBy('start_date', 'asc')->get();
        return view('general.races',
        [
            'races'=>$races
        ]);
    }

    public function showUpcoming(){
        $races = Race::
            where('start_date', '>=',  date('Y-m-d'))
            ->orderBy('start_date', 'asc')
            ->get();
        return view('general.races',
        [
            'races'=>$races
        ]);
    }

    public function showDone(){
        $races = Race::
            where('start_date', '<=',  date('Y-m-d'))
            ->orderBy('start_date', 'asc')
            ->get();
        return view('general.races',
        [
            'races'=>$races
        ]);
    }

}
