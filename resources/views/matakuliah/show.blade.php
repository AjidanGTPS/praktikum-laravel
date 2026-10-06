@extends('layouts.app')

@section('judul', 'Detail Mata Kuliah - ' . $matakuliah->nama)

@section('konten')
    <h1>Detail Mata Kuliah</h1>
    <p><strong>Kode:</strong> {{ $matakuliah->kode }}</p>
    <p><strong>Nama:</strong> {{ $matakuliah->nama }}</p>
    <p><strong>SKS:</strong> {{ $matakuliah->sks }}</p>

    <h3>Mahasiswa yang Mengambil</h3>
    @forelse ($matakuliah->nilai as $n)
        <p>{{ $n->mahasiswa->nama }} ({{ $n->mahasiswa->nim }}) &mdash; nilai: {{ $n->nilai }}</p>
    @empty
        <p>Belum ada mahasiswa yang mengambil mata kuliah ini.</p>
    @endforelse

    <a href="{{ route('matakuliah.index') }}">&laquo; Kembali</a>
@endsection
