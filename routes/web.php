<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\UserProfileController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store']);
});

Route::middleware('auth')->group(function () {
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // /list-articles page
    // Users who have the 'list-articles' permission can access this. (Both user and writer roles can list articles.)
    Route::get('/list-articles', [ArticleController::class, 'index'])
        ->name('articles.index')
        ->middleware('permission:list-articles');

    // become a writer
    Route::post('/request-writer-role', [UserProfileController::class, 'requestWriterRole'])
        ->name('user.requestWriterRole')
        ->middleware('permission:list-articles');

    // become a user
    Route::post('/request-user-role', [UserProfileController::class, 'requestUserRole'])
        ->name('user.requestUserRole')
        ->middleware('permission:list-articles');
});
