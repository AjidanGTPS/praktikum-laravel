<!DOCTYPE html>
<html>
<head><title>Belajar Blade</title></head>
<body>
    {{-- Ini komentar Blade, tidak akan tampil di browser --}}
    <h1>Halo, {{ $nama }}!</h1>

    @php
        $tahunSekarang = date('Y');
    @endphp

    <p>Tahun sekarang: {{ $tahunSekarang }}</p>
    <p>Julukan: {{ $julukan ?? 'Belum ada julukan' }}</p>

    <p>Escaped: {{ $kontenHtml }}</p>
    <p>Tidak di-escape: {!! $kontenHtml !!}</p>
</body>
</html>