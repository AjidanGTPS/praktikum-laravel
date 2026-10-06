@extends('layouts.app')

@section('judul', 'Tambah Mata Kuliah')

@section('konten')
    <h1>Tambah Mata Kuliah</h1>
    <form action="{{ route('matakuliah.store') }}" method="POST">
        @csrf
        @include('matakuliah._form')
    </form>
@endsection
