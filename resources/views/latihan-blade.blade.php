<!DOCTYPE html>
<html>
<head><title>Latihan Blade</title></head>
<body>
    <h1>Data Mahasiswa</h1>
    <ul>
        @foreach ($mahasiswa as $mhs)
            <li>{{ $mhs->nim }} - {{ $mhs->nama ?? 'Tanpa Nama' }} ({{ $mhs->prodi ?? '-' }})</li>
        @endforeach
    </ul>

    <h2>Uji XSS</h2>
    <p>Dengan {{ '{!! !!}' }}: {!! $xss !!}</p>
</body>
</html>
