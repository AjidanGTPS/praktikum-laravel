<form action="/mahasiswa-uji" method="POST">
    @csrf
    <input type="text" name="nim" placeholder="NIM"><br>
    <input type="text" name="nama" placeholder="Nama"><br>
    <button type="submit">Kirim</button>
</form>
