<?php

namespace Database\Seeders;

use App\Models\Bodega;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BodegaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Bodega::insert([
            ['nombre' => 'Lo Aguirre'],
            ['nombre' => 'Puerto Madero'],
            ['nombre' => 'CD Vespucio'],
            ['nombre' => 'Congelado'],
            ['nombre' => 'CD Noviciado'],
            ['nombre' => 'CD Chillan'],
            ['nombre' => 'CT Concepcion'],
        ]);
    }
}
