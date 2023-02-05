<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function createRaceForm(){
        return view('admin.raceform');
    }

    public function createRaceAction(){

    }


}
