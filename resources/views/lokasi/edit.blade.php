<h2>Edit Lokasi</h2>

<form action="{{ route('lokasi.update', $lokasi->id) }}" method="POST">
    @csrf
    @method('PUT')

    Nama Lokasi:
    <input type="text" name="nama" value="{{ $lokasi->nama }}" required>

    <br><br>
    <button type="submit">Update</button>
</form>

<br>
<a href="{{ route('lokasi.index') }}">Kembali</a>