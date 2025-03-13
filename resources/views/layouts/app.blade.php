<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Filmatic | Movies & Series</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    @yield('styles')
</head>

<body>
    <div class="bg-gray-900 text-white p-4">
        <div class="container mx-auto flex justify-between items-center">
            <a class="text-2xl font-bold" href="{{ route('movies.index') }}">AnggaFilm</a>
            <div class="flex items-center">

                <form method="GET" action="{{ route('movies.index') }}" class="flex items-center mb-4 space-x-2">
                    <input type="text" name="title" placeholder="Search movies..."
                        class="w-48 px-4 py-2 text-black rounded-l focus:outline-none" value="{{ request('title') }}" />
                    <input type="hidden" name="filter" value="{{ request('filter') }}">
                    <button type="submit" class="bg-gray-800 text-white px-4 py-2 rounded-r">Search</button>
                </form>
            </div>
        </div>
    </div>

    <section class="bg-gray-900 text-white py-4">
        <div class="container mx-auto flex justify-between items-center">
            <ul class="flex space-x-4">
                @php
                    $filters = [
                        '' => 'Popular',
                        'latest' => 'Latest',
                        'top-rated' => 'Top Rated',
                    ];
                @endphp
                @foreach ($filters as $key => $label)
                    <li>
                        <a href="{{ route('movies.index', [...request()->query(), 'filter' => $key]) }}"
                            class=" ml-4 sm:ml-0
                                {{ request('filter') === $key || (request('filter') === null && $key === '') ? 'bg-white text-black px-3 py-2 rounded ' : 'hover:bg-gray-800 px-3 py-2 rounded' }}">
                            {{ $label }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </section>
    @yield('content')
</body>

</html>
