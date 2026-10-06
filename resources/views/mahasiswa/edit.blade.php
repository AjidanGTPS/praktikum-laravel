@extends('layouts.app')

@section('judul', 'Edit Mahasiswa - ' . $mahasiswa->nama)

@section('konten')
    <h1>Edit Mahasiswa</h1>
    <form action="{{ route('mahasiswa.update', $mahasiswa) }}" method="POST">
        @csrf
        @method('PUT')
        @include('mahasiswa._form')
    </form>
@endsection
