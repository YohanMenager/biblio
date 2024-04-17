<?php

use App\Http\Controllers\AuteurController;
use App\Http\Controllers\EditeurController;
use App\Http\Controllers\OuvrageController;
use App\Http\Controllers\ReservationController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Accueil
Route::get('/', function () {
    return view('accueil');
})->name('accueil');

// Ouvrages
Route::resource('/ouvrages', OuvrageController::class);

// Auteurs
Route::resource('/auteurs', AuteurController::class);

// Editeurs
Route::resource('/editeurs', EditeurController::class);

// Réservations
Route::resource('/reservations', ReservationController::class);



//route pour tester la connexion à la base de données
Route::get('/testbd', function () {
    return view('testBD');
});
//test retour données
Route::get('/uti', function () {
    return App\Models\Utilisateur::all();
});

//page de gestion des réservations
//Route::get('/reservations', [\App\Http\Controllers\ReservationController::class, 'index']);
//formulaire de création de réservation
Route::get('/reservations-create-form', [\App\Http\Controllers\formCreateReservationController::class, 'index']);
//créé la réservation du formulaire puis redirige sur la page réservations
Route::post('/reservations-create', [\App\Http\Controllers\ReservationController::class, 'create']);
//formulaire de modification de réservation
Route::get('/reservations-modify-form/{id}', [\App\Http\Controllers\formModifyReservationController::class, 'index']);
//modifie la réservation du formulaire puis redirige sur la page réservations
Route::post('/reservation-modify', [\App\Http\Controllers\ReservationController::class, 'update']);
//supprime une réservation
Route::get('/reservations-delete/{id}', [\App\Http\Controllers\ReservationController::class, 'destroy'])->name('reservation.delete');

//test table pivot
Route::get('/genre', function () {
    return App\Models\Ouvrage::find(1)->genres()->get();
});
