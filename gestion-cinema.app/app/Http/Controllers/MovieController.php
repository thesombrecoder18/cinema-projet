<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Film; // Assurez-vous que le modèle Film est correctement configuré

class MovieController extends Controller
{
    // Méthode pour rechercher des films
    public function search(Request $request)
    {
        $query = $request->input('query');

        // Simuler une liste de films
        $movies = [
            [
                'title' => "Le Fabuleux Destin d'Amélie Poulain",
                'description' => "Un film français plein de poésie.",
                'year' => 2001
            ],
            [
                'title' => "Inception",
                'description' => "Un thriller de science-fiction complexe.",
                'year' => 2010
            ],
            [
                'title' => "Avatar",
                'description' => "Une aventure visuelle dans un monde fantastique.",
                'year' => 2009
            ],
            [
                'title' => "Interstellar",
                'description' => "Un voyage interstellaire pour sauver l'humanité.",
                'year' => 2014
            ],
            // Ajoutez d'autres films simulés ici
        ];

        // Filtrer les films en fonction de la requête (insensible à la casse)
        $filteredMovies = array_filter($movies, function ($movie) use ($query) {
            return stripos($movie['title'], $query) !== false;
        });

        return view('movies.search-results', [
            'query'  => $query,
            'movies' => $filteredMovies,
        ]);
    }

    // Méthode pour afficher la liste des films (pour visiteur ou client)
    public function index()
    {
        // Récupère tous les films depuis la base de données
        $films = Film::all();
        return view('movies.index', compact('films'));
    }

    // Méthode pour afficher le formulaire de création d'un film (admin)
    public function create()
    {
        return view('admin.movies.create');
    }

    // Méthode pour stocker un nouveau film
    public function store(Request $request)
    {
        // Validation des données
        $validated = $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'nullable|string',
            'duree' => 'required|integer',  // Correction du nom de la colonne
            'categorie' => 'required|string|max:100', // Correction du nom de la colonne
            'date_sortie' => 'required|date'
        ]);

        // Création du film
        Film::create($validated);

        return redirect()->route('admin.movies.index')->with('success', 'Film ajouté avec succès.');
    }

    // Méthode pour afficher les détails d'un film (et permettre de réserver à partir de là)
    public function show($id)
    {
        $film = Film::findOrFail($id);
        return view('movies.show', compact('film'));
    }

    // Méthode pour éditer un film (admin)
    public function edit($id)
    {
        $film = Film::findOrFail($id);
        return view('admin.movies.edit', compact('film'));
    }

    // Méthode pour mettre à jour un film (admin)
    public function update(Request $request, $id)
    {
        // Validation des données
        $validated = $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'nullable|string',
            'duree' => 'required|integer',
            'categorie' => 'required|string|max:100',
            'date_sortie' => 'required|date'
        ]);

        // Mise à jour du film
        $film = Film::findOrFail($id);
        $film->update($validated);

        return redirect()->route('admin.movies.index')->with('success', 'Film mis à jour avec succès.');
    }

    // Méthode pour supprimer un film (admin)
    public function destroy($id)
    {
        $film = Film::findOrFail($id);
        $film->delete();

        return redirect()->route('admin.movies.index')->with('success', 'Film supprimé avec succès.');
    }
}
