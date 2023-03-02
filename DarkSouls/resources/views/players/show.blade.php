@extends('layouts.layout')

@section('title', 'Player')

@section('header', 'PLAYER PROFILE')

@section('content')
<div class="w-75 mx-auto">
    <div class="container text-center">
        <div class="row">
            <div class="col">
                <div class="border rounded">
                    <img src="{{asset($player->pic)}}" alt="Icon" class="profile-view icon rounded">
                </div>
                <h3 class="display-8">Icon</h3>
            </div>
            <div class="col">
                <div class="row my-3">
                    <h3 class="display-8">Name</h3>
                    <div class="border rounded text-white fs-5">
                        {{$player->name}}
                    </div>
                </div>
                <div class="row my-3">
                    <h3 class="display-8"><i class="fa-sharp fa-solid fa-at"></i></h3>
                    <div class="border rounded text-white fs-5">
                        {{$player->nick}}
                    </div>
                </div>
                <div class="row my-3">
                    <h3 class="display-8"><i class="fa-regular fa-envelope"></i></h3>
                    <div class="border rounded text-white fs-5">
                        {{$player->email}}
                    </div>
                </div>
                <div class="row my-3">
                    <div class="d-flex flex-row justify-content-center">
                        <h5 class="location mr-2"><i class="fas fa-map-marker-alt"></i></h5>
                        <div class="text-white fs-8">
                            {{$player->country}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="text-center mt-5">
        <a href="{{route('games.player',$player->id)}}" class="btn see-games">Player's games</a>
        @if (Route::has('login'))
            @auth
                @if($player->user_id === Auth::user()->id)
                <a href="{{route('player.edit',$player->id)}}" class="btn see-games">Edit</a>
                @endif
            @endauth
        @endif
    </div>
</div>
@endsection