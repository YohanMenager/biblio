<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Utilisateur;
use Illuminate\Support\Facades\Hash;

class ConnexionController extends Controller
{
    /**
     * Affiche le formulaire d'inscription.
     */
    public function register()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        // Récupération des informations du formulaire
        // (voir views/auth/register)

        $validated = $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'date_naissance' => 'required',
            'email' => 'required | email | unique:utilisateurs,email',
            'adresse' => 'required',
            'code_postal' => 'required | min:0',
            'ville' => 'required',
            'password' => 'required | min:8 | confirmed'
        ]);

        // Création de l'utilisateur
        Utilisateur::create([
            'nom' => $validated['nom'],
            'prenom' => $validated['prenom'],
            'date_naissance' => $validated['date_naissance'],
            'email' => $validated['email'],
            'adresse' => $validated['adresse'],
            'code_postal' => $validated['code_postal'],
            'ville' => $validated['ville'],
            'password' => Hash::make($validated['password']) // Hashing du mot de passe
        ]);

        return redirect()->route('dashboard')->with('success', 'Compte crée avec succès.');
    }

    /**
     * Affiche le formulaire de connexion.
     */
    public function login()
    {
        return view('auth.login');
    }

    /**
     * Connecte l'utilisateur à l'application.
     */

    public function authenticate(Request $request)
    {
        // Récupération des informations du formulaire
        // (voir views/auth/login)
        $credentials = $request->validate([
            'email' => 'required | email',
            'password' => 'required | min:8'
        ]);

        if(Auth::attempt($credentials))
        {
            $request->session()->regenerate();

            // Check du statut de l'utilisateur (gestionnaire ou autre)
            if(Auth::user()->statut === 'gestionnaire')
            {
                return redirect()->route('dashboard')->with('success', 'Vous êtes connecté en tant qu\'administrateur.');
            }

            return redirect()->route('welcome')->with('success', 'Vous êtes connecté.');

        }

        // Retour en arrière en cas d'erreur
        return back()->withErrors([
            'email' => 'Identifiants incorrects'
        ])->onlyInput('email');
    }

    /**
     * Déconnecte l'utilisateur à l'application.
     */

    public function logout(Request $request)
    {
        Auth::logout();

        // Reset de la session
        $request->session()->invalidate();
        $request->session()->regenerate();

        return redirect()->route('home')->with('success', 'Vous vous êtes déconnecté.');
    }
}
