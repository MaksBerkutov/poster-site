<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('movies')->insert([
            [
                'title' => 'The Dark Knight',
                'is_published' => true,
                'poster_url' => 'posters/default_poster.png',
            ],
            [
                'title' => 'Inception',
                'is_published' => true,
                'poster_url' => 'posters/default_poster.png',
            ],
            [
                'title' => 'The Godfather',
                'poster_url' => 'posters/default_poster.png',
                'is_published' => true,
            ],
            [
                'title' => 'Pulp Fiction',
                'poster_url' => 'posters/default_poster.png',
                'is_published' => false,
            ],
            [
                'title' => 'Forrest Gump',
                'poster_url' => 'posters/default_poster.png',
                'is_published' => true,
            ],
            [
                'title' => 'The Shawshank Redemption',
                'poster_url' => 'posters/default_poster.png',
                'is_published' => false,
            ],
            [
                'title' => 'The Matrix',
                'poster_url' => 'posters/default_poster.png',
                'is_published' => true,
            ],
            [
                'title' => 'The Lord of the Rings: The Fellowship of the Ring',
                'poster_url' => 'posters/default_poster.png',
                'is_published' => true,
            ],
            [
                'title' => 'Gladiator',
                'poster_url' => 'posters/default_poster.png',
                'is_published' => true,
            ],
            [
                'title' => 'The Lion King',
                'poster_url' => 'posters/default_poster.png',
                'is_published' => true,
            ],
            [
                'title' => 'Star Wars: Episode V - The Empire Strikes Back',
                'poster_url' => 'posters/default_poster.png',
                'is_published' => true,
            ],
            [
                'title' => 'Titanic',
                'poster_url' => 'posters/default_poster.png',
                'is_published' => true,
            ],
            [
                'title' => 'Interstellar',
                'poster_url' => 'posters/default_poster.png',
                'is_published' => true,
            ],
            [
                'title' => 'Jurassic Park',
                'poster_url' => 'posters/default_poster.png',
                'is_published' => true,
            ],
            [
                'title' => 'The Terminator',
                'poster_url' => 'posters/default_poster.png',
                'is_published' => false,
            ],
            [
                'title' => 'Fight Club',
                'poster_url' => 'posters/default_poster.png',
                'is_published' => true,
            ],
            [
                'title' => 'The Silence of the Lambs',
                'poster_url' => 'posters/default_poster.png',
                'is_published' => true,
            ],
            [
                'title' => 'The Social Network',
                'poster_url' => 'posters/default_poster.png',
                'is_published' => true,
            ],
            [
                'title' => 'The Prestige',
                'poster_url' => 'posters/default_poster.png',
                'is_published' => true,
            ],
            [
                'title' => 'Deadpool',
                'poster_url' => 'posters/default_poster.png',
                'is_published' => true,
            ],
            [
                'title' => 'The Revenant',
                'poster_url' => 'posters/default_poster.png',
                'is_published' => true,
            ],
            [
                'title' => 'The Wolf of Wall Street',
                'poster_url' => 'posters/default_poster.png',
                'is_published' => true,
            ],
            [
                'title' => 'The Grand Budapest Hotel',
                'poster_url' => 'posters/default_poster.png',
                'is_published' => true,
            ],
            [
                'title' => 'Shutter Island',
                'poster_url' => 'posters/default_poster.png',
                'is_published' => true,
            ],
            [
                'title' => 'Mad Max: Fury Road',
                'poster_url' => 'posters/default_poster.png',
                'is_published' => true,
            ],
            [
                'title' => 'Avatar',
                'poster_url' => 'posters/default_poster.png',
                'is_published' => true,
            ],
            [
                'title' => 'La La Land',
                'poster_url' => 'posters/default_poster.png',
                'is_published' => true,
            ],
        ]);
    }
}
