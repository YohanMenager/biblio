<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Utilisateur;
use App\Models\Ouvrage;

class formCreateReservationController extends Controller
{
    public function index()
    {
        $users = Utilisateur::all();
        $ouvrages = Ouvrage::all();
        return view ("Reservations/formCreateReservation", compact("users"), compact("ouvrages"));       
    }
}
