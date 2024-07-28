<?php

namespace Database\Seeders;

use App\Models\ProdukModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProdukModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProdukModel::create([
            'nama' => 'Maroon-Chain',
        ]);
        ProdukModel::create([
            'nama' => 'Blue Flower-Batik',
        ]);
        ProdukModel::create([
            'nama' => 'Elegant Golden Blue-Batik',
        ]);
        ProdukModel::create([
            'nama' => 'Blue White-Batik',
        ]);
        ProdukModel::create([
            'nama' => 'Red-Square',
        ]);
        ProdukModel::create([
            'nama' => 'Pinky-Batik',
        ]);
        ProdukModel::create([
            'nama' => 'Peach-Batik',
        ]);
        ProdukModel::create([
            'nama' => 'Only Pink-Glitter',
        ]);
        ProdukModel::create([
            'nama' => 'Blue Maroon-Batik',
        ]);
        ProdukModel::create([
            'nama' => 'Maroon Blue-Ribbon',
        ]);
        ProdukModel::create([
            'nama' => 'Golden Sky Blue-Batik',
        ]);
        ProdukModel::create([
            'nama' => 'Hitam',
        ]);
        ProdukModel::create([
            'nama' => 'Pita Kecil (Salem)',
        ]);
        ProdukModel::create([
            'nama' => 'Pita Besar (Salem)',
        ]);
        ProdukModel::create([
            'nama' => 'Ungu Pita',
        ]);
        ProdukModel::create([
            'nama' => 'Ungu - Hijau',
        ]);
        ProdukModel::create([
            'nama' => 'Mocca',
        ]);
    }
}
