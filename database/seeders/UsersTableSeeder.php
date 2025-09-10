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
            'email' => 'super@adminn.test',
            'role' => 'super admin',
            'password' => bcrypt('super@adminn.test'),
        ]);

        User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.test',
            'role' => 'admin',
            'password' => bcrypt('admin@admin.test'),
        ]);
    }
}
