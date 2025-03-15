<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('home');
});


Route::get('/test', function () {
    return response()->json([
        'message' => 'Hello World!',
        'status' => 200
    ]);
});

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth']);