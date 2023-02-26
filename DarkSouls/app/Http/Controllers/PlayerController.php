<?php

namespace App\Http\Controllers;

use App\Models\Player;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    public function index()
    {
        $players = Player::all();
        return view('players.index', compact('players'));
    }

    public function create()
    {
        return view('players.create');
    }

    public function show($id)
    {
        $player = Player::where('id', $id)->first();
        return view('players.show', compact('player'));
    }
}
