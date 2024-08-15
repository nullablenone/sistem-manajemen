<?php

namespace Database\Seeders;

use App\Models\ModelTas;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ModelTasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ModelTas::create([
            'nama' => 'Blue Gold',
        ]);
        ModelTas::create([
            'nama' => 'Black Flower',
        ]);
        ModelTas::create([
            'nama' => 'Cream',
        ]);
    }
}
