<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Film;
use App\Models\Seance;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $films = Film::latest()->take(5)->get(); // Les 5 derniers films
        $seances = Seance::with('film', 'salle')->where('date_heure', '>=', now())->orderBy('date_heure')->take(5)->get(); // Prochaines séances

        return view('home', compact('films', 'seances'));
    }
}
