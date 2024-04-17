<?php

namespace App\Http\Controllers;

use App\Models\Auteur_ouvrage;
use Illuminate\Http\Request;

class Auteur_ouvrageController extends Controller
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
    public function show(Auteur_ouvrage $Auteur_ouvrage)
    {
        $ouvrages=Ouvrage::find(1)->genre()->toSql();
        dd($ouvrages);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Auteur_ouvrage $Auteur_ouvrage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Auteur_ouvrage $Auteur_ouvrage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Auteur_ouvrage $Auteur_ouvrage)
    {
        //
    }
}
