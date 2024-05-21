<?php

namespace App\Http\Controllers;

use App\Models\Emprunt;
use Illuminate\Http\Request;

class EmpruntController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $emprunts=Emprunt::all();
        return view('Emprunts.index', compact('emprunts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Emprunts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $newEmprunt = $request->validate([
            'livre' => 'required',
            'utilisateur' => 'required',
            'date_emprunt' => 'required',
            'date_retour_prevue' => 'required',
            'date_retour_reel'  => 'required'
        ]);
        
        Emprunt::create($newEmprunt)->save();

        return redirect()->route('emprunts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Emprunt $emprunt)
    {
        return view('Emprunts.show', compact('emprunt'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Emprunt $emprunt)
    {
        return view('Emprunts.edit', compact('emprunt'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Emprunt $emprunt)
    {
        $empruntUpdate = $request->validate([
            'livre' => 'required',
            'utilisateur' => 'required',
            'date_emprunt' => 'required',
            'date_retour_prevu' => 'required',
            'date_retour_reel'  => 'required'
        ]);
        
        $emprunt->update($empruntUpdate);

        return redirect()->route('emprunts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Emprunt $emprunt)
    {
        $emprunt->delete();
    }
}
