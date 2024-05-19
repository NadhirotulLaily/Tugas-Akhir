<?php

namespace Database\Seeders;

use App\Models\PilihTugas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PilihTugasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        PilihTugas::factory()->count(10)->create();
    }
}
