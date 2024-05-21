<?php

namespace App\Http\Controllers;

use App\Models\Auteur;
use Illuminate\Http\Request;

class AuteurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $auteurs = Auteur::paginate(12); //Récupère les auteurs + paginate
        return view('admin.auteur.index', compact('auteurs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.auteur.create'); //Return de la view create
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([

            'nom' => 'required|max:50',
            'prenom' => 'required|max:50',
        ]);

        $auteur = new Auteur([
            'id_auteur' => $request->get('id_auteur'),
            'nom' => $request->get('nom'),
            'prenom' => $request->get('prenom'),
        ]);
        $auteur->save();

        return redirect('/admin/auteurs') ->with('Auteur ajouté avec succés');


    }

    /**
     * Display the specified resource.
     */
    public function show(Auteur $auteur)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Auteur $auteur)
    {
        return view('admin.auteur.edit', compact('auteur'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id_auteur)
    {
        $request->validate([

            'nom' => 'required|max:50',
            'prenom' => 'required|max:50',
        ]);

        $auteur = Auteur::findOrFail($id_auteur); //cherche dans le Modele Auteur l'id_auteur

        $auteur ->nom = $request->get('nom');
        $auteur ->prenom = $request->get('prenom');

        $auteur->save();

        return redirect('/admin/auteurs')->with('success', 'Auteur mis à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
    $auteur = Auteur::findOrFail($id);
    $auteur->delete();
    return redirect('/admin/auteurs')->with('success', 'Auteur supprimé avec succès');
    }
}
