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

    Route::get('/race/storestatus/{race}', [App\Http\Controllers\RaceController::class, 'changeStatus'])->name('race.storestatus');

    Route::get('/race/images/{race}', [App\Http\Controllers\RaceController::class, 'uploadImages'])->name('race.uploadimages'); 
    Route::post('/race/images/store/{race}', [App\Http\Controllers\RaceController::class, 'storeImages'])->name('race.storeimages');



    // Sponsor
    Route::get('/sponsor/create', [App\Http\Controllers\SponsorController::class, 'createForm'])->name('sponsor.create');
    Route::post('/sponsor/store', [App\Http\Controllers\SponsorController::class, 'createStore'])->name('sponsor.store');
    Route::get('/sponsors', [App\Http\Controllers\SponsorController::class, 'list'])->name('sponsor.list');

    Route::get('/sponsor/edit/{sponsor}', [App\Http\Controllers\SponsorController::class, 'editForm'])->name('sponsor.edit'); 
    Route::patch('/sponsor/storeedit/{sponsor}', [App\Http\Controllers\SponsorController::class, 'editStore'])->name('sponsor.storeedit');

    Route::get('/sponsor/sponsoring/{sponsor}', [App\Http\Controllers\SponsorController::class, 'sponsoringForm'])->name('sponsor.sponsoring');
    Route::patch('/sponsor/storesponsoring/{sponsor}', [App\Http\Controllers\SponsorController::class, 'storeSponsoring'])->name('sponsor.storesponsoring');

    Route::get('/sponsor/generate/invoice/{sponsor}', [App\Http\Controllers\SponsorController::class, 'generateInvoice'])->name('sponsor.generateinvoice');
    Route::get('/sponsor/generate/invoicepdf/{sponsor}', [App\Http\Controllers\SponsorController::class, 'generateInvoicePDF'])->name('sponsor.generateinvoicepdf');
    
    Route::get('/sponsor/storestatus/{sponsor}', [App\Http\Controllers\SponsorController::class, 'changeStatus'])->name('sponsor.storestatus');


    // Insurace
    Route::get('/insurance/create', [App\Http\Controllers\InsuranceController::class, 'createForm'])->name('insurance.create');
    Route::post('/insurance/store', [App\Http\Controllers\InsuranceController::class, 'createStore'])->name('insurance.store');
    Route::get('/insurances', [App\Http\Controllers\InsuranceController::class, 'list'])->name('insurance.list');

    Route::get('/insurance/edit/{insurance}', [App\Http\Controllers\InsuranceController::class, 'editForm'])->name('insurance.edit');
    Route::patch('/insurance/storeedit/{insurance}', [App\Http\Controllers\InsuranceController::class, 'editStore'])->name('insurance.storeedit');

    Route::get('/insurance/storestatus/{insurance}', [App\Http\Controllers\InsuranceController::class, 'changeStatus'])->name('insurance.storestatus');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');