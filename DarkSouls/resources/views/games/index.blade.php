@extends('layouts.layout')

@section('title', 'Games')

@push('child-scripts')
<script src="{{asset('js/confirm-game.js')}}" type="module"></script>
@endpush

@section('header', 'GAMES')

@section('content')
@if (Route::has('login'))
    @auth
    <div class="my-3 text-center">
        <a href="{{route('game.create')}}" class="btn see-games">Create game</a>
    </div>
    @endauth
@endif

    <div>
        <table class="table text-white table-hover w-75 mx-auto">
            <thead>
                <tr>
                    <th></th>
                    <th scope="col">Player</th>
                    <th scope="col">Class</th>
                    <th scope="col">Time</th>
                    <th scope="col">Total Hits</th>
                    <th scope="col">Enemy Hits</th>
                    <th scope="col">Scenary Hits</th>
                    <th scope="col">Finishing Level</th>
                    <th></th>
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
                    <th scope="row">
                        <a href="{{route('player',$g->player_id)}}" class="link-light">
                            {{$g->player_nick}}
                        </a>
                    </th>
                    <td>{{$g->class_name}}</td>
                    <td>{{$g->time}}</td>
                    <td>{{$g->total_hits}}</td>
                    <td>{{$g->enemy_hits}}</td>
                    <td>{{$g->scenary_hits}}</td>
                    <td>{{$g->finishing_level}}</td>
                    <td>
                        @if (Route::has('login'))
                            @auth
                                @if($g->player_user_id === Auth::user()->id)
                                <form action="{{route('game.destroy', $g)}}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="p-0 fs-5 btn bg-transparent button-delete-game delete" value="ELIMINAR"><i class="fa-solid fa-trash delete"></i></button>
                                </form>                                  
                                @endif
                            @endauth
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection