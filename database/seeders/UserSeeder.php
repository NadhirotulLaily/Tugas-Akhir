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
            'name' => 'Dion Cahya',
            'email' => 'dioncahya@polinema.ac.id',
            'email_verified_at' => now(),
            'role' => 'superadmin',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'name' => 'Alvionitha Sara',
            'email' => 'alvionithasara@polinema.ac.id',
            'email_verified_at' => now(),
            'role' => 'admin',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'name' => 'Very Sugiarto',
            'email' => 'very.sugiarto@polinema.ac.id',
            'email_verified_at' => now(),
            'role' => 'admin',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'name' => 'Milda Khusnul Khotimah',
            'email' => '2131740026@student.polinema.ac.id',
            'email_verified_at' => now(),
            'role' => 'user',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'name' => 'Nadhirotul Laily',
            'email' => '2131740041@student.polinema.ac.id',
            'email_verified_at' => now(),
            'role' => 'user',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'name' => 'Agfinita Gusti Hikmawani',
            'email' => '2131740006@student.polinema.ac.id',
            'email_verified_at' => now(),
            'role' => 'user',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'name' => 'Rizky Putri Meilia',
            'email' => '2131740024@student.polinema.ac.id',
            'email_verified_at' => now(),
            'role' => 'user',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'name' => 'Nurul Hikmah',
            'email' => '2131740020@student.polinema.ac.id',
            'email_verified_at' => now(),
            'role' => 'user',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'name' => 'Neisha Rindiani Armilia',
            'email' => '2131740035@student.polinema.ac.id',
            'email_verified_at' => now(),
            'role' => 'user',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'name' => 'Fira Ila Nufika',
            'email' => '2131740015@student.polinema.ac.id',
            'email_verified_at' => now(),
            'role' => 'user',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'name' => 'Aisa Dwi Yana',
            'email' => '2331740011@student.polinema.ac.id',
            'email_verified_at' => now(),
            'role' => 'user',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'name' => 'Mochamad Calvin Rozil',
            'email' => '2231740047@student.polinema.ac.id',
            'email_verified_at' => now(),
            'role' => 'user',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'name' => 'Arief Budi Raharjo',
            'email' => '2131740043@student.polinema.ac.id',
            'email_verified_at' => now(),
            'role' => 'user',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'name' => 'Fannisa Azzahra',
            'email' => '2231740037@student.polinema.ac.id',
            'email_verified_at' => now(),
            'role' => 'user',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'name' => 'Dava Anugrah Illahi Putra',
            'email' => '2231740036@student.polinema.ac.id',
            'email_verified_at' => now(),
            'role' => 'user',
            'password' => Hash::make('password'),
        ]);
    }
}