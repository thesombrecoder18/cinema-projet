<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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