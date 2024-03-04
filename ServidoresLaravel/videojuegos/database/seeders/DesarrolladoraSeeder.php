<?php

namespace Database\Seeders;

use App\Models\Desarrolladora;
use Database\Factories\DesarrolladoraFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DesarrolladoraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Desarrolladora::factory()
            ->count(10)
            ->create();
    }
}
