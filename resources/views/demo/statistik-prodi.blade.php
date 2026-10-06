@extends('layouts.app')

@section('judul', 'Statistik per Prodi')

@section('konten')
    <h1>Jumlah Mahasiswa per Program Studi</h1>
    <table border="1" cellpadding="8" cellspacing="0">
        <tr><th>Prodi</th><th>Jumlah</th></tr>
        @forelse ($rekap as $row)
            <tr><td>{{ $row->prodi }}</td><td>{{ $row->jumlah }}</td></tr>
        @empty
            <tr><td colspan="2">Tidak ada data.</td></tr>
        @endforelse
    </table>
    <a href="{{ route('demo.qb.semua') }}">&laquo; Kembali</a>
@endsection
