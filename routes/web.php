<?php

use App\Http\Controllers\AbonnementController;
use App\Http\Controllers\AuteurController;
use App\Http\Controllers\EditeurController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\OuvrageController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ConnexionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Type_abonnementController;
use App\Http\Controllers\EmpruntController;

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
Route::get('/test-email', function () {
    try {
        Mail::raw('This is a test email.', function ($message) {
            $message->to('yohanmenager@gmx.fr')
                    ->subject('Test Email');
        });

        return 'Email sent successfully';
    } catch (\Exception $e) {
        return 'Failed to send email: ' . $e->getMessage();
    }
});
// Authentification
Route::group(['middleware' => 'guest'], function() {
    Route::get('/register', [ConnexionController::class, 'register'])->name('register');
    Route::post('/register', [ConnexionController::class, 'store'])->name('store');
    Route::get('/login', [ConnexionController::class, 'login'])->name('login');
    Route::post('/login', [ConnexionController::class, 'authenticate'])->name('authenticate');
});
Route::post('/logout', [ConnexionController::class, 'logout'])->name('logout');

// Route de base
Route::get('/', function () {
    return view('home');
})->name('home');

// Routes administrateur (utilisant la Gate 'admin')
Route::middleware(['auth', 'can:admin'])->prefix('/admin')->group(function () {

    Route::get('/test-email', function () {
        try {
            Mail::raw('This is a test email.', function ($message) {
                $message->to('yohanmenager@gmx.fr')
                        ->subject('Test Email');
            });
    
            return 'Email sent successfully';
        } catch (\Exception $e) {
            return 'Failed to send email: ' . $e->getMessage();
        }
    });
    Route::get('/', function() {
        return redirect()->route('dashboard');
    });

    // Dashboard
    Route::get('/dashboard', function() {
        return view('admin.dashboard');
    })->name('dashboard');

    // Auteurs
    Route::resource('/auteurs', AuteurController::class);

    // Abonnements
    Route::resource('/abonnements', AbonnementController::class);

    // Editeurs
    Route::resource('/editeurs', EditeurController::class);

    // Genres
    Route::resource('/genres', GenreController::class);

    // Ouvrages
    Route::resource('/ouvrages', OuvrageController::class);

    // Type Abonnements
    Route::resource('/type_abonnements', Type_abonnementController::class);

    //page de gestion des réservations
    Route::get('/reservations', [\App\Http\Controllers\ReservationController::class, 'index']);
    //formulaire de création de réservation
    Route::get('/reservations-create-form', [\App\Http\Controllers\formCreateReservationController::class, 'index']);
    //créé la réservation du formulaire puis redirige sur la page réservations
    Route::post('/reservations-create', [\App\Http\Controllers\ReservationController::class, 'create']);
    //formulaire de modification de réservation
    Route::get('/reservations-modify-form/{id}', [\App\Http\Controllers\formModifyReservationController::class, 'index']);
    //modifie la réservation du formulaire puis redirige sur la page réservations
    Route::post('/reservation-modify', [\App\Http\Controllers\ReservationController::class, 'update']);

    //envoi de mail
    Route::post('/reservations-mail', [\App\Http\Controllers\ReservationController::class, 'mail']);
    //supprime une réservation
    Route::get('/reservations-delete/{id}', [\App\Http\Controllers\ReservationController::class, 'destroy'])->name('reservation.delete');


    Route::get('/userCreate', [\App\Http\Controllers\UtilisateurController::class,'userC']) ;
    Route::post('/userCreate/enreg',[\App\Http\Controllers\UtilisateurController::class,'enregistre']);
    Route::get('/userListe', [\App\Http\Controllers\UtilisateurController::class,'userL'])->name('userListe');
    Route::get('/userValide/{id}',[\App\Http\Controllers\UtilisateurController::class,'userValidate']);
    Route::get('/userDesactive/{id}',[\App\Http\Controllers\UtilisateurController::class,'userValidate']);
    Route::get('/userUpdate/{id}',[\App\Http\Controllers\UtilisateurController::class,'userUpdate']);
    Route::post('/userUpdate/update/{id}',[\App\Http\Controllers\UtilisateurController::class,'userUpdateTraitement']);
    Route::get('/userDelete/{id}',[\App\Http\Controllers\UtilisateurController::class,'delete']);

});

// Test
Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');

//test table pivot
Route::get('/genre', function () {
    return App\Models\Ouvrage::find(1)->genres()->get();
});


Route::get('/recherche_ouvrage', function() {
    $ouvrages = App\Models\Ouvrage::all();
    return view('user.cherche_ouvrage', compact('ouvrages'));
});

