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
            'email' => 'mahasiswa@gmail.com',
        ]);

        rekap::create([
            'nama' => 'Milda Khusnul Khotimah',
            'nim' => '2131740006',
            'semester' => '6',
            'kompen' => '2',
            'email' => 'milda@gmail.com',
        ]);

    }
}
