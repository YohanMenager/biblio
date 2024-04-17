<?php

namespace App\Http\Controllers;

use App\Models\Utilisateur;
use Illuminate\Http\Request;

class UtilisateurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Utilisateur $utilisateur)
    {
        $utilisateur->with('emprunts')->get();
        return $utilisateur;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Utilisateur $utilisateur)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Utilisateur $utilisateur)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Utilisateur $utilisateur)
    {
        //
    }

    public function userC(){

        return view('userCreate');
    }

    public function enregistre(Request $request){
        $user =new Utilisateur;
        $user->nom = $request->nom;
        $user->prenom=$request->prenom;
        $user->ddn = $request->ddn;
        $user->email = $request->email;
        $user->mdp = $request->mdp;
        $user->adresse = $request->adresse;
        $user->cp = $request->cp;
        $user->ville = $request->ville;
        $loi->save();
        return redirect()->route('userListe');
    }
}
