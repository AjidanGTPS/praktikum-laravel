@extends('layouts.app')

@section('judul', 'Tambah Mahasiswa')

@section('konten')
    <h1>Tambah Mahasiswa</h1>
    <form action="{{ route('mahasiswa.store') }}" method="POST">
        @csrf
        @include('mahasiswa._form')
    </form>
@endsection
