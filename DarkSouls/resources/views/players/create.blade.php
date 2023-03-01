@extends('layouts.layout')

@section('title', 'Create Player')

@push('child-scripts')
<script src="{{asset('js/script.js')}}" type="module"></script>
@endpush

@section('header', 'CREATE NEW PLAYER')

@section('content')
<div class="d-flex justify-content-center">
    <form action="{{route('player.store')}}" method="POST" class="w-75">
        @csrf
        
        <div class="container">
            <div class="row">
                <div class="col mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name"
                    placeholder="John Doe" minlength="2" maxlength="30" required>
                </div>
                <div class="col mb-3">
                    <label for="country" class="form-label">Country</label>
                    <select class="form-select country" name="country" id="country" aria-label="Country">
                </select>
                </div>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1"><i class="fa-sharp fa-solid fa-at"></i></span>
                <input type="text" class="form-control" id="nick" name="nick"
                placeholder="johndoe23" minlength="2" maxlength="60" required>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1"><i class="fa-regular fa-envelope"></i></span>
                <input type="email" class="form-control" id="email" name="email"
                placeholder="johndoe23@example.com" pattern="^[a-z0-9+%ª\-\._]{3,}@([a-z0-9]+)\.*[a-z]{2,}$" required>
            </div>
        </div>

        <fieldset>
            <legend>Icon</legend>
            <hr class="w-100">
            <div class="d-flex flex-wrap justify-content-center">
            @foreach ($pics as $pic)
            <input type="radio" class="btn-check" name="pic" id="{{$pic}}" autocomplete="off" value="{{$pic}}" required>
            <label class="btn btn-light rounded p-0 selected-pic mx-2" for="{{$pic}}">
                <img src="{{asset($pic)}}" style="object-fit: cover; width: 100px; height: 100px;" class="rounded">
            </label>
            @endforeach
            </div>
        </fieldset>

        <div class="text-center mt-5">
            <input type="submit" class="btn see-games" value="Submit">
        </div>

        {{-- TODO : Botón submit --}}
    </form>
</div>
@endsection