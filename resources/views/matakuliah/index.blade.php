@extends('layouts.app')

@section('judul', 'Daftar Mata Kuliah')

@section('konten')
    <h1>Daftar Mata Kuliah</h1>
    <p><a href="{{ route('matakuliah.create') }}">+ Tambah Mata Kuliah</a></p>

    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode</th>
                <th>Nama</th>
                <th>SKS</th>
                <th>Peserta</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($matakuliah as $mk)
                <tr style="background-color: {{ $loop->even ? '#f2f2f2' : '#ffffff' }}">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $mk->kode }}</td>
                    <td>{{ $mk->nama }}</td>
                    <td>
                        {{ $mk->sks }}
                        @if ($mk->sks > 3)
                            <strong>(SKS Besar)</strong>
                        @endif
                    </td>
                    <td>{{ $mk->nilai_count }}</td>
                    <td>
                        <a href="{{ route('matakuliah.show', $mk) }}">Detail</a> |
                        <a href="{{ route('matakuliah.edit', $mk) }}">Edit</a> |
                        <form action="{{ route('matakuliah.destroy', $mk) }}" method="POST" style="display:inline" onsubmit="return confirm('Hapus data ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="6">Belum ada data mata kuliah.</td></tr>
            @endforelse
        </tbody>
    </table>
@endsection
