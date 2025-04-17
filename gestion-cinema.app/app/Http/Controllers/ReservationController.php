<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Seance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Film;

class ReservationController extends Controller
{
    // Afficher le formulaire de réservation pour une séance précise
    // public function create(Seance $seance)
    // {
    //     return view('reservations.create', compact('seance'));
    // }

    public function create($filmId)
    {
        $film = Film::with(['seances.salle'])->findOrFail($filmId);
        return view('reservations.create', compact('film'));
    }

    // Enregistrer une réservation
    public function store(Request $request)
    {
        // Validation des données
        $validated = $request->validate([
            'seance_id' => 'required|exists:seances,id',
            'place' => 'required|string|max:255'  // Ajout d'une limite pour la longueur de la chaîne
        ]);

        // Création de la réservation
        Reservation::create([
            'client_id' => Auth::id(),
            'seance_id' => $validated['seance_id'],
            'place' => $validated['place'],
            'statut' => 'confirmée'  // Statut par défaut
        ]);

        return redirect()->route('client.reservations.index')->with('success', 'Réservation effectuée avec succès.');
    }

    // Pour le client : afficher ses réservations
    public function index()
    {
        // Récupérer les réservations de l'utilisateur connecté avec les relations nécessaires
        $reservations = Reservation::with(['seance.film'])->where('client_id', Auth::id())->get();
        return view('reservations.index', compact('reservations'));
    }

    // Méthode pour annuler une réservation si possible
    public function destroy(Reservation $reservation)
    {
        // Vérification que la réservation appartient bien à l'utilisateur connecté
        if ($reservation->client_id !== Auth::id()) {
            abort(403, 'Vous n\'êtes pas autorisé à annuler cette réservation.');
        }

        // Suppression de la réservation
        $reservation->delete();

        return redirect()->route('client.reservations.index')->with('success', 'Réservation annulée avec succès.');
    }
}
