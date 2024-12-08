<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function index(){
        $genres = Genre::paginate(10);
        return view('Genres.index', compact('genres'));
    }
    public function create(){
        return view('Genres.create');
    }
    public function store(Request $request){
        $request->validate([
            'name' => ['required','string','max:255']
        ]);
        Genre::create($request->all());
        return redirect()->route('genres.index')->with('success', __('genre.message_create_success'));
    }
    public function edit(Genre $genre){
        return view('Genres.edit', compact('genre'));
    }
    public function update(Request $request,Genre  $genre){
        $request->validate([
            'name' => ['required','string','max:255']
        ]);
        $genre->update($request->all());
        return redirect()->route('genres.index')->with('success',  __('genre.message_update_success'));
    }
    public function destroy(Genre $genre)
    {
        $genre->delete();
        return redirect()->route('genres.index')->with('success', __('genre.message_delete_success'));
    }
}
