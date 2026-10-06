<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('judul', 'Aplikasi Akademik')</title>
</head>
<body>
    <header>
        <h2>Sistem Informasi Akademik</h2>
        @include('partials.navbar')
        <hr>
    </header>

    <main>
        @if (session('pesan'))
            <p style="color: green"><strong>{{ session('pesan') }}</strong></p>
        @endif
        @if ($errors->any())
            <ul style="color: red">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        @yield('konten')
    </main>

    <footer>
        <hr>
        <p>&copy; {{ date('Y') }} Praktikum Pemrograman Web</p>
    </footer>
</body>
</html>
