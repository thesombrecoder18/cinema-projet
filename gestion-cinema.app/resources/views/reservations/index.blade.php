<!-- resources/views/reservations/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="d-flex flex-column min-vh-100">

        <div class="container mt-5 flex-grow-1">
            <h1 class="mb-4 text-center">📅 Mes Réservations</h1>

            @if ($reservations->isEmpty())
                <div class="alert alert-info text-center">
                    <p>Aucune réservation trouvée.</p>
                </div>
            @else
                <div class="table-responsive">
                    <table class="table table-hover table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th>#</th>
                                <th>🎬 Film</th>
                                <th>🏢 Salle</th>
                                <th>🕒 Date et Heure</th>
                                <th>💺 Place</th>
                                <th>📌 Statut</th>
                                <th>⚙️ Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reservations as $reservation)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $reservation->seance->film->titre }}</td>
                                    <td>{{ $reservation->seance->salle->numero }}</td>
                                    <td>{{ \Carbon\Carbon::parse($reservation->seance->date_heure)->format('d/m/Y H:i') }}
                                    </td>
                                    <td>{{ $reservation->place }}</td>
                                    <td>
                                        <span
                                            class="badge
                                        {{ $reservation->statut === 'confirmée' ? 'bg-success' : 'bg-warning' }}">
                                            {{ ucfirst($reservation->statut) }}
                                        </span>
                                    </td>
                                    <td>
                                        {{-- Bouton pour annuler la réservation --}}
                                        <form action="{{ route('client.reservations.destroy', $reservation->id) }}"
                                            method="POST"
                                            onsubmit="return confirm('Êtes-vous sûr de vouloir annuler cette réservation ?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="fas fa-times"></i> Annuler
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
@endsection
