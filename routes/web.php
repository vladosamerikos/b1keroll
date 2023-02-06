<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/admin/race/create', [App\Http\Controllers\AdminController::class, 'createRaceForm'])->name('race.create');
Route::post('/admin/race/store', [App\Http\Controllers\AdminController::class, 'createRaceStore'])->name('race.store');

Route::get('/admin/sposnor/create', [App\Http\Controllers\AdminController::class, 'createSponsorForm'])->name('sponsor.create');
Route::post('/admin/sponsor/store', [App\Http\Controllers\AdminController::class, 'createSponsorStore'])->name('sponsor.store');

Route::get('/admin/insurance/create', [App\Http\Controllers\AdminController::class, 'createInsuranceForm'])->name('insurance.create');
Route::post('/admin/insurance/store', [App\Http\Controllers\AdminController::class, 'createInsuranceStore'])->name('insurance.store');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
