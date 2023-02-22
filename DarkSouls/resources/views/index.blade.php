@extends('layouts.indexLayout')

@section('title', 'Home')

@section('content')
<img src="{{asset('img/dark-souls-brand_banner.jpg')}}" alt="Dark Souls Banner"
class="img-fluid">

{{-- <div class="quote-container my-5">
    <figure class="text-center">
        <blockquote class="blockquote">
        <p>"Once, the Lord of Light banished Dark, and all that stemmed from humanity. And men assumed a fleeting form. These are the roots of our world. Men are props on the stage of life, and no matter how tender, how exquisite... A lie will remain a lie!"</p>
        </blockquote>
        <figcaption class="blockquote-footer">
        <cite title="Source Title">Aldia, Scholar of the First Sin</cite>
        </figcaption>
    </figure>
</div> --}}
<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <div class="d-block w-100">
                <div class="quote-container my-5 px-5">
                    <figure class="text-center">
                        <blockquote class="blockquote">
                        <p>"Once, the Lord of Light banished Dark, and all that stemmed from humanity. And men assumed a fleeting form. These are the roots of our world. Men are props on the stage of life, and no matter how tender, how exquisite... A lie will remain a lie!"</p>
                        </blockquote>
                        <figcaption class="blockquote-footer">
                        <cite title="Source Title">Aldia, Scholar of the First Sin</cite>
                        </figcaption>
                    </figure>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <div class="d-block w-100">
                <div class="quote-container my-5 px-5">
                    <figure class="text-center">
                        <blockquote class="blockquote">
                        <p>"The dragons shall never be forgotten… We knights fought valiantly, but for every one of them, we lost three score of our own. Exhiliration, pride, hatred, rage… The dragons teased out our dearest emotions. …Thou will understand, one day. At thy twilight, old thoughts return, in great waves of nostalgia."</p>
                        </blockquote>
                        <figcaption class="blockquote-footer">
                        <cite title="Source Title">Hawkeye Gough</cite>
                        </figcaption>
                    </figure>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <div class="d-block w-100">
                <div class="quote-container my-5 px-5">
                    <figure class="text-center">
                        <blockquote class="blockquote">
                        <p>"Choose thy fate alone. Seize it with thine own hands. All the more, should thy fate entail such foul betrayal."</p>
                        </blockquote>
                        <figcaption class="blockquote-footer">
                        <cite title="Source Title">Ludleth of Courland</cite>
                        </figcaption>
                    </figure>
                </div>
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
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