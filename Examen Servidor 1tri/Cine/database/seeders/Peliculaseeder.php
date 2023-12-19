<?php

namespace Database\Seeders;

use App\Models\Pelicula;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class Peliculaseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pelicula::factory()->count(10)->create();
    }
}
