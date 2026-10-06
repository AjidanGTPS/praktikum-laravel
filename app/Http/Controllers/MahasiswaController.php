<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MahasiswaController extends Controller
{
    public function index()
    {
        // Eager loading: relasi 'nilai' dimuat dalam 1 query tambahan
        $mahasiswa = Mahasiswa::with('nilai')->orderBy('nama')->paginate(10);
        return view('mahasiswa.index', compact('mahasiswa'));
    }

    public function create()
    {
        return view('mahasiswa.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate($this->rules());
        Mahasiswa::create($data);
        return redirect()->route('mahasiswa.index')->with('pesan', 'Data berhasil ditambahkan');
    }

    // Route Model Binding
    public function show(Mahasiswa $mahasiswa)
    {
        $mahasiswa->load('nilai.matakuliah'); // eager load relasi bertingkat
        return view('mahasiswa.show', compact('mahasiswa'));
    }

    public function edit(Mahasiswa $mahasiswa)
    {
        return view('mahasiswa.edit', compact('mahasiswa'));
    }

    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        $data = $request->validate($this->rules($mahasiswa));
        $mahasiswa->update($data);
        return redirect()->route('mahasiswa.index')->with('pesan', 'Data berhasil diperbarui');
    }

    public function destroy(Mahasiswa $mahasiswa)
    {
        $mahasiswa->delete();
        return redirect()->route('mahasiswa.index')->with('pesan', 'Data berhasil dihapus');
    }

    // --- Praktikum 2: menerima input dari Request ---

    public function formUji()
    {
        return view('mahasiswa.form-uji');
    }

    public function storeUji(Request $request)
    {
        $nama = $request->input('nama');
        $nim = $request->input('nim');

        return "Data yang diterima -> NIM: {$nim}, Nama: {$nama}";
    }

    public function apiIndex()
    {
        return response()->json([
            'status' => 'sukses',
            'pesan' => 'Ini contoh response JSON dari Controller',
        ]);
    }

    public function cariMahasiswa(Request $request)
    {
        $nama = $request->query('nama');

        return "Anda mencari mahasiswa dengan kata kunci: {$nama}";
    }

    public function formCari()
    {
        return view('mahasiswa.cari');
    }

    // --- Praktikum 7: bukti manfaat eager loading ---

    public function bandingQuery()
    {
        DB::enableQueryLog();
        foreach (Mahasiswa::limit(10)->get() as $mhs) {
            $mhs->nilai->count();
        }
        $tanpa = count(DB::getQueryLog());

        DB::flushQueryLog();
        foreach (Mahasiswa::with('nilai')->limit(10)->get() as $mhs) {
            $mhs->nilai->count();
        }
        $dengan = DB::getQueryLog();

        return view('mahasiswa.banding-query', [
            'tanpa' => $tanpa,
            'dengan' => count($dengan),
            'logDengan' => $dengan,
        ]);
    }

    private function rules(?Mahasiswa $mahasiswa = null): array
    {
        return [
            'nim' => ['required', 'string', 'max:20', 'unique:mahasiswas,nim,' . $mahasiswa?->id],
            'nama' => ['required', 'string', 'max:255'],
            'email' => ['nullable', 'email', 'max:255'],
            'prodi' => ['required', 'string', 'max:255'],
            'semester' => ['required', 'integer', 'between:1,8'],
        ];
    }
}
