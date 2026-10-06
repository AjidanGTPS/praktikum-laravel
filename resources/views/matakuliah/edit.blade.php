@extends('layouts.app')

@section('judul', 'Edit Mata Kuliah - ' . $matakuliah->nama)

@section('konten')
    <h1>Edit Mata Kuliah</h1>
    <form action="{{ route('matakuliah.update', $matakuliah) }}" method="POST">
        @csrf
        @method('PUT')
        @include('matakuliah._form')
    </form>
@endsection
