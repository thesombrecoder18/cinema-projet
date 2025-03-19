<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MovieController;

// Route par défaut - redirige vers le formulaire d'authentification
Route::get('/', function () {
    return redirect()->route('auth.form');
});

// Routes d'authentification
Route::get('/form', [AuthController::class, 'showForm'])->name('auth.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/forgot-password', [AuthController::class, 'showForgotPasswordForm'])->name('password.request');

// Routes protégées par l'authentification
Route::middleware(['auth'])->group(function () {
    // Route de la page d'accueil après connexion
    Route::get('/home', function() {
        return view('home');
    })->name('home');
});

//Page d'acceuil de l'application
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


// Route de recherche de films
Route::get('/movies/search', [MovieController::class, 'search'])->name('movies.search');
Route::get('/movies', [MovieController::class, 'index'])->name('movies.index');
Route::get('/about', function () {
    return view('about');
})->name('about');
Route::get('/contact', function () {
    return view('contact');
})->name('contact');
Route::get('/profile', function () {
    return view('profile');
})->name('profile');