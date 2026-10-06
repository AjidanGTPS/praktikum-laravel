@extends('layouts.app')

@section('judul', 'Tambah (Query Builder)')

@section('konten')
    <h1>Tambah Mahasiswa (DB::table()->insert)</h1>
    <form action="{{ route('demo.qb.simpan') }}" method="POST">
        @csrf
        <p>NIM:<br><input type="text" name="nim" value="{{ old('nim') }}"></p>
        <p>Nama:<br><input type="text" name="nama" value="{{ old('nama') }}"></p>
        <p>Prodi:<br><input type="text" name="prodi" value="{{ old('prodi') }}"></p>
        <p>Semester:<br><input type="number" name="semester" min="1" max="8" value="{{ old('semester') }}"></p>
        <button type="submit">Simpan</button>
    </form>
    <p>Uji update: <code>/demo/qb/ubah/{nim}</code> &middot; Uji delete: <code>/demo/qb/hapus/{nim}</code></p>
@endsection
