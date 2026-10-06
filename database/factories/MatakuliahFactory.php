<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MatakuliahFactory extends Factory
{
    public function definition(): array
    {
        return [
            'kode' => fake()->unique()->bothify('MK-###??'),
            'nama' => fake()->unique()->words(3, true),
            'sks' => fake()->numberBetween(1, 4),
        ];
    }
}
