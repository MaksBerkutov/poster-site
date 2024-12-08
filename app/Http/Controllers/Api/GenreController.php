<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function index()
    {
        $genres = Genre::all();

        return response()->json([
            'success' => true,
            'data' => $genres,
        ]);
    }

    public function show($id, Request $request)
    {
        $perPage = $request->query('per_page', 10);
        $genre = Genre::with('movies')->find($id);


        if (!$genre) {
            return response()->json([
                'success' => false,
                'message' => 'Genre not found',
            ], 404);
        }

        $movies = $genre->movies()->with('genres')->paginate($perPage);




        return response()->json([
            'success' => true,
            'data' => $movies,
        ]);
    }
}
