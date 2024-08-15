<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'super admin',
            'email' => 'super@admin.xxx',
            'role' => 'super admin',
            'password' => bcrypt('super@admin.xxx'),
        ]);

        User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.xxx',
            'role' => 'admin',
            'password' => bcrypt('admin@admin.xxx'),
        ]);
    }
}
