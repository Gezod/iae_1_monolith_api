<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MovieController extends Controller
{
    public function index(Request $request)
    {
        $title = $request->input('title');

        // Jika ada title, lakukan pencarian film
        if ($title) {
            $movies = $this->searchMovies($title);
        } else {
            // Jika tidak ada title, ambil film berdasarkan filter
            $filter = $request->query('filter');
            switch ($filter) {
                case 'top-rated':
                    $movies = $this->fetchTopRatedMovies();
                    break;
                case 'latest':
                    $movies = $this->fetchLatestMovies();
                    break;
                default:
                    $movies = $this->fetchPopularMovies();
                    break;
            }
        }

        return view('movies.index', compact('movies'));
    }

    private function searchMovies($title)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiJkOTIzYTRmNjk5MWJjMjk0Njc1NTdkMTlhYmQ3MmJmNCIsIm5iZiI6MTc0MTY2MDI2My41MDgsInN1YiI6IjY3Y2ZhMDY3Y2UyMGNmMTk3MjYwN2JmZCIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.Tua_ms8rw-y8vh-HmEwFLSLqiAfdyqck66z-j6awvJ8 ' . env('TMDB_TOKEN'),
            'Accept' => 'application/json',
        ])->get('https://api.themoviedb.org/3/search/movie', [
            'query' => $title,
            'include_adult' => false,
            'language' => 'en-US',
            'page' => 1,
        ]);

        return $this->getResults($response);
    }

    private function fetchPopularMovies()
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiJkOTIzYTRmNjk5MWJjMjk0Njc1NTdkMTlhYmQ3MmJmNCIsIm5iZiI6MTc0MTY2MDI2My41MDgsInN1YiI6IjY3Y2ZhMDY3Y2UyMGNmMTk3MjYwN2JmZCIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.Tua_ms8rw-y8vh-HmEwFLSLqiAfdyqck66z-j6awvJ8 ' . env('TMDB_TOKEN'),
            'Accept' => 'application/json',
        ])->get('https://api.themoviedb.org/3/movie/popular');

        return $this->getResults($response);
    }

    private function fetchTopRatedMovies()
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiJkOTIzYTRmNjk5MWJjMjk0Njc1NTdkMTlhYmQ3MmJmNCIsIm5iZiI6MTc0MTY2MDI2My41MDgsInN1YiI6IjY3Y2ZhMDY3Y2UyMGNmMTk3MjYwN2JmZCIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.Tua_ms8rw-y8vh-HmEwFLSLqiAfdyqck66z-j6awvJ8 ' . env('TMDB_TOKEN'),
            'Accept' => 'application/json',
        ])->get('https://api.themoviedb.org/3/movie/top_rated');

        return $this->getResults($response);
    }

    private function fetchLatestMovies()
    {
        // Hitung rentang tanggal 3 bulan terakhir
        $startDate = date('Y-m-d', strtotime('-3 months'));
        $endDate = date('Y-m-d');

        $response = Http::withHeaders([
            'Authorization' => 'Bearer eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiJkOTIzYTRmNjk5MWJjMjk0Njc1NTdkMTlhYmQ3MmJmNCIsIm5iZiI6MTc0MTY2MDI2My41MDgsInN1YiI6IjY3Y2ZhMDY3Y2UyMGNmMTk3MjYwN2JmZCIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.Tua_ms8rw-y8vh-HmEwFLSLqiAfdyqck66z-j6awvJ8 ' . env('TMDB_TOKEN'),
            'Accept' => 'application/json',
        ])->get('https://api.themoviedb.org/3/discover/movie', [
            'primary_release_date.gte' => $startDate,
            'primary_release_date.lte' => $endDate,
            'vote_average.gte' => 2.0,
            'sort_by' => 'release_date.desc',
        ]);

        return $this->getResults($response);
    }

    public function show($id)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiJkOTIzYTRmNjk5MWJjMjk0Njc1NTdkMTlhYmQ3MmJmNCIsIm5iZiI6MTc0MTY2MDI2My41MDgsInN1YiI6IjY3Y2ZhMDY3Y2UyMGNmMTk3MjYwN2JmZCIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.Tua_ms8rw-y8vh-HmEwFLSLqiAfdyqck66z-j6awvJ8 ' . env('TMDB_TOKEN'),
            'Accept' => 'application/json',
        ])->get("https://api.themoviedb.org/3/movie/{$id}");

        if ($response->successful()) {
            $movie = $response->json();
            return view('movies.show', compact('movie'));
        } else {
            return redirect()->route('movies.index')->with('error', 'Movie not found');
        }
    }

    private function getResults($response)
    {
        if ($response->successful()) {
            $data = $response->json();
            return $data['results'] ?? [];
        }
        return [];
    }
}
