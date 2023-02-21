@extends('layouts.layout')

@section('title', 'Players')

@section('content')
    <h1 class="text-center display-3">PLAYERS</h1>
    <div class="container text-center">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4">
            @foreach ($players as $p)
                <div class="col">
                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="{{$p->pic}}" alt="Card image cap">
                        <div class="card-body">
                        <h5 class="card-title">{{$p->name}}</h5>
                        <p class="card-text">{{$p->nick}}</p>
                        <a href="#" class="btn btn-primary">See profile</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection