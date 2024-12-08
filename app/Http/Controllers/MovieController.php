<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index(){
        $movies = Movie::paginate(10);
        return view('Movies.index', compact('movies'));
    }
    public function create(){
        $genres = Genre::all();
        return view('Movies.create', compact('genres'));
    }
    public function store(Request $request){
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'poster'=> ['nullable', 'mimes:jpeg,png,jpg', 'max:2048'],
            'genres' => ['required', 'array'],
            'genres.*' => ['exists:genres,id'],
        ]);


        $posterPath = $request->hasFile('poster') ?
            $request->file('poster')->store('posters', 'public') :
            'posters/default_poster.png';

        $movie = Movie::create([
            'title' => $validated['title'],
            'poster_url' => $posterPath,
            'is_published' => false,
        ]);
        $movie->genres()->attach($validated['genres']);

        return redirect()->route('movies.index')->with('success', __('movie.message_create_success'));
    }
    public function edit(Movie $movie){
        $genres = Genre::all();
        $selectedGenres = $movie->genres->pluck('id')->toArray();
        return view('Movies.edit', compact('movie', 'genres', 'selectedGenres'));
    }
    public function update(Request $request, Movie $movie){
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'poster' => ['nullable', 'mimes:jpeg,png,jpg', 'max:2048'],
            'genres' => ['required', 'array'],
            'genres.*' => ['exists:genres,id'],
        ]);

        if ($request->hasFile('poster')) {
            $posterPath = $request->file('poster')->store('posters', 'public');
            $movie->update(['poster' => $posterPath]);
        }

        $movie->update([
            'title' => $validated['title'],
        ]);

        $movie->genres()->sync($validated['genres']);
        return redirect()->route('movies.index')->with('success', __("movie.message_update_success"));
    }
    public function destroy(Movie $movie){
        $movie->delete();
        return redirect()->route('movies.index')->with('success', __('movie.message_delete_success'));
    }
    public function publish($id)
    {
        $movie = Movie::findOrFail($id);
        $movie->is_published = true;
        $movie->save();

        return redirect()->route('movies.index')->with('success', __('movie.message_publish_success'));
    }
}
