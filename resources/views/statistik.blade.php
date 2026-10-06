@extends('layouts.app')

@section('judul', 'Statistik Mahasiswa')

@section('konten')
    <h1>Statistik Mahasiswa</h1>
    <p>Total mahasiswa: <strong>{{ $total }}</strong></p>

    <table border="1" cellpadding="8" cellspacing="0">
        <tr><th>Prodi</th><th>Jumlah</th></tr>
        @foreach ($perProdi as $row)
            <tr><td>{{ $row->prodi }}</td><td>{{ $row->jumlah }}</td></tr>
        @endforeach
    </table>
@endsection
