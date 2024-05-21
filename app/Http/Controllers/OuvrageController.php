<?php

namespace App\Http\Controllers;

use App\Models\Ouvrage;
use Illuminate\Pagination\Paginator;
use App\Models\Genre;
use App\Models\Auteur;
use App\Models\Editeur;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;

class OuvrageController extends Controller
{
    /**
     * Affiche les ouvrages.
     */
    public function index()
    {
        $livres = Ouvrage::paginate(6); // Affiche 6 ouvrages par page
        return view('admin.ouvrages.index', compact('livres'));// compact va  récupérer la variable livres pour lui ajouter une fonction dans la vue index
    }

    /**
     * Affiche le formulaire de création d'ouvrage.
     */
    public function create()
    {
        $auteurs = Auteur::all(); // Récupère tous les auteurs
        $genres = Genre::all(); // Récupère tous les genres
        $editeurs = Editeur::all(); // Récupère tous les genres

        return view('admin.ouvrages.create', compact('auteurs', 'genres', 'editeurs'));}// compact va  récupérer les variables, pour la vue create
    /**
     * Insère l'ouvrage crée dans la base de données.
     */
    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required|max:255',
            /*'type' => 'required|max:255',
            'id_editeur' => 'required|max:255',
            'id_auteur' => 'required|array',
            'id_genre' => 'required|array',*/


        ],[
            'titre.required' =>'Le champ est obligatoire.',
        ]);
        $ouvrage = new Ouvrage([
            'titre' => $request->get('titre'),
            'type' => $request->get('type'),
            'id_editeur' => $request->get('editeur'),

        ]);
        $ouvrage->save();

        // Ajout des auteurs à la table pivot
        $ouvrage->auteurs()->attach($request->get('auteur'));

        // Ajout des genres à la table pivot
        $ouvrage->genres()->attach($request->get('genre'));
        Session::flash('success', 'ouvrage ajouté');
        return redirect('/admin/ouvrages')->with('success','Ouvrage créé avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(Ouvrage $ouvrage)
    {



    }

    /**
     * Affiche le formulaire de modification d'ouvrage.
     */
    public function edit(Ouvrage $ouvrage)
    {
        $auteurs = Auteur::all(); // Récupère tous les auteurs
        $genres = Genre::all(); // Récupère tous les genres
        $editeurs = Editeur::all(); // Récupère tous les genres
        return view('admin.ouvrages.edit', compact('ouvrage','auteurs', 'genres', 'editeurs'));
    }

    /**
     * Update the specified resource {{ $livre->titre}}  in storage.
     * Update the specified resource {{ $livre->titre}}  in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
           // 'titre' => 'required|max:255',
        ]);

        $ouvrage = Ouvrage::findOrFail($id);

        $ouvrage->titre = $request->get('titre');

        $ouvrage->type = $request->get('type');
        $ouvrage->id_editeur = $request->get('editeur');

        // Ajout des auteurs à la table pivot
        $ouvrage->auteurs()->sync($request->get('auteur'));

        // Ajout des genres à la table pivot
        $ouvrage->genres()->sync($request->get('genre'));

        $ouvrage->save();

        Session::flash('success', 'ouvrage mis à jour');
        // Redirect with success message
        return redirect()->route('ouvrages.index')->with('success', 'Ouvrage mis à jour avec succès');
    }

    public function destroy($id)
    {
        $livre = Ouvrage::findOrFail($id);
        $livre->auteurs()->detach();
        $livre->genres()->detach();
        $livre->delete();

        return redirect('/admin/ouvrages')->with('success', 'Livre supprimé avec succès');
    }
}
