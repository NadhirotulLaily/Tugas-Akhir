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
            'name' => 'Milda Khusnul Khatimah',
            'email' => '2131740026@gmail.com',
            'email_verified_at' => now(),
            'role' => 'user',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'name' => 'Nadhirotul Laily',
            'email' => '2131740041@gmail.com',
            'email_verified_at' => now(),
            'role' => 'user',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'name' => 'Agfinita Gusti Hikmawani',
            'email' => '2131740006@gmail.com',
            'email_verified_at' => now(),
            'role' => 'user',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'name' => 'Rizky Putri Meilia',
            'email' => '2131740024@gmail.com',
            'email_verified_at' => now(),
            'role' => 'user',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'name' => 'Nurul Hikmah',
            'email' => '2131740020@gmail.com',
            'email_verified_at' => now(),
            'role' => 'user',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'name' => 'Neisha Rindiani Armilia',
            'email' => '2131740035@gmail.com',
            'email_verified_at' => now(),
            'role' => 'user',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'name' => 'Fira Ila Nufika',
            'email' => '2131740015@gmail.com',
            'email_verified_at' => now(),
            'role' => 'user',
            'password' => Hash::make('password'),
        ]);
    }
}