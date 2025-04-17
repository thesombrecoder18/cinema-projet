@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="card mb-4">
            <div class="card-body">
                <h2>{{ $film->title }}</h2>
                <p>Année : {{ $film->date_sortie }}</p>
                <p>Durée : {{ $film->duree }} minutes</p>
                <p>Genre : {{ $film->categorie }}</p>
                <p>Description : {{ $film->description }}</p>
                <!-- Ajoute ici d'autres détails spécifiques à chaque film -->

                <a href="{{ route('reservations.create', $film->id) }}" class="btn btn-success">Réserver une place</a>
            </div>
        </div>
    </div>
@endsection
