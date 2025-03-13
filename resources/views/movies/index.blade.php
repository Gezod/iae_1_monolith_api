@extends('layouts.app')

@section('content')
    <!-- Popular Movies Section -->
    <section class="bg-white py-12 px-20">
        <div class="container mx-auto text-center">
            <div class="grid grid-cols-1 m-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                @foreach ($movies as $movie)
                    <div class="bg-gray-200 mb-10 rounded-lg overflow-hidden shadow-md">
                        <div class="poster-container" style="height: 250px;">
                            <img src="https://image.tmdb.org/t/p/w300{{ $movie['poster_path'] }}" alt="{{ $movie['title'] }}"
                                 class="w-full h-full object-center transition-transform duration-300 transform hover:scale-105">
                        </div>
                        <div class="p-4 flex flex-col justify-center items-center">
                            <a href="{{ route('movies.show', $movie['id']) }}"
                               class="text-lg font-bold mb-2 hover:text-red-700 hover:underline">{{ $movie['title'] }}</a>
                            <p class="text-gray-600">Rating: {{ $movie['vote_average'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
