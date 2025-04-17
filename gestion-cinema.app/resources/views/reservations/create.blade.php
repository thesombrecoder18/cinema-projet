@extends('layouts.app')

@section('content')
    <div class="d-flex flex-column min-vh-100">
        <div class="container mt-5 flex-grow-1">
            <h2 class="text-center mb-4">🎬 Réserver : <strong>{{ $film->titre }}</strong></h2>

            @auth
                <div class="card shadow-sm">
                    <div class="card-body">
                        <form action="{{ route('reservations.store') }}" method="POST">
                            @csrf

                            {{-- Champ caché pour le film_id --}}
                            <input type="hidden" name="film_id" value="{{ $film->id }}">

                            {{-- Séance : liste déroulante des séances du film --}}
                            <div class="mb-4">
                                <label for="seance_id" class="form-label"><i class="fas fa-calendar-alt"></i> Choisir une
                                    séance</label>
                                <select name="seance_id" id="seance_id" class="form-select" required>
                                    <option value="" disabled selected>-- Sélectionnez une séance --</option>
                                    @foreach ($film->seances as $seance)
                                        <option value="{{ $seance->id }}">
                                            {{ \Carbon\Carbon::parse($seance->date_heure)->format('d/m/Y H:i') }}
                                            (Salle {{ $seance->salle->numero }})
                                        </option>
                                    @endforeach
                                </select>
                                @error('seance_id')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Nombre de places ou numéro de place --}}
                            <div class="mb-4">
                                <label for="place" class="form-label"><i class="fas fa-chair"></i> Nombre de places</label>
                                <input type="number" name="place" id="place" class="form-control" min="1"
                                    placeholder="Entrez le nombre de places" required>
                                @error('place')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Bouton de validation --}}
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-check-circle"></i> Valider la réservation
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            @else
                <div class="alert alert-warning text-center">
                    <p>Vous devez être connecté pour effectuer une réservation.</p>
                    <a href="{{ route('auth.form') }}" class="btn btn-warning">
                        <i class="fas fa-sign-in-alt"></i> Se connecter / S'inscrire
                    </a>
                </div>
            @endauth
        </div>

        {{-- Footer --}}
        <footer class="bg-dark text-white text-center py-3 mt-auto">
            <p class="mb-0">© 2025 Mon Cinéma. Tous droits réservés.</p>
        </footer>
    </div>
@endsection
