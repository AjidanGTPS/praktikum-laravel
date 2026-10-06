@extends('layouts.app')

@section('judul', 'Cari Mahasiswa')

@section('konten')
    <h1>Cari Mahasiswa</h1>
    <form action="{{ route('mahasiswa.cari.hasil') }}" method="GET">
        <input type="text" name="nama" placeholder="Nama mahasiswa">
        <button type="submit">Cari</button>
    </form>
@endsection
