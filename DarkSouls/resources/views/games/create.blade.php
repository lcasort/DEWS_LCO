@extends('layouts.layout')

@section('title', 'Create Game')

@push('child-scripts')
<script src="{{asset('js/games.js')}}" type="module"></script>
@endpush

@section('header', 'CREATE GAME')

@section('content')
<div class="d-flex justify-content-center">
    <form action="{{route('game.store')}}" method="POST" class="w-75">
        @csrf
        
        <div class="container">
            <div class="row">
                <div class="col mb-3">
                    <label for="nick" class="form-label">Nick</label>
                    <select class="form-select form-select-lg mb-3 nick" id="nick" name="nick" aria-label=".form-select-lg example">
                        @foreach ($players as $p)
                            <option value="{{$p->id}}">{{$p->nick}}</option>                
                        @endforeach
                    </select>
                </div>
                @error('nick')
                <div class="text-danger"><small>{{$message}}</small></div>
                @enderror
                <div class="col mb-3">
                    <label for="class" class="form-label">Class</label>
                    <select class="form-select form-select-lg mb-3 class" id="class" name="class" aria-label=".form-select-lg example">
                        @foreach ($classes as $class)
                            <option value="{{$class->id}}">{{$class->name}}</option> 
                        @endforeach
                    </select>
                </div>                
            </div>
            <div class="row">
                <div class="col mb-3">
                    <label for="hrs" class="form-label">Hours</label>
                    <input type="number" class="form-control" id="hrs" name="hrs"
                    min="0" required>
                </div>
                <div class="col mb-3">
                    <label for="min" class="form-label">Minutes</label>
                    <input type="number" class="form-control" id="min" name="min"
                    min="0" max="59" required>
                </div>
                <div class="col mb-3">
                    <label for="secs" class="form-label">Seconds</label>
                    <input type="number" class="form-control" id="secs" name="secs"
                    min="0" max="59" required>
                </div>
            </div>
            <div class="row">
                <div class="col mb-3">
                    <label for="finishing_level" class="form-label">Finishing Level</label>
                    <input type="number" class="form-control" id="finishing_level"
                    name="finishing_level" min="0" required>
                </div>
                <div class="col mb-3">
                    <label for="total_hits" class="form-label">Total hits</label>
                    <input type="number" class="form-control" id="total_hits"
                    name="total_hits" min="0" required>
                </div>
            </div>
            <div class="row">
                <div class="col mb-3">
                    <label for="enemy_hits" class="form-label">Enemy hits</label>
                    <input type="number" class="form-control" id="enemy_hits"
                    name="enemy_hits" min="0" required>
                </div>
                <div class="col mb-3">
                    <label for="scenary_hits" class="form-label">Scenary hits</label>
                    <input type="number" class="form-control" id="scenary_hits"
                    name="scenary_hits" min="0" required>
                </div>
            </div>
        </div>

        <fieldset class="mt-3 objectives-fieldset">
            <legend>Objectives</legend>
            <hr class="w-100">
            <div class="container">
                <div class="d-flex flex-wrap flex-row justify-content-start mx-auto">
                @foreach ($objectives as $obj)
                    <div class="form-check objectives w-25">
                        <input class="form-check-input objective" type="checkbox"
                        id="{{$obj->name}}" name="objective[{{$obj->name}}]" value="{{$obj->id}}">
                        <label class="form-check-label" for="{{$obj->name}}">
                            {{$obj->name}}
                        </label>
                    </div>
                @endforeach
                </div>
            </div>
        </fieldset>
        <div class="objectives-error text-danger"></div>

        <div class="text-center mt-5">
            <input type="submit" class="btn see-games create-game" value="Submit">
        </div>
    </form>
</div>
@endsection