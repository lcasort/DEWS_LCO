@extends('layouts.layout')

@section('title', 'Player')

@section('content')
<div>
    <h1>{{$player->name}}</h1>
    <div>
        <h2>{{$player->nick}}</h2>
    </div>
</div>
@endsection