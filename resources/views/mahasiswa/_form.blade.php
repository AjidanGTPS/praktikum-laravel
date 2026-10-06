<p>NIM:<br><input type="text" name="nim" value="{{ old('nim', $mahasiswa->nim ?? '') }}"></p>
<p>Nama:<br><input type="text" name="nama" value="{{ old('nama', $mahasiswa->nama ?? '') }}"></p>
<p>Email:<br><input type="email" name="email" value="{{ old('email', $mahasiswa->email ?? '') }}"></p>
<p>Prodi:<br><input type="text" name="prodi" value="{{ old('prodi', $mahasiswa->prodi ?? '') }}"></p>
<p>Semester:<br><input type="number" name="semester" min="1" max="8" value="{{ old('semester', $mahasiswa->semester ?? '') }}"></p>
<button type="submit">Simpan</button>
<a href="{{ route('mahasiswa.index') }}">Batal</a>
