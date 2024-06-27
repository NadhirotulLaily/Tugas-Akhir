<?php

namespace Database\Seeders;

use App\Models\Tugas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TugasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // Tugas::factory()->count(10)->create();

        Tugas::create([
            'Tugas' => 'Melakukan installasi Apikasi pada Lab A',
            'Waktu' => 6,
            'Status' => 'available',
        ]);

        Tugas::create([
            'Tugas' => 'Membersihkan Ruang Lab C dan Lab B',
            'Waktu' => 2,
            'Status' => 'available',
        ]);

        Tugas::create([
            'Tugas' => 'Menerjemahkan Jurnal',
            'Waktu' => 4,
            'Status' => 'available',
        ]);

    }
}
