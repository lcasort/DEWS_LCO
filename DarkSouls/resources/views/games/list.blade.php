@extends('layouts.layout')

@section('title', 'Player Games')

@section('header')GAMES OF {{strtoupper($player->nick)}}@endsection

@section('content')
    <div class="mt-5">
        <table class="table text-white table-hover w-75 mx-auto">
            <thead>
                <tr>
                    <th></th>
                    <th scope="col">Class</th>
                    <th scope="col">Time</th>
                    <th scope="col">Total Hits</th>
                    <th scope="col">Enemy Hits</th>
                    <th scope="col">Scenary Hits</th>
                    <th scope="col">Finishing Level</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($games as $g)
                <tr>
                    <td>
                        <a href="{{route('game',$g->id)}}" class="see-game">
                            <i class="fa-solid fa-square-caret-right"></i>
                        </a>
                    </td>
                    <td>{{$g->class_name}}</td>
                    <td>{{$g->time}}</td>
                    <td>{{$g->total_hits}}</td>
                    <td>{{$g->enemy_hits}}</td>
                    <td>{{$g->scenary_hits}}</td>
                    <td>{{$g->finishing_level}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="text-center mt-5">
        <a href="{{route('player',$g->player_id)}}" class="btn see-games">Player's profile</a>
    </div>
@endsection