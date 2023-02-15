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

Route::get('/', HomeController::class);

Route::controller(PlayerController::class)->group(function () {
    Route::get('players', 'index');
    Route::get('players/create', 'create');
    Route::get('players/{id}', 'show');
});

Route::controller(GameController::class)->group(function () {
    Route::get('games', 'index');
    Route::get('games/create', 'create');
    Route::get('games/{id}', 'show');
    Route::get('games/player/{id}', 'list');
});