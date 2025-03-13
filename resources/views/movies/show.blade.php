@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href={{ url('css/app.css') }}>
@endsection

@section('content')
    <div class="movie-card">
        <div class="movie-image-container"
            style="background-image: url('https://image.tmdb.org/t/p/w500/{{ $movie['poster_path'] }}');">
            <img src="https://image.tmdb.org/t/p/w500/{{ $movie['poster_path'] }}" alt="{{ $movie['title'] }}" class="">
        </div>
        <div class="movie-info">
            <!-- Movie Title -->
            <h3 class="movie-title">{{ $movie['title'] }}</h3>
            <!-- Movie Overview -->
            <h5 class="movie-overview">{{ $movie['overview'] }}</h5>
            <!-- Movie Genre -->
            <p class="movie-genre"><span class="span">Genre:</span>
                {{ implode(', ', array_column($movie['genres'], 'name')) }}
            </p>
            <!-- Release Date -->
            <p class="movie-date"><span class="span">Release Date:</span> {{ $movie['release_date'] }}</p>
            <!-- Rating -->
            <p class="movie-vote"><span class="span">Rating:</span> {{ $movie['vote_average'] }}</p>
            <!-- Budget -->
            <p class="movie-budget"><span class="span">Budget:</span>
                ${{ number_format($movie['budget'] / 10000000, 2) }} crore
            </p>
            <!-- Revenue -->
            <p class="movie-revenue"><span class="span">Revenue:</span>
                ${{ number_format($movie['revenue'] / 10000000, 2) }} crore
            </p>
        </div>
    </div>
@endsection
