<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::factory(10)->create();

        User::create([
            'name' => 'superadmin',
            'email' => 'superadmin@gmail.com',
            'email_verified_at' => now(),
            'role' => 'superadmin',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'role' => 'superadmin',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'name' => 'Dosen',
            'email' => 'dosen@gmail.com',
            'email_verified_at' => now(),
            'role' => 'admin',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'name' => 'Mahasiswa',
            'email' => 'mahasiswa@gmail.com',
            'email_verified_at' => now(),
            'role' => 'user',
            'password' => Hash::make('password'),
        ]);
    }
}