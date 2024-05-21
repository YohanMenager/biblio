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

    public function userL(){
        //équivaut à select * from loi;
    //    $users=Utilisateur::all();
        // dd pour dump and die. Affiche le contenu du curseur

        $users=Utilisateur::paginate(4);
        //renvoie vers la vue listelois

        return view('admin.users.userListe', compact('users'));

    }

    public function userC(){

        return view('admin.users.userCreate');
    }

    public function enregistre(Request $request){
        $request->validate([

            'nom'=>'required | ',
            'prenom'=>'required',
            'date_naissance'=>'required',
            'email'=>'required',
            'adresse'=>'required',
            'code_postal'=>'required',
            'ville'=>'required',

        ]);

        $user =new Utilisateur;
        $user->nom = $request->nom;
        $user->prenom=$request->prenom;
        $user->date_naissance = $request->date_naissance;
        $user->email = $request->email;
        $user->password = $request->mot_de_passe;
        $user->adresse = $request->adresse;
        $user->code_postal = $request->code_postal;
        $user->ville = $request->ville;
        $user->reception_newsletter = 0;
        if($request->reception_newsletter == "on")
            $user->reception_newsletter = 1;
        //$user->reception_newsletter = $request->reception_newsletter;
        $user->save();
        return redirect()->route('userListe');
    }

    public function delete(Request $request){
        $user=Utilisateur::find($request->id);
        $user->delete();
        return redirect('/userListe')->with('status','Utilisateur supprimé');
    }

    public function userValidate(Request $request){
        $user=Utilisateur::find($request->id);
        if($user->statut == "en attente")
            $user->statut="actif";
        else
            $user->statut="en attente";
        $user->update();
        return redirect('/userListe')->with('status','Compte Utilisateur activé');
    }



    public function userUpdate(Request $request){
        $id= $request->id;
        $user=Utilisateur::find($id);
        return view('admin.users.userUpdate', ['user'=>$user]);
    }

    public function userUpdateTraitement(Request $request){
       //système de validation pour que tous les champs soient saisis
        $request->validate([

            'nom'=>'required',
            'prenom'=>'required',
            'date_naissance'=>'required',
            'email'=>'required',
            'adresse'=>'required',
            'code_postal'=>'required',
            'ville'=>'required',

        ]);

        $user=Utilisateur::find($request->id);
        //dd($user);
        $user->nom=$request->nom;
        $user->prenom=$request->prenom;
        $user->date_naissance=$request->date_naissance;
        $user->email=$request->email;
        $user->adresse=$request->adresse;
        $user->code_postal=$request->code_postal;
        $user->ville=$request->ville;
        //dd($request->reception_newsletter);


        if ($request->reception_newsletter == "0" || $request->reception_newsletter == "1"){
          $user->reception_newsletter = 1;
        }
        else{
            $user->reception_newsletter = 0;
        }


        $user->update();

        return redirect('/userListe')->with('status','Uilisateur modifiée');

    }
}
