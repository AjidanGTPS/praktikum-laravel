<?php

namespace Database\Seeders;

use App\Models\Matakuliah;
use Illuminate\Database\Seeder;

class MatakuliahSeeder extends Seeder
{
    public function run(): void
    {
        Matakuliah::insert([
            ['kode' => 'IF101', 'nama' => 'Pemrograman Web', 'sks' => 3],
            ['kode' => 'IF102', 'nama' => 'Basis Data', 'sks' => 4],
            ['kode' => 'IF103', 'nama' => 'Algoritma', 'sks' => 3],
            ['kode' => 'IF104', 'nama' => 'Jaringan Komputer', 'sks' => 4],
            ['kode' => 'IF105', 'nama' => 'Kewarganegaraan', 'sks' => 2],
        ]);

        Matakuliah::factory()->count(15)->create();
    }
}
