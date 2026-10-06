<p>Kode:<br><input type="text" name="kode" value="{{ old('kode', $matakuliah->kode ?? '') }}"></p>
<p>Nama:<br><input type="text" name="nama" value="{{ old('nama', $matakuliah->nama ?? '') }}"></p>
<p>SKS:<br><input type="number" name="sks" min="1" max="6" value="{{ old('sks', $matakuliah->sks ?? '') }}"></p>
<button type="submit">Simpan</button>
<a href="{{ route('matakuliah.index') }}">Batal</a>
