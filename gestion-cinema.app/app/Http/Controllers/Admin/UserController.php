<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // Constructeur pour vérifier si l'utilisateur est un administrateur et rediriger vers la page d'accueil s'il ne l'est pas
    public function __construct()
    {
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            abort(403, 'Accès interdit');
        }
    }

    // Afficher la liste des clients
    public function index()
    {
        $users = User::where('role', 'client')->get(); // Filtrer uniquement les clients
        return view('admin.users.index', compact('users'));
    }


    // Afficher le formulaire de création d'un client
    public function create()
    {
        return view('admin.users.create');
    }

    // Enregistrer un nouveau client
    public function store(Request $request)
    {
        // Validation des données
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed'
        ]);

        // Création du client
        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => 'client' // Assigner le rôle "client"
        ]);

        return redirect()->route('admin.users.index')->with('success', 'Client créé avec succès.');
    }

    // Afficher le formulaire d'édition d'un client
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    // Mettre à jour un client
    public function update(Request $request, $id)
    {
        // Validation des données
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|string|min:8|confirmed'
        ]);

        // Mise à jour du client
        $user = User::findOrFail($id);
        $user->name = $validated['name'];
        $user->email = $validated['email'];

        // Mettre à jour le mot de passe uniquement s'il est fourni
        if (!empty($validated['password'])) {
            $user->password = Hash::make($validated['password']);
        }

        $user->save();

        return redirect()->route('admin.users.index')->with('success', 'Client mis à jour avec succès.');
    }

    // Supprimer un client
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        // Vérification pour éviter de supprimer un administrateur
        if ($user->role !== 'client') {
            return redirect()->route('admin.users.index')->with('error', 'Vous ne pouvez pas supprimer cet utilisateur.');
        }

        $user->delete();

        return redirect()->route('admin.users.index')->with('success', 'Client supprimé avec succès.');
    }
}
