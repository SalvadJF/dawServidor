<?php

namespace Database\Seeders;

use App\Models\Distribuidora;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DistribuidoraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Distribuidora::factory()
            ->count(10)
            ->create();
    }
}
