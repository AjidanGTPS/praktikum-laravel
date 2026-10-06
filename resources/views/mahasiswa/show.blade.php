@extends('layouts.app')

@section('judul', 'Detail Mahasiswa - ' . $mahasiswa->nama)

@section('konten')
    <h1>Detail Mahasiswa</h1>
    <p><strong>NIM:</strong> {{ $mahasiswa->nim }}</p>
    <p><strong>Nama:</strong> {{ $mahasiswa->nama }}</p>
    <p><strong>Email:</strong> {{ $mahasiswa->email ?? '-' }}</p>
    <p><strong>Prodi:</strong> {{ $mahasiswa->prodi }}</p>
    <p><strong>Semester:</strong> {{ $mahasiswa->semester }} ({{ $mahasiswa->status }})</p>

    <h3>Daftar Nilai</h3>
    @forelse ($mahasiswa->nilai as $n)
        <p>{{ $n->matakuliah->nama ?? '-' }}: {{ $n->nilai }}</p>
    @empty
        <p>Belum ada data nilai.</p>
    @endforelse

    <a href="{{ route('mahasiswa.index') }}">&laquo; Kembali</a>
@endsection
