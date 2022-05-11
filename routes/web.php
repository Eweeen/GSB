<?php

use App\Http\Controllers\ProfilController;
use App\Http\Controllers\PraticienController;
use App\Http\Controllers\CompteRenduController;
use App\Http\Controllers\ConnexionController;
use Illuminate\Support\Facades\Route;

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
    return view('home');
})->name('home');

Route::middleware(['auth'])->group(function(){
    Route::resource('/praticiens', PraticienController::class);
    Route::post('/praticiens/search', [PraticienController::class, 'search']);

    Route::resource('/profil', ProfilController::class);
    
    Route::resource('/comptes-rendus', CompteRenduController::class);
    Route::get('/comptes-rendus/downlaod-pdf/{id}', [CompteRenduController::class, 'download_pdf']);

    Route::get('/connexions', [ConnexionController::class, 'index'])->name('connexions');
    Route::post('/connexions', [ConnexionController::class, 'store'])->name('connexions.store');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
