<?php

namespace App\Http\Controllers;

use App\Models\Seance;
use App\Models\Film;
use App\Models\Salle;
use Illuminate\Http\Request;

class SeanceController extends Controller
{
    // Afficher toutes les séances (admin)
    public function index()
    {
        $seances = Seance::with(['film', 'salle'])->get();
        return view('admin.seances.index', compact('seances'));
    }

    // Formulaire de création d'une séance
    public function create()
    {
        $films = Film::all();
        $salles = Salle::all();
        return view('admin.seances.create', compact('films', 'salles'));
    }

    // Enregistrer une nouvelle séance
    public function store(Request $request)
    {
        // Validation des données
        $validated = $request->validate([
            'film_id' => 'required|exists:films,id',
            'salle_id' => 'required|exists:salles,id',
            'date_heure' => 'required|date'
        ]);

        // Création de la séance
        Seance::create($validated);

        return redirect()->route('admin.seances.index')->with('success', 'Séance programmée avec succès.');
    }

    // Afficher les détails d'une séance
    public function show($id)
    {
        $seance = Seance::with(['film', 'salle'])->findOrFail($id);
        return view('admin.seances.show', compact('seance'));
    }

    // Formulaire d'édition d'une séance
    public function edit($id)
    {
        $seance = Seance::findOrFail($id);
        $films = Film::all();
        $salles = Salle::all();
        return view('admin.seances.edit', compact('seance', 'films', 'salles'));
    }

    // Mettre à jour une séance
    public function update(Request $request, $id)
    {
        // Validation des données
        $validated = $request->validate([
            'film_id' => 'required|exists:films,id',
            'salle_id' => 'required|exists:salles,id',
            'date_heure' => 'required|date'
        ]);

        // Mise à jour de la séance
        $seance = Seance::findOrFail($id);
        $seance->update($validated);

        return redirect()->route('admin.seances.index')->with('success', 'Séance mise à jour avec succès.');
    }

    // Supprimer une séance
    public function destroy($id)
    {
        $seance = Seance::findOrFail($id);
        $seance->delete();

        return redirect()->route('admin.seances.index')->with('success', 'Séance supprimée avec succès.');
    }
}
