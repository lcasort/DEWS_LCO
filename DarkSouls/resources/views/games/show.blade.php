@extends('layouts.layout')

@section('title', 'Game')

@section('header')
GAME NO.{{$game->id}}
@endsection

@section('content')
{{--
game : [
    {
        "time":"05:30:52",
        "total_hits":205850900,
        "enemy_hits":57,
        "scenary_hits":22,
        "finishing_level":90077171,
        "player_nick":"suscipit",
        "class_name":"Sorcerer"
    }
]

objectives : [
    {
        "objective_name":"Aldrich, Devourer of Gods"
    },
    {
        "objective_name":"Lothric, Younger Prince"
    }
]
--}}
<div class="w-75 mx-auto">
    <div class="container text-center">
        <div class="row">
            <div class="col">
                <div class="text-center mt-5">
                    <a href="{{route('player',$game->player_id)}}" class="btn btn-lg see-games w-50 py-2 fs-3">{{strtoupper($game->player_nick)}}</a>
                </div>
                <p class="text-white fs-5">{{$game->class_name}}</p>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col">
                <h3 class="display-8">Time</h3>
                <div class="border rounded text-white fs-5">
                    {{$game->time}}
                </div>
            </div>
            <div class="col">
                <h3 class="display-8">Finishing level</h3>
                <div class="border rounded text-white fs-5">
                    {{$game->finishing_level}}
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col">
                <h3 class="display-8">Total hits</h3>
                <div class="border rounded text-white fs-5">
                    {{$game->total_hits}}
                </div>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col">
                <h3 class="display-8">Enemy hits</h3>
                <div class="border rounded text-white fs-5">
                    {{$game->enemy_hits}}
                </div>
            </div>
            <div class="col">
                <h3 class="display-8">Scenary hits</h3>
                <div class="border rounded text-white fs-5">
                    {{$game->scenary_hits}}
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <h3 class="display-8">Objectives</h3>
        </div>
        @foreach ($objectives as $obj)
        <div class="row w-50 mx-auto mt-2">
            <div class="border rounded text-white fs-5">
                {{$obj->objective_name}}
            </div>
        </div>
        @endforeach
    </div>

    <div class="text-center mt-5">
        <a href="{{route('games.player',$game->player_id)}}" class="btn see-games">Player's games</a>
    </div>
</div>
@endsection