<?php

use App\Http\Controllers\GameController;
use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PlayerController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

////////////////////////////////////////////////////////////////////////////////
// Este fichero se va leyendo de arriba hacia abajo, si el resultado devuelto //
// no es el esperado tenemos que cambiar el orden de las rutas.               //
////////////////////////////////////////////////////////////////////////////////

Route::get('/', HomeController::class)->name('home');

Route::controller(PlayerController::class)->group(function () {
    Route::get('players', 'index')->name('players');
    Route::get('players/create', 'create')->name('player.create');
    Route::get('players/{id}', 'show')->name('player');
});

Route::controller(GameController::class)->group(function () {
    Route::get('games', 'index')->name('games');
    Route::get('games/create', 'create')->name('game.create');
    Route::get('games/{id}', 'show')->name('game');
    Route::get('games/player/{id}', 'list')->name('games.player');
});
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
