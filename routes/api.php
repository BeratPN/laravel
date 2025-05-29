<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Support\Facades\Route;

// login route
Route::post('/login', [AuthenticatedSessionController::class, 'store'])
    ->middleware('guest') // only guests can login
    ->name('login');

// logout route
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth:sanctum') // only authenticated users can logout
    ->name('logout');

// register route
Route::post('/register', [RegisteredUserController::class, 'store'])
    ->middleware('guest') // only guests can register
    ->name('register');

// get authenticated user details
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum'); // only authenticated users can get their own details

// CSRF Cookie route
Route::get('/sanctum/csrf-cookie', function (Request $request) {
    return response()->json(['message' => 'CSRF cookie set']);
});
