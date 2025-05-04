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
        return view('auth.form'); // Vue pour le formulaire combiné
    }

    // Affiche le formulaire de connexion pour les administrateurs
    public function showAdminLoginForm()
    {
        return view('admin.index'); // Vue pour le formulaire de connexion admin
    }

    // Gérer l'authentification des utilisateurs normaux
    public function login(Request $request)
    {
        // Validation des données
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Tenter la connexion
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();

            // Rediriger les utilisateurs normaux vers la page d'accueil
            if (!$user->isAdmin()) {
                return redirect()->route('home');
            }

            // Déconnecter les administrateurs qui utilisent cette route
            Auth::logout();
            return redirect()->route('login')->withErrors(['email' => 'Cette route est réservée aux utilisateurs normaux.']);
        }

        // Retourner une erreur si la connexion échoue
        return back()->withErrors(['email' => 'Les informations d\'identification ne correspondent pas.']);
    }

    // Gérer l'authentification des administrateurs
    public function loginAdmin(Request $request)
    {
        // Validation des données
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Tenter la connexion
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();

            // Vérifier si l'utilisateur est un administrateur
            if ($user->isAdmin()) {
                // Régénérer la session pour des raisons de sécurité
                $request->session()->regenerate();

                // Rediriger vers le tableau de bord admin
                return redirect()->intended(route('admin.dashboard'));
            }

            // Déconnecter les utilisateurs non administrateurs
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect()->route('admin.login')
                ->withErrors(['email' => 'Accès réservé aux administrateurs.']);
        }

        // Retourner une erreur si la connexion échoue
        return back()->withErrors([
            'email' => 'Les informations d\'identification ne correspondent pas.',
        ]);
    }

    // Gérer l'inscription de l'utilisateur
    public function register(Request $request)
    {
        // Validation des données
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        // Création de l'utilisateur
        $user = User::create([
            'nom' => $request->nom,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'client', // Par défaut, le rôle est "client"
        ]);

        // Connexion de l'utilisateur après l'inscription
        Auth::login($user);

        // Rediriger vers la page d'accueil
        return redirect()->route('home');
    }

    // Déconnexion de l'utilisateur
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/form')->with('success', 'Vous avez été déconnecté avec succès.');
    }

    public function showForgotPasswordForm()
    {
        return view('auth.forgot-password');
    }
}
