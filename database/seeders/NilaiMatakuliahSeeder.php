<?php

namespace Database\Seeders;

use App\Models\Mahasiswa;
use App\Models\Matakuliah;
use App\Models\NilaiMatakuliah;
use Illuminate\Database\Seeder;

class NilaiMatakuliahSeeder extends Seeder
{
    public function run(): void
    {
        $matakuliahIds = Matakuliah::pluck('id');

        // Tiap mahasiswa mengambil 3 mata kuliah acak
        Mahasiswa::all()->each(function (Mahasiswa $mhs) use ($matakuliahIds) {
            $matakuliahIds->random(3)->each(fn ($mkId) => NilaiMatakuliah::factory()->create([
                'mahasiswa_id' => $mhs->id,
                'matakuliah_id' => $mkId,
            ]));
        });
    }
}
