<h2>Tambah Lokasi Penyimpanan</h2>

<form action="{{ route('lokasi.store') }}" method="POST">
    @csrf

    Nama Lokasi:
    <input type="text" name="nama" required>

    <br><br>
    <button type="submit">Simpan</button>
</form>

<br>
<a href="{{ route('lokasi.index') }}">Kembali</a>