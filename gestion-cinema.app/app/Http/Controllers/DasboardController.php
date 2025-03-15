<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Film;
use App\Models\Reservation;



class DashboardController extends Controller {
    public function index() {
        $nombreUtilisateurs = \App\Models\User::count();
        $nombreFilms = Film::count();
        $nombreReservations = Reservation::count();

        return view('dashboard', compact('nombreUtilisateurs', 'nombreFilms', 'nombreReservations'));
    }
}