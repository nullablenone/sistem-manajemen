<?php

namespace Database\Seeders;

use App\Models\Ukuran;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UkuranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Ukuran::create([
            'ukuran' => 36,
        ]);
        Ukuran::create([
            'ukuran' => 37,
        ]);
        Ukuran::create([
            'ukuran' => 38,
        ]);
        Ukuran::create([
            'ukuran' => 39,
        ]);
        Ukuran::create([
            'ukuran' => 40,
        ]);
    }
}
