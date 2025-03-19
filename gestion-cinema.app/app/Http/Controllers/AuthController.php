<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    // Affiche le formulaire combiné (login et inscription)
    public function showForm()
    {
        return view('auth.form'); // Ta vue de formulaire combiné
    }

    // Gérer l'authentification de l'utilisateur
    public function login(Request $request)
{
    // Validation des données
    $validated = $request->validate([
        'email' => 'required|email',
        'mot_de_passe' => 'required|min:6',
    ]);

    // Tenter la connexion
    if (Auth::attempt(['email' => $request->email, 'password' => $request->mot_de_passe])) {
        return redirect()->route('home');
    } else {
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
        'mot_de_passe' => 'required|min:6|confirmed',
    ]);

    // Création de l'utilisateur
    $user = User::create([
        'nom' => $request->nom, // Assure-toi d'utiliser 'nom' si c'est le nom de la colonne dans la base de données
        'email' => $request->email,
        'mot_de_passe' => Hash::make($request->mot_de_passe),
    ]);

    // Connexion de l'utilisateur après l'inscription
    Auth::login($user);

    // Rediriger vers la page d'accueil ou tableau de bord
    return redirect()->route('home');
}


    // Déconnexion de l'utilisateur
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
    
    public function showForgotPasswordForm()
    {
        return view('auth.forgot-password');
    }
}