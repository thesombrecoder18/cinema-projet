<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SeanceController;
use App\Http\Controllers\SalleController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AdminController;

// Routes publiques
Route::get('/', function () {
    return redirect()->route('home');
});

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/about', function () {
    return view('about');
})->name('about');
Route::get('/contact', function () {
    return view('contact');
})->name('contact');

// Authentification
Route::get('/form', [AuthController::class, 'showForm'])->name('auth.form');
Route::get('/login', [AuthController::class, 'showForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/forgot-password', [AuthController::class, 'showForgotPasswordForm'])->name('password.request');

// Films (publics)
Route::get('/movies', [MovieController::class, 'index'])->name('movies.index');
Route::get('/movies/{id}', [MovieController::class, 'show'])->name('movies.show');

// Routes protégées pour les clients
Route::middleware(['auth'])->group(function () {
    Route::get('/client/reservations', [ReservationController::class, 'index'])->name('client.reservations.index');
    Route::delete('/client/reservations/{reservation}', [ReservationController::class, 'destroy'])->name('client.reservations.destroy');
    Route::get('/reservations/create/{film}', [ReservationController::class, 'create'])->name('reservations.create');
    Route::post('/reservations', [ReservationController::class, 'store'])->name('reservations.store');
});

// Admin login routes (accessibles à tous)
Route::get('/admin/login', [AuthController::class, 'showAdminLoginForm'])->name('admin.login');
Route::post('/admin/login', [AuthController::class, 'loginAdmin'])->name('admin.login.submit');

// Toutes les routes admin protégées
Route::middleware(['auth', 'isAdmin'])->prefix('admin')->name('admin.')->group(function () {
    // Dashboard
    Route::get('/', [AdminController::class, 'index'])->name('dashboard');
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');

    // Gestion des annonces
    Route::get('/annonces', [AdminController::class, 'annonces'])->name('annonces');

    // Gestion des films
    Route::get('/movies', [AdminController::class, 'movies'])->name('movies.index');
    Route::get('/movies/create', [MovieController::class, 'create'])->name('movies.create');
    Route::post('/movies', [MovieController::class, 'store'])->name('movies.store');
    Route::get('/movies/{id}/edit', [MovieController::class, 'edit'])->name('movies.edit');
    Route::put('/movies/{id}', [MovieController::class, 'update'])->name('movies.update');
    Route::delete('/movies/{id}', [MovieController::class, 'destroy'])->name('movies.destroy');

    // Gestion des séances
    Route::get('/seances', [AdminController::class, 'seances'])->name('seances.index');
    Route::get('/seances/create', [SeanceController::class, 'create'])->name('seances.create');
    Route::post('/seances', [SeanceController::class, 'store'])->name('seances.store');
    Route::get('/seances/{id}/edit', [SeanceController::class, 'edit'])->name('seances.edit');
    Route::put('/seances/{id}', [SeanceController::class, 'update'])->name('seances.update');
    Route::delete('/seances/{id}', [SeanceController::class, 'destroy'])->name('seances.destroy');

    // Gestion des salles
    Route::get('/salles', [SalleController::class, 'index'])->name('salles.index');
    Route::get('/salles/create', [SalleController::class, 'create'])->name('salles.create');
    Route::post('/salles', [SalleController::class, 'store'])->name('salles.store');
    Route::get('/salles/{id}/edit', [SalleController::class, 'edit'])->name('salles.edit');
    Route::put('/salles/{id}', [SalleController::class, 'update'])->name('salles.update');
    Route::delete('/salles/{id}', [SalleController::class, 'destroy'])->name('salles.destroy');

    // Gestion des utilisateurs
    Route::get('/users', [AdminController::class, 'users'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');

    // Paramètres
    Route::get('/settings', [AdminController::class, 'settings'])->name('settings');
});
