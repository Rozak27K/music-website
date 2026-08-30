<?php

use App\Http\Controllers\Admin\ArtikelController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\GaleriController;
use App\Http\Controllers\PagesController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| WEBSITE
|--------------------------------------------------------------------------
*/

// HOME
Route::get('/', [PagesController::class, 'index'])
    ->name('home');

// GALERI
Route::get('/galeri', [PagesController::class, 'galeri'])
    ->name('galeri');

// ARTIKEL
Route::get('/artikel', [PagesController::class, 'artikel'])
    ->name('artikel');

Route::get('/artikel/{artikel}', [PagesController::class, 'detailArtikel'])
    ->name('artikel.detail');

// PROFIL
Route::get('/profil', [PagesController::class, 'profil'])
    ->name('profil');


/*
|--------------------------------------------------------------------------
| USER DASHBOARD
|--------------------------------------------------------------------------
*/

Route::middleware('auth')
    ->get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard');


/*
|--------------------------------------------------------------------------
| ADMIN
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        // ADMIN DASHBOARD
        Route::get('/dashboard', [DashboardController::class, 'index'])
            ->name('dashboard');

        // CRUD GALERI
        Route::resource('galeri', GaleriController::class)
            ->except(['show']);

        // CRUD ARTIKEL
        Route::resource('artikel', ArtikelController::class)
            ->except(['show']);
    });


/*
|--------------------------------------------------------------------------
| AUTHENTICATION
|--------------------------------------------------------------------------
*/

require __DIR__ . '/auth.php';
