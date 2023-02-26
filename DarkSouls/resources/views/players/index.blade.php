@extends('layouts.layout')

@section('title', 'Players')

@section('header', 'PLAYERS')

@section('content')
    <div class="container">
        <div class="row">
            @foreach ($players as $p)
                <div class="col text-center">
                    <div class="card align-self-center mx-auto my-2" style="width: 18rem;">
                        <img class="card-img-top img-fluid" src="{{$p->pic}}" alt="Card image cap">
                        <div class="card-body">
                        <h5 class="card-title">{{$p->name}}</h5>
                        <p class="card-text">{{$p->nick}}</p>
                        <a href="{{route('player',$p->id)}}" class="btn see-profile">See profile</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection