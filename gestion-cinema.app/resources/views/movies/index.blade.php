@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h2>Liste des Films</h2>

        @foreach ($films as $film)
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">{{ $film->title }}</h5>
                    <p class="card-text">Titre : {{ $film->titre }}</p>
                    <p class="card-text">Durée : {{ $film->duree }} minutes</p>
                    <p class="card-text">Genre : {{ $film->categorie }}</p>
                    <p class="card-text">Année : {{ $film->date_sortie }}</p>
                    <a href="{{ route('movies.show', $film->id) }}" class="btn btn-primary">Détails</a>
                </div>
            </div>
        @endforeach

        @if (count($films) === 0)
            <p>Aucun film disponible pour le moment.</p>
        @endif
    </div>
@endsection
