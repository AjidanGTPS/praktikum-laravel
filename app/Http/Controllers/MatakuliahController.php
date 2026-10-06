<?php

namespace App\Http\Controllers;

use App\Models\Matakuliah;
use Illuminate\Http\Request;

class MatakuliahController extends Controller
{
    public function index()
    {
        $matakuliah = Matakuliah::withCount('nilai')->get();
        return view('matakuliah.index', compact('matakuliah'));
    }

    public function create()
    {
        return view('matakuliah.create');
    }

    public function store(Request $request)
    {
        Matakuliah::create($request->validate($this->rules()));
        return redirect()->route('matakuliah.index')->with('pesan', 'Data berhasil ditambahkan');
    }

    // Route Model Binding
    public function show(Matakuliah $matakuliah)
    {
        $matakuliah->load('nilai.mahasiswa'); // mahasiswa yang mengambil mata kuliah ini
        return view('matakuliah.show', compact('matakuliah'));
    }

    public function edit(Matakuliah $matakuliah)
    {
        return view('matakuliah.edit', compact('matakuliah'));
    }

    public function update(Request $request, Matakuliah $matakuliah)
    {
        $matakuliah->update($request->validate($this->rules($matakuliah)));
        return redirect()->route('matakuliah.index')->with('pesan', 'Data berhasil diperbarui');
    }

    public function destroy(Matakuliah $matakuliah)
    {
        $matakuliah->delete();
        return redirect()->route('matakuliah.index')->with('pesan', 'Data berhasil dihapus');
    }

    private function rules(?Matakuliah $matakuliah = null): array
    {
        return [
            'kode' => ['required', 'string', 'max:20', 'unique:matakuliahs,kode,' . $matakuliah?->id],
            'nama' => ['required', 'string', 'max:255'],
            'sks' => ['required', 'integer', 'between:1,6'],
        ];
    }
}
