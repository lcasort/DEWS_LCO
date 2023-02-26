<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Game;
use App\Models\Player;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function index()
    {
        $games = Game::addSelect([
            'player_nick' => Player::select('nick')
            ->whereColumn('id', 'games.player_id')
        ])->addSelect([
            'class_name' => Classes::select('name')
            ->whereColumn('id', 'games.class_id')
        ])->get();
        return view('games.index', compact('games'));
    }

    public function create()
    {
        return view('games.create');
    }

    public function show($id)
    {
        return view('games.show', compact('id'));
    }

    public function list($id)
    {
        $games = Game::where('player_id', $id)->addSelect([
            'class_name' => Classes::select('name')
            ->whereColumn('id', 'games.class_id')
        ])->get();
        $player = Player::where('id', $id)->first();
        return view('games.list', compact('games', 'player'));
    }
}
