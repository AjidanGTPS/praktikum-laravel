@extends('layouts.app')

@section('judul', 'Laporan Rekap')

@section('konten')
    <h1>Laporan Rekap (Query Builder)</h1>

    <h3>Rekap Mahasiswa per Program Studi</h3>
    <table border="1" cellpadding="8" cellspacing="0">
        <tr><th>Prodi</th><th>Jumlah</th><th>Rata-rata Semester</th></tr>
        @forelse ($rekapProdi as $row)
            <tr><td>{{ $row->prodi }}</td><td>{{ $row->jumlah }}</td><td>{{ number_format($row->rata_semester, 1) }}</td></tr>
        @empty
            <tr><td colspan="3">Belum ada data.</td></tr>
        @endforelse
    </table>

    <h3>Rata-rata Nilai per Mata Kuliah (Join, Top 10)</h3>
    <table border="1" cellpadding="8" cellspacing="0">
        <tr><th>Mata Kuliah</th><th>Peserta</th><th>Rata-rata Nilai</th></tr>
        @forelse ($rekapNilai as $row)
            <tr><td>{{ $row->matakuliah }}</td><td>{{ $row->peserta }}</td><td>{{ number_format($row->rata_nilai, 1) }}</td></tr>
        @empty
            <tr><td colspan="3">Belum ada data.</td></tr>
        @endforelse
    </table>

    <p>Total SKS seluruh mata kuliah: <strong>{{ $totalSks }}</strong></p>
@endsection
