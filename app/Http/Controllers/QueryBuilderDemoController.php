<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QueryBuilderDemoController extends Controller
{
    public function tampilkanSemua()
    {
        $data = DB::table('mahasiswas')->get();
        return view('demo.query-builder', ['data' => $data, 'judul' => 'Semua Mahasiswa']);
    }

    public function tampilkanFilter()
    {
        $data = DB::table('mahasiswas')
            ->where('semester', '>=', 3)
            ->orderBy('nama')
            ->get();
        return view('demo.query-builder', ['data' => $data, 'judul' => 'Mahasiswa Semester >= 3']);
    }

    // Tugas 1: prodi + semester 3-6, urut nama A-Z
    public function tugasFilter()
    {
        $data = DB::table('mahasiswas')
            ->where('prodi', 'Teknik Informatika')
            ->whereBetween('semester', [3, 6])
            ->orderBy('nama', 'asc')
            ->get();
        return view('demo.query-builder', ['data' => $data, 'judul' => 'Teknik Informatika, Semester 3-6 (A-Z)']);
    }

    public function statistikProdi()
    {
        $rekap = DB::table('mahasiswas')
            ->select('prodi', DB::raw('count(*) as jumlah'))
            ->groupBy('prodi')
            ->get();

        return view('demo.statistik-prodi', compact('rekap'));
    }

    // Tugas 3: paginate(10)
    public function paginasi()
    {
        $data = DB::table('mahasiswas')->orderBy('nama')->paginate(10);
        return view('demo.query-builder', ['data' => $data, 'judul' => 'Mahasiswa (Paginate 10)']);
    }

    public function formTambah()
    {
        return view('demo.form-tambah');
    }

    public function simpan(Request $request)
    {
        $data = $request->validate([
            'nim' => 'required|unique:mahasiswas,nim',
            'nama' => 'required',
            'prodi' => 'required',
            'semester' => 'required|integer|between:1,8',
        ]);

        DB::table('mahasiswas')->insert($data + ['created_at' => now(), 'updated_at' => now()]);

        return redirect()->route('demo.qb.semua')->with('pesan', 'Insert berhasil');
    }

    public function ubah(string $nim)
    {
        $jumlah = DB::table('mahasiswas')->where('nim', $nim)->update(['semester' => 4, 'updated_at' => now()]);
        return "Update: {$jumlah} baris diubah (semester -> 4) untuk NIM {$nim}";
    }

    public function hapus(string $nim)
    {
        $jumlah = DB::table('mahasiswas')->where('nim', $nim)->delete();
        return "Delete: {$jumlah} baris dihapus untuk NIM {$nim}";
    }
}
