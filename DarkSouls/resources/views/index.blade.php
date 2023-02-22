@extends('layouts.indexLayout')

@section('title', 'Home')

@section('content')
<img src="../resources/img/dark-souls-brand_banner.jpg" alt="Dark Souls Banner"
class="img-fluid">

<div class="quote-container my-5">
    <figure class="text-center">
        <blockquote class="blockquote">
          <p>"Once, the Lord of Light banished Dark, and all that stemmed from humanity. And men assumed a fleeting form. These are the roots of our world. Men are props on the stage of life, and no matter how tender, how exquisite... A lie will remain a lie!"</p>
        </blockquote>
        <figcaption class="blockquote-footer">
          <cite title="Source Title">Aldia, Scholar of the First Sin</cite>
        </figcaption>
    </figure>
</div>

<div class="contenerdor-index py-5 text-center">
    @if (Route::has('login'))
    @auth
    <!-- -->
        @else
        <div class="my-2">
            <a href="{{ route('login') }}" class="btn btn-outline border-3">Log in</a>
        </div>
        @if (Route::has('register'))
            <div class="my-2">
                <a href="{{ route('register') }}" class="btn btn-outline">Register</a>
            </div>
        @endif
    @endauth
@endif
</div>
@endsection