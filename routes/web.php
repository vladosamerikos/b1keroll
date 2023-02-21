<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use PHPUnit\TextUI\XmlConfiguration\Group;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function() {
    // Race
    Route::get('/race/create', [App\Http\Controllers\RaceController::class, 'createForm'])->name('race.create');
    Route::post('/race/store', [App\Http\Controllers\RaceController::class, 'createStore'])->name('race.store');
    Route::get('/races', [App\Http\Controllers\RaceController::class, 'list'])->name('race.list');

    Route::get('/race/edit/{race}', [App\Http\Controllers\RaceController::class, 'editForm'])->name('race.edit'); 
    Route::patch('/race/storeedit/{race}', [App\Http\Controllers\RaceController::class, 'editStore'])->name('race.storeedit');

    // Sponsor
    Route::get('/sposnor/create', [App\Http\Controllers\SponsorController::class, 'createForm'])->name('sponsor.create');
    Route::post('/sponsor/store', [App\Http\Controllers\SponsorController::class, 'createStore'])->name('sponsor.store');
    Route::get('/sponsors', [App\Http\Controllers\SponsorController::class, 'list'])->name('sponsor.list');

    Route::get('/sponsor/edit/{sponsor}', [App\Http\Controllers\SponsorController::class, 'editForm'])->name('sponsor.edit'); 
    Route::patch('/sponsor/storeedit/{sponsor}', [App\Http\Controllers\SponsorController::class, 'editStore'])->name('sponsor.storeedit');
    Route::get('/sponsor/sponsoring/{sponsor}', [App\Http\Controllers\SponsorController::class, 'sponsoringForm'])->name('sponsor.sponsoring');


    // Insurace
    Route::get('/insurance/create', [App\Http\Controllers\InsuranceController::class, 'createForm'])->name('insurance.create');
    Route::post('/insurance/store', [App\Http\Controllers\InsuranceController::class, 'createStore'])->name('insurance.store');
    Route::get('/insurances', [App\Http\Controllers\InsuranceController::class, 'list'])->name('insurance.list');

    Route::get('/insurance/edit/{insurance}', [App\Http\Controllers\InsuranceController::class, 'editForm'])->name('insurance.edit');
    Route::patch('/insurance/storeedit/{insurance}', [App\Http\Controllers\InsuranceController::class, 'editStore'])->name('insurance.storeedit');

});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
