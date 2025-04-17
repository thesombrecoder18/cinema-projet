<?php

namespace App\Http\Controllers;

use App\Models\Salle;
use Illuminate\Http\Request;

class SalleController extends Controller
{
    // Afficher toutes les salles
    public function index()
    {
        $salles = Salle::all();
        return view('admin.salles.index', compact('salles'));
    }

    // Formulaire de création d'une salle
    public function create()
    {
        return view('admin.salles.create');
    }

    // Enregistrer une nouvelle salle
    public function store(Request $request)
    {
        // Validation des données
        $validated = $request->validate([
            'numero' => 'required|integer',
            'capacite' => 'required|integer'
        ]);

        // Création de la salle
        Salle::create($validated);

        return redirect()->route('admin.salles.index')->with('success', 'Salle ajoutée avec succès.');
    }

    // Afficher les détails d'une salle
    public function show($id)
    {
        $salle = Salle::findOrFail($id);
        return view('admin.salles.show', compact('salle'));
    }

    // Formulaire d'édition d'une salle
    public function edit($id)
    {
        $salle = Salle::findOrFail($id);
        return view('admin.salles.edit', compact('salle'));
    }

    // Mettre à jour une salle
    public function update(Request $request, $id)
    {
        // Validation des données
        $validated = $request->validate([
            'numero' => 'required|integer',
            'capacite' => 'required|integer'
        ]);

        // Mise à jour de la salle
        $salle = Salle::findOrFail($id);
        $salle->update($validated);

        return redirect()->route('admin.salles.index')->with('success', 'Salle mise à jour avec succès.');
    }

    // Supprimer une salle
    public function destroy($id)
    {
        $salle = Salle::findOrFail($id);
        $salle->delete();

        return redirect()->route('admin.salles.index')->with('success', 'Salle supprimée avec succès.');
    }
}
