<?php

namespace Database\Seeders;

use App\Models\Mahasiswa;
use Illuminate\Database\Seeder;

class MahasiswaSeeder extends Seeder
{
    public function run(): void
    {
        Mahasiswa::create([
            'nim' => 'C050425040',
            'nama' => 'Muhammad Ajidannoor Arsyad',
            'email' => 'ajidannoor@kampus.ac.id',
            'prodi' => 'Sistem Informasi Kota Cerdas',
            'semester' => 3,
        ]);

        Mahasiswa::factory()->count(50)->create();
    }
}
