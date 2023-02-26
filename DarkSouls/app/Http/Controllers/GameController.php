<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function index()
    {
        $games = Game::all();
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
        return view('games.list', compact('id'));
    }
}
