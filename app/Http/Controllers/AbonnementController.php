<?php

namespace App\Http\Controllers;

use App\Models\Abonnement;
use App\Models\Type_abonnement;
use App\Models\Utilisateur;
use Illuminate\Http\Request;

class AbonnementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $abonnements = Abonnement::all();
        return view('admin.abonnements.index', compact('abonnements'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $type_abonnements = Type_abonnement::all();
        $utilisateurs = Utilisateur::all();
        return view('admin.abonnements.create', compact('type_abonnements', 'utilisateurs'));
    }

    public function store(Request $request)
    {
        // Validation des données de la requête
        $request->validate([
            'id_type_abonnement' => 'required|max:255',
            'id_utilisateur' => 'required|max:255',
            'date_debut' => 'required|max:255',
            'date_fin' => 'required|max:255'
        ]);

        Abonnement::create($request->all());
        // Redirection avec un message de succès
        return redirect()->route('abonnements.index')
                        ->with('success', 'Abonnement créé avec succès.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Abonnement $abonnement)
    {
        return view('admin.abonnements.show', compact('abonnement'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Abonnement $abonnement)
    {
        $type_abonnements = Type_abonnement::all();
        $utilisateurs = Utilisateur::all();
        return view('admin.abonnements.edit', compact('abonnement', 'type_abonnements', 'utilisateurs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Abonnement $abonnement)
    {
        $request->validate([
            'id_type_abonnement' => 'required|max:255',
            'id_utilisateur' => 'required|max:255',
            'date_debut' => 'required|max:255',
            'date_fin' => 'required|max:255'
        ]);

        $abonnement->update($request->all());
        return redirect()->route('abonnements.index')
        ->with('success', 'Abonnement updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Abonnement $abonnement)
    {
        $abonnement->delete();
        return redirect()->route('abonnements.index')
          ->with('success', 'Abonnement deleted successfully');
    }
}
