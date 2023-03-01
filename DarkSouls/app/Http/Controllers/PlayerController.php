<?php

namespace App\Http\Controllers;

use App\Models\Player;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlayerController extends Controller
{
    public function index()
    {
        $players = Player::all();
        return view('players.index', compact('players'));
    }

    public function create()
    {
        $pics = [
            'img/bosses/abyss-watcher.jpg',
            'img/bosses/aldrich-devourer-of-gods.jpg',
            'img/bosses/ancient-wyvern.jpg',
            'img/bosses/champion-gundyr.jpg',
            'img/bosses/crystal-sage.jpg',
            'img/bosses/curse-rotted-greatwood.jpg',
            'img/bosses/dancer-of-the-boreal-valley.jpg',
            'img/bosses/deacon-of-the-deep.jpg',
            'img/bosses/dragonslayer-armor.jpg',
            'img/bosses/high-lord-wolnir.jpg',
            'img/bosses/iudex-gundyr.jpg',
            'img/bosses/lothric-younger-prince.jpg',
            'img/bosses/ocelot.jpg',
            'img/bosses/old_demon_king.jpg',
            'img/bosses/pontiff_sulyvahn.jpg',
            'img/bosses/soul-of-cinder.jpg',
            'img/bosses/the-nameless-king.jpg',
            'img/bosses/vordt.jpg',
            'img/bosses/yhorm-the-giant.jpg'
        ];
        return view('players.create', compact('pics'));
    }

    public function show($id)
    {
        $player = Player::where('id', $id)->first();
        return view('players.show', compact('player'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:2|max:30',
            'country' => 'required|min:2|max:60',
            'nick' => 'required|min:2|max:30|unique:players',
            'email' => 'required|unique:players|regex:/^[a-z0-9+%ª\-\._]{3,}@([a-z0-9\.\-]{1,})\.*[a-z]{2,}$/',
            'pic' => 'required',
        ]);

        $player = new Player;
        $player->user_id = Auth::user()->id;
        $player->name = $request->name;
        $player->country = $request->country;
        $player->nick = $request->nick;
        $player->email = $request->email;        
        $player->pic = $request->pic;
        $player->save();

        return redirect()->route('players');
    }

    public function destroy(Player $p)
    {
        if ($p->user_id === Auth::user()->id) {
            $p->delete();
            return redirect()->route('player.index');
        } else {
            return redirect()->back()->withErrors(['msg' => 'EH QUÉ TE PENSABAS. No puedes borrar un jugador que no has creado tu.']);
        }
    }
}
