<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index(Request $request)
    {
        $perPage = $request->query('per_page', 10);
        $movies = Movie::with('genres')->makeHidden('pivot')->paginate($perPage);

        return response()->json([
            'success' => true,
            'data' => $movies,
        ]);
    }

    public function show($id)
    {
        $movie = Movie::with('genres')->find($id)->makeHidden('pivot');

        if (!$movie) {
            return response()->json([
                'success' => false,
                'message' => 'Movie not found',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $movie,
        ]);
    }
}
