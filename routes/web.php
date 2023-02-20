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
    Route::get('/race/create', [App\Http\Controllers\RaceController::class, 'createRaceForm'])->name('race.create');
    Route::post('/race/store', [App\Http\Controllers\RaceController::class, 'createRaceStore'])->name('race.store');
    Route::get('/races', [App\Http\Controllers\RaceController::class, 'racesList'])->name('races.list');

    // Sponsor
    Route::get('/sposnor/create', [App\Http\Controllers\SponsorController::class, 'createSponsorForm'])->name('sponsor.create');
    Route::post('/sponsor/store', [App\Http\Controllers\SponsorController::class, 'createSponsorStore'])->name('sponsor.store');
    Route::get('/sponsors', [App\Http\Controllers\SponsorController::class, 'sponsorsList'])->name('sponsors.list');

    Route::get('/sponsor/edit/{id}', [App\Http\Controllers\SponsorController::class, 'editSponsorForm'])->name('sponsor.edit');
    Route::post('/sponsor/storeedit', [App\Http\Controllers\SponsorController::class, 'editSponsorStore'])->name('sponsor.storeedit');

    Route::get('/sponsor/update', [App\Http\Controllers\SponsorController::class, 'updateSponsorForm'])->name('sponsor.update');
    Route::post('/sponsor/storeupdate', [App\Http\Controllers\SponsorController::class, 'updateSponsorStore'])->name('sponsor.storeupdate');

    // Insurace
    Route::get('/insurance/create', [App\Http\Controllers\InsuranceController::class, 'createInsuranceForm'])->name('insurance.create');
    Route::post('/insurance/store', [App\Http\Controllers\InsuranceController::class, 'createInsuranceStore'])->name('insurance.store');
    Route::get('/insurances', [App\Http\Controllers\InsuranceController::class, 'insurancesList'])->name('insurances.list');

    Route::get('/insurance/edit/{id}', [App\Http\Controllers\InsuranceController::class, 'editInsuranceForm'])->name('insurance.edit');
    Route::post('/insurance/storeedit', [App\Http\Controllers\InsuranceController::class, 'editInsuranceStore'])->name('insurance.storeedit');

    Route::get('/insurance/update', [App\Http\Controllers\InsuranceController::class, 'updateInsuranceForm'])->name('insurance.update');
    Route::post('/insurance/storeupdate', [App\Http\Controllers\InsuranceController::class, 'updateInsuranceStore'])->name('insurance.storeupdate');

});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
