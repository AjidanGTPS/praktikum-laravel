@extends('layouts.app')

@section('judul', $judul)

@section('konten')
    <h1>{{ $judul }}</h1>
    <p>
        <a href="{{ route('demo.qb.semua') }}">Semua</a> |
        <a href="{{ route('demo.qb.filter') }}">Semester &ge; 3</a> |
        <a href="{{ route('demo.qb.tugas') }}">TI Sem 3-6</a> |
        <a href="{{ route('demo.qb.paginasi') }}">Paginasi</a> |
        <a href="{{ route('demo.qb.statistik') }}">Statistik Prodi</a> |
        <a href="{{ route('demo.qb.tambah') }}">Tambah</a>
    </p>

    <table border="1" cellpadding="8" cellspacing="0">
        <tr><th>No</th><th>NIM</th><th>Nama</th><th>Prodi</th><th>Semester</th></tr>
        @forelse ($data as $mhs)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $mhs->nim }}</td>
                <td>{{ $mhs->nama }}</td>
                <td>{{ $mhs->prodi }}</td>
                <td>{{ $mhs->semester }}</td>
            </tr>
        @empty
            <tr><td colspan="5">Tidak ada data.</td></tr>
        @endforelse
    </table>

    @if ($data instanceof \Illuminate\Contracts\Pagination\Paginator)
        {{ $data->links() }}
    @endif
@endsection
