<?php

namespace Database\Seeders;

use App\Models\rekap;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RekapSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        rekap::create([
            'nama' => 'Nadhirotul Laily',
            'nim' => '2131740041',
            'semester' => '6',
            'kompen' => '4',
            'email' => '2131740041@gmail.com',
        ]);

        rekap::create([
            'nama' => 'Milda Khusnul Khotimah',
            'nim' => '2131740026',
            'semester' => '6',
            'kompen' => '2',
            'email' => '2131740026@gmail.com',
        ]);

        Rekap::create([
            'nama' => 'Agfinita Gusti Hikmawani',
            'nim' => '2131740006',
            'semester' => '4',
            'kompen' => '6',
            'email' => '2131740006@gmail.com',
        ]);

        Rekap::create([
            'nama' => 'Rizky Putri Meilia',
            'nim' => '2131740024',
            'semester' => '4',
            'kompen' => '1',
            'email' => '2131740024@gmail.com',
        ]);

        Rekap::create([
            'nama' => 'Nurul Hikmah',
            'nim' => '2131740020',
            'semester' => '2',
            'kompen' => '8',
            'email' => '2131740020@gmail.com',
        ]);

        Rekap::create([
            'nama' => 'Neisha Rindiani Armilia',
            'nim' => '2131740035',
            'semester' => '2',
            'kompen' => '5',
            'email' => '2131740035@gmail.com',
        ]);

        Rekap::create([
            'nama' => 'Fira Ila Nufika',
            'nim' => '2131740035',
            'semester' => '5',
            'kompen' => '3',
            'email' => '2131740015@gmail.com',
        ]);

    }
}
