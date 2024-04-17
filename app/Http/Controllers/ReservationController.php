<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class ReservationController extends Controller
{
    /**
     * affiche la page avec une liste des réservations
     */
    public function index()
    {
        //récupère les réservations
        $reservations = Reservation::paginate(10);
        //renvoie la vue avec les réservations récupérées
        return view ("Reservations/reservation", compact("reservations"));  
    }

    /**
     * Display the specified resource.
     */
    public function show(Reservation $reservation)
    {
        //
        
    }
    /**
     * insertion de nouvelle réservation.
     */
    public function create(Request $request)
    {
        try
        {
        $nouvelleReservation = Reservation::create([
            //récupération de l'id de l'utilisateur choisi dans le formulaire
            'id_utilisateur' => $request->input('user'),
            //récupération de l'id de l'ouvrage choisi dans le formulaire
            'id_ouvrage' => $request->input('ouvrage'),
            //date de la réservation, aujourd'hui
            'date_reservation' => date("Y/m/d"),
        ]);
        //retour sur la page de réservations
        return redirect('/reservations')->with('success', 'Réservation créée avec succès !');            
        }
        catch(QueryException $exception)
        {
          return redirect('/reservations')->with('fail', 'erreur lors de la création de réservation : '.$exception->getMessage());     
        }
    }


    /**
     * Modification de réservation
     */
    public function update(Request $request)
    {
        try{
            //on récupère la réservation avec son identifiant
            $reservation = Reservation::find($request->input('id'));
            //récupération de l'id de l'utilisateur choisi dans le formulaire
            $reservation->id_utilisateur = $request->input('user');
            //récupération de l'id de l'ouvrage choisi dans le formulaire
            $reservation->id_ouvrage = $request->input('ouvrage');
            //récupération de la date choisie dans le formulaire
            $reservation->date_reservation = $request->input('date');
            //enregistrement dans la base de données
            $reservation->save();
            
            //retour sur la page de réservations
            return redirect('/reservations')->with('success', 'Réservation modifiée avec succès !');               
        }
      catch(QueryException $exception)
      {
        return redirect('/reservations')->with('fail', 'erreur lors de la modification : '.$exception->getMessage());     
      }
    }

    /**
     * suppression de réservation
     */
    public function destroy(int $id)
    {
        try
        {
        //suppression de la réservation
        Reservation::find($id)->delete();
        
        //retour sur la page de réservations
        return redirect('/reservations')->with('success', 'Réservation supprimée avec succès !');  
        }  
        catch(QueryException $exception)
        {
          return redirect('/reservations')->with('fail', 'erreur lors de la suppression : '.$exception->getMessage());     
        }  

    }
}
