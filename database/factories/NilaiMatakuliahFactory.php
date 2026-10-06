<?php

namespace Database\Factories;

use App\Models\Mahasiswa;
use App\Models\Matakuliah;
use Illuminate\Database\Eloquent\Factories\Factory;

class NilaiMatakuliahFactory extends Factory
{
    public function definition(): array
    {
        return [
            'mahasiswa_id' => Mahasiswa::inRandomOrder()->value('id') ?? Mahasiswa::factory(),
            'matakuliah_id' => Matakuliah::inRandomOrder()->value('id') ?? Matakuliah::factory(),
            'nilai' => fake()->numberBetween(50, 100),
        ];
    }
}
