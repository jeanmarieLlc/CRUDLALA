<?php

use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\WelcController;

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


Route::get('/',[WelcController::class,"index_home"])->name("accueil");


Route::get('/etudiant',[EtudiantController::class,"index"])->name("etudiant");
Route::get('/etudiant/create',[EtudiantController::class,"createview"])->name("etudiant.createview");
Route::get('/etudiant/{etudiant}',[EtudiantController::class,"edit"])->name("etudiant.edit");
Route::post('/etudiant/create',[EtudiantController::class,"ajouter"])->name("etudiant.ajouter");
Route::delete('/etudiant/{etudiant}',[EtudiantController::class,"delete"])->name("etudiant.supprimer");
Route::put('/etudiant/{etudiant}',[EtudiantController::class,"update"])->name("etudiant.modifier");
