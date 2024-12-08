<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('genres')->insert([
            ['name' => 'Action'],
            ['name' => 'Crime'],
            ['name' => 'Drama'],
            ['name' => 'Sci-Fi'],
            ['name' => 'Thriller'],
            ['name' => 'Adventure'],
            ['name' => 'Fantasy'],
            ['name' => 'Animation'],
            ['name' => 'Romance'],
            ['name' => 'Mystery'],
            ['name' => 'Biography'],
            ['name' => 'Comedy'],
            ['name' => 'Music'],
        ]);

    }
}
