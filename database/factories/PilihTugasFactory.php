<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\pilih_tugas>
 */
class PilihTugasFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
            'tugas' => $this->faker->sentence($nbWords = 3),
            'waktu' => $this->faker->randomDigit(),
            'status' => 'available',
            // 'bukti_tugas' => 'storage/default.png',
        ];
    }
}
