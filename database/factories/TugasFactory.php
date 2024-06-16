<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tugas>
 */
class TugasFactory extends Factory
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
            'waktu' => $this->faker->numberBetween(1, 9),
            'status' => 'available',
            'path' => 'storage/default.png',
        
        ];
    }
}
