<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Utilisateur;
use App\Models\Ouvrage;

class formModifyReservationController extends Controller
{
    /**
     * Affichage du formulaire
     */
    public function index(int $id)
    {
        //récupération de la réservation
        $reservation = Reservation::find($id);
        //récupération des utilisateurs(pour le choix dans le formulaire)
        $users = Utilisateur::all();
        //récupération des ouvrages(pour le choix dans le formulaire)
        $ouvrages = Ouvrage::all();

        //affichage de la vue.
        return view ("admin.Reservations.formModifyReservation", compact("users"), compact("ouvrages"))->with("reservation", $reservation);
    }


}
