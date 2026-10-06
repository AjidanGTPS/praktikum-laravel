<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MahasiswaFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nim' => fake()->unique()->numerify('2024######'),
            'nama' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'prodi' => fake()->randomElement(['Teknik Informatika', 'Sistem Informasi', 'Teknik Komputer']),
            'semester' => fake()->numberBetween(1, 8),
        ];
    }
}
