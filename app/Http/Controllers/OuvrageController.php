<?php

namespace App\Http\Controllers;

use App\Models\Ouvrage;
use App\Models\Genre;
use App\Models\Editeur;
use App\Models\Auteur;
use Illuminate\Http\Request;

class OuvrageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ouvrages = Ouvrage::all();
        return view ("Ouvrages/Ouvrages", compact("ouvrages"));       
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $editeurs = Editeur::all();
        $auteurs = Auteur::all();
        $genres = Genre::all();
        return view ("Ouvrages/createOuvrage", compact("editeurs", "auteurs", "genres"));   
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request)->input('auteurs')[0];
        try
        {
        $nouvelOuvrage = Ouvrage::create([
            'id_editeur' => $request->input('editeur'),
            'code_isbn' => $request->input('isbn'),
            'titre' => $request->input('titre'),
            'type' => $request->input('type'),
        ]);
        $nouvelOuvrage->auteurs()->attach($request->input('auteurs'));
        $nouvelOuvrage->genres()->attach($request->input('genres'));
        //retour sur la page des ouvrages
        return redirect('/ouvrages');          
        }
        catch(QueryException $exception)
        {
          return redirect('/ouvrages');     
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Ouvrage $ouvrage)
    {
        //
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ouvrage $ouvrage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ouvrage $ouvrage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ouvrage $ouvrage)
    {
        //
    }
}
