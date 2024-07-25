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
            'email' => '2131740041@student.polinema.ac.id',
        ]);

        rekap::create([
            'nama' => 'Milda Khusnul Khotimah',
            'nim' => '2131740026',
            'semester' => '6',
            'kompen' => '2',
            'email' => '2131740026@student.polinema.ac.id',
        ]);

        Rekap::create([
            'nama' => 'Agfinita Gusti Hikmawani',
            'nim' => '2131740006',
            'semester' => '6',
            'kompen' => '6',
            'email' => '2131740006@student.polinema.ac.id',
        ]);

        Rekap::create([
            'nama' => 'Rizky Putri Meilia',
            'nim' => '2131740024',
            'semester' => '6',
            'kompen' => '1',
            'email' => '2131740024@student.polinema.ac.id',
        ]);

        Rekap::create([
            'nama' => 'Nurul Hikmah',
            'nim' => '2131740020',
            'semester' => '6',
            'kompen' => '8',
            'email' => '2131740020@student.polinema.ac.id',
        ]);

        Rekap::create([
            'nama' => 'Neisha Rindiani Armilia',
            'nim' => '2131740035',
            'semester' => '6',
            'kompen' => '6',
            'email' => '2131740035@student.polinema.ac.id',
        ]);

        Rekap::create([
            'nama' => 'Fira Ila Nufika',
            'nim' => '2131740015',
            'semester' => '6',
            'kompen' => '3',
            'email' => '2131740015@student.polinema.ac.id',
        ]);

        Rekap::create([
            'nama' => 'Aisa Dwi Yana',
            'nim' => '2331740011',
            'semester' => '5',
            'kompen' => '6',
            'email' => '2331740011@student.polinema.ac.id',
        ]);

        Rekap::create([
            'nama' => 'Mochamad Calvin Rozil',
            'nim' => '2231740047',
            'semester' => '5',
            'kompen' => '4',
            'email' => '2231740047@student.polinema.ac.id',
        ]);

        Rekap::create([
            'nama' => 'Arief Budi Raharjo',
            'nim' => '2131740043',
            'semester' => '5',
            'kompen' => '8',
            'email' => '2131740043@student.polinema.ac.id',
        ]);

        Rekap::create([
            'nama' => 'Fannisa Azzahra',
            'nim' => '2231740037',
            'semester' => '5',
            'kompen' => '6',
            'email' => '2231740037@student.polinema.ac.id',
        ]);

        Rekap::create([
            'nama' => 'Dava Anugrah Illahi Putra',
            'nim' => '2231740036',
            'semester' => '5',
            'kompen' => '8',
            'email' => '2231740036@student.polinema.ac.id',
        ]);

    }
}
