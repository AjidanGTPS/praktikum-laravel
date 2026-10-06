@extends('layouts.app')

@section('judul', 'Perbandingan Eager Loading')

@section('konten')
    <h1>Perbandingan Jumlah Query (10 Mahasiswa + Relasi Nilai)</h1>
    <table border="1" cellpadding="8" cellspacing="0">
        <tr><th>Tanpa with()</th><td>{{ $tanpa }} query</td></tr>
        <tr><th>Dengan with('nilai')</th><td>{{ $dengan }} query</td></tr>
    </table>

    <h3>Query Log (dengan eager loading)</h3>
    <ol>
        @foreach ($logDengan as $q)
            <li><code>{{ $q['query'] }}</code></li>
        @endforeach
    </ol>
@endsection
