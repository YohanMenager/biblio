<?php

namespace App\Http\Controllers;

use App\Models\Editeur;
use Illuminate\Http\Request;

class EditeurController extends Controller
{
    /**
     * Affiche la liste des éditeurs.
     */
    public function index()
    {
        $editeurs = Editeur::orderBy('id_editeur')->paginate(5); // Pagination par 5

        return view('admin.editeurs.index', compact('editeurs'));
    }

    /**
     * Affiche le formulaire de création d'éditeur.
     */
    public function create()
    {
        return view('admin.editeurs.create');
    }

    /**
     * Insère un éditeur dans la base de données.
     */
    public function store(Request $request)
    {
        // Récupération des informations du formulaire
        // (voir views/admin/editeurs/create)
        $created = $request->validate([
            'libelle' => 'required'
        ]);

        // Création de l'éditeur
        Editeur::create($created)->save();

        return redirect()->route('editeurs.index')->with('success', 'Editeur créé avec succès!');
    }

    /**
     * Affiche l'éditeur spécifié.
     */
    public function show(Editeur $editeur)
    {
        return view('admin.editeurs.show', compact('editeur'));
    }

    /**
     * Affiche le formulaire de modification d'un éditeur.
     */
    public function edit(Editeur $editeur)
    {
        return view('admin.editeurs.edit', compact('editeur'));
    }

    /**
     * Met à jour un éditeur.
     */
    public function update(Request $request, Editeur $editeur)
    {
        // Récupération des informations du formulaire
        // (voir views/admin/editeurs/edit)
        $updates = $request->validate([
            'libelle' => 'required'
        ]);

        // Modification de l'éditeur
        $editeur->update($updates);

        return redirect()->route('editeurs.index')->with('success', 'Editeur créé avec succès!');
    }

    /**
     * Supprime l'éditeur de la base de données.
     */
    public function destroy(Editeur $editeur)
    {
        $editeur->delete();

        return redirect()->route('editeurs.index')->with('success', 'Editeur supprimé.');
    }
}
