<?php

use App\Http\Controllers\GameController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
})->name('index');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::controller(PlayerController::class)->group(function () {
        Route::get('players/create', 'create')->name('player.create');
        Route::get('/player/{player}/edit', 'edit')->name('player.edit');
        Route::delete('players/{player}', 'destroy')->name('player.destroy');
        Route::post('players', 'store')->name('player.store');
        Route::put('player/{player}', 'update')->name('player.update');
    });
    
    Route::controller(GameController::class)->group(function () {
        Route::get('games/create', 'create')->name('game.create');
        Route::get('/games/{game}/edit', 'edit')->name('game.edit');
        Route::delete('games/{game}', 'destroy')->name('game.destroy');
        Route::post('games', 'store')->name('game.store');
        Route::put('game/{game}', 'update')->name('game.update');
    });
});

Route::controller(PlayerController::class)->group(function () {
    Route::get('players', 'index')->name('players');
    Route::get('players/{id}', 'show')->name('player');
});

Route::controller(GameController::class)->group(function () {
    Route::get('games', 'index')->name('games');
    Route::get('games/{id}', 'show')->name('game');
    Route::get('games/player/{id}', 'list')->name('games.player');
});

require __DIR__.'/auth.php';
