<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    // Affiche la page de login
    public function showLoginForm()
    {
        return view('auth.login'); // Ta vue de login
    }

    // Affiche la page d'inscription
    public function showRegisterForm()
    {
        return view('auth.register'); // Ta vue d'inscription
    }

    // Gérer l'authentification de l'utilisateur
    public function login(Request $request)
    {
        // Validation des données
        $validated = $request->validate([
            'email' => 'required|email',
            'mot_de_passe' => 'required|min:6',
        ]);

        // Tentative de connexion avec les identifiants fournis
        if (Auth::attempt(['email' => $request->email, 'password' => $request->mot_de_passe])) {
            // Connexion réussie, rediriger vers la page d'accueil ou tableau de bord
            return redirect()->route('home');
        } else {
            // Connexion échouée, retour avec un message d'erreur
            return back()->withErrors(['email' => 'Les informations d\'identification ne correspondent pas.']);
        }
    }

    // Gérer l'inscription de l'utilisateur
    public function register(Request $request)
    {
        // Validation des données
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'mot_de_passe' => 'required|min:6|confirmed', // confirmation du mot de passe
        ]);

        // Création de l'utilisateur
        $user = User::create([
            'name' => $request->nom,
            'email' => $request->email,
            'password' => Hash::make($request->mot_de_passe),
        ]);

        // Connexion de l'utilisateur après l'inscription
        Auth::login($user);

        // Rediriger vers la page d'accueil ou tableau de bord
        return redirect()->route('home');
    }

    // Déconnexion de l'utilisateur
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
