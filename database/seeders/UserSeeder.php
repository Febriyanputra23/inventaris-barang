<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Admin
        User::create([
            'name' => 'Admin Utama',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        // Petugas
        User::create([
            'name' => 'Petugas Satu',
            'email' => 'petugas@example.com',
            'password' => Hash::make('password'),
            'role' => 'petugas',
        ]);

        // Pimpinan
        User::create([
            'name' => 'Pimpinan Besar',
            'email' => 'pimpinan@example.com',
            'password' => Hash::make('password'),
            'role' => 'pimpinan',
        ]);
    }
}

