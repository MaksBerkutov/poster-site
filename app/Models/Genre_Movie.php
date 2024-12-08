<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Genre_Movie extends Model
{
    protected $fillable = [
        'genre_id',
        'movie_id',
    ];
}
