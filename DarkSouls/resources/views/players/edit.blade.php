@extends('layouts.layout')

@section('title', 'Edit Player')

@push('child-scripts')
<script src="{{asset('js/script.js')}}" type="module"></script>
@endpush

@section('header')
EDIT PLAYER {{strtoupper($player->name)}}
@endsection

@section('content')
<div class="d-flex justify-content-center">
    <form action="#" method="POST" class="w-75">
        @csrf
        @method('put')

        <div class="container">
            <div class="row">
                <div class="col mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name"
                    placeholder="John Doe" minlength="2" maxlength="30"
                    value="{{$player->name}}" required>
                </div>
                <div class="col mb-3">
                    <label for="country" class="form-label">Country</label>
                    <select class="form-select country" name="country" id="country" aria-label="Country">
                </select>
                </div>
            </div>
            <div class="input-group">
                <span class="input-group-text" id="basic-addon1"><i class="fa-sharp fa-solid fa-at"></i></span>
                <input type="text" class="form-control" id="nick" name="nick"
                placeholder="johndoe23" minlength="2" maxlength="60"
                value="{{$player->nick}}" required>
            </div>
            @error('nick')
            <div class="text-danger"><small>{{$message}}</small></div>
            @enderror
            <div class="input-group mt-3">
                <span class="input-group-text" id="basic-addon1"><i class="fa-regular fa-envelope"></i></span>
                <input type="email" class="form-control" id="email" name="email"
                placeholder="johndoe23@example.com" pattern="^[a-z0-9+%ª\-\._]{3,}@([a-z0-9]+)\.*[a-z]{2,}$"
                value="{{$player->email}}" required>
            </div>
            @error('email')
            <div class="text-danger mt-0"><small>{{$message}}</small></div>
            @enderror
        </div>

        <fieldset class="mt-3">
            <legend>Icon</legend>
            <hr class="w-100">
            <div class="d-flex flex-wrap justify-content-center">
            @foreach ($pics as $pic)
            @if($pic === $player->pic)
            <input type="radio" class="btn-check" name="pic" id="{{$pic}}" autocomplete="off" value="{{$pic}}" checked required>
            @else<input type="radio" class="btn-check" name="pic" id="{{$pic}}" autocomplete="off" value="{{$pic}}" required>
            @endif
            <label class="btn btn-light rounded p-0 selected-pic mx-2" for="{{$pic}}">
                <img src="{{asset($pic)}}" style="object-fit: cover; width: 100px; height: 100px;" class="rounded">
            </label>
            @endforeach
            </div>
        </fieldset>

        <div class="text-center mt-5">
            <input type="submit" class="btn see-games" value="Submit">
        </div>
    </form>
</div>
@endsection