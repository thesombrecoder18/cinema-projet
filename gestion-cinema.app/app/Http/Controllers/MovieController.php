<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MovieController extends Controller
{
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
        $filteredMovies = array_filter($movies, function($movie) use ($query) {
            return stripos($movie['title'], $query) !== false;
        });

        return view('movies.search-results', [
            'query'  => $query,
            'movies' => $filteredMovies,
        ]);
    }
}
