<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Game;
use App\Models\GameObjective;
use App\Models\Objective;
use App\Models\Player;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GameController extends Controller
{
    public function index()
    {
        $games = Game::addSelect([
            'player_nick' => Player::select('nick')
            ->whereColumn('id', 'games.player_id')
        ])->addSelect([
            'player_user_id' => Player::select('user_id')
            ->whereColumn('id', 'games.player_id')
        ])->addSelect([
            'class_name' => Classes::select('name')
            ->whereColumn('id', 'games.class_id')
        ])->get();
        return view('games.index', compact('games'));
    }

    public function create()
    {
        $auth = Auth::user()->id;
        $players = Player::where('user_id',$auth)->select('id','nick')->get();
        $classes = Classes::all();
        $objectives = Objective::all();
        return view('games.create', compact('players','classes','objectives'));
    }

    public function show($id)
    {
        $game = Game::where('id',$id)->addSelect([
            'player_nick' => Player::select('nick')
            ->whereColumn('id', 'games.player_id')
        ])->addSelect([
            'class_name' => Classes::select('name')
            ->whereColumn('id', 'games.class_id')
        ])->first();
        $objectives = GameObjective::where('game_id',$id)->addSelect([
            'objective_name' => Objective::select('name')
            ->whereColumn('id', 'game_objectives.objective_id')
        ])->get();
        return view('games.show', compact('game', 'objectives'));
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

    public function store(Request $request)
    {
        $request->validate([
            'nick' => 'required',
            'class' => 'required',
            'hrs' => 'required|min:0',
            'min' => 'required|min:0',
            'secs' => 'required|min:0|max:59',
            'total_hits' => 'required|min:0',
            'enemy_hits' => 'required|min:0',
            'scenary_hits' => 'required|min:0',
            'finishing_level' => 'required|min:0',
        ]);

        $time = $request->hrs . ':' . $request->min . ':' . $request->secs;
        $game = new Game;
        $game->time = $time;
        $game->total_hits = $request->total_hits;
        $game->enemy_hits = $request->enemy_hits;
        $game->scenary_hits = $request->scenary_hits;
        $game->finishing_level = $request->finishing_level;        
        $game->player_id = $request->nick;
        $game->class_id = $request->class;
        $game->save();

        $gameID = Game::all()->sortByDesc('id')->first();
        $objectives = $request->objective;
        foreach ($objectives as $key => $value) {
            $o = new GameObjective;
            $o->game_id = $gameID->id;
            $o->objective_id = $value;
            $o->save();
        }

        return redirect()->route('games');
    }

    public function destroy(Game $game)
    {
        $userId = Player::where('id', $game->player_id)->first();
        if ($userId->user_id === Auth::user()->id) {
            $game->delete();
            return redirect()->route('games');
        } else {
            return redirect()->back()->withErrors(['msg' => 'EH QUÉ TE PENSABAS. No puedes borrar una partida que no has creado tu.']);
        }
    }
}
