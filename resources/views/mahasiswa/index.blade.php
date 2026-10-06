@extends('layouts.app')

@section('judul', 'Daftar Mahasiswa')

@section('konten')
    <h1>Daftar Mahasiswa</h1>
    <p><a href="{{ route('mahasiswa.create') }}">+ Tambah Mahasiswa</a> | <a href="{{ route('mahasiswa.cari') }}">Cari</a></p>

    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Prodi</th>
                <th>Semester</th>
                <th>Status</th>
                <th>Jml Nilai</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($mahasiswa as $mhs)
                <tr style="background-color: {{ $loop->even ? '#f2f2f2' : '#ffffff' }}">
                    <td>{{ $mahasiswa->firstItem() + $loop->index }}</td>
                    <td>{{ $mhs->nim }}</td>
                    <td>{{ $mhs->nama }}</td>
                    <td>{{ $mhs->prodi }}</td>
                    <td>{{ $mhs->semester }}</td>
                    <td>
                        @switch(true)
                            @case($mhs->semester <= 2)
                                <span>Mahasiswa Baru</span>
                                @break
                            @case($mhs->semester >= 7)
                                <span>{{ $mhs->status }}</span>
                                @break
                            @default
                                <span>Mahasiswa Aktif</span>
                        @endswitch
                    </td>
                    <td>{{ $mhs->nilai->count() }}</td>
                    <td>
                        <a href="{{ route('mahasiswa.show', $mhs) }}">Detail</a> |
                        <a href="{{ route('mahasiswa.edit', $mhs) }}">Edit</a> |
                        <form action="{{ route('mahasiswa.destroy', $mhs) }}" method="POST" style="display:inline" onsubmit="return confirm('Hapus data ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="8">Belum ada data mahasiswa.</td></tr>
            @endforelse
        </tbody>
    </table>

    {{ $mahasiswa->links() }}
@endsection
