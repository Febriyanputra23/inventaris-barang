<h2>Daftar Lokasi Penyimpanan</h2>

<a href="{{ route('lokasi.create') }}">Tambah Lokasi</a>

<table border="1" cellpadding="5">
    <tr>
        <th>No</th>
        <th>Nama Lokasi</th>
        <th>Aksi</th>
    </tr>

    @foreach($data as $l)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $l->nama }}</td>
            <td>
                <a href="{{ route('lokasi.edit', $l->id) }}">Edit</a> |
                <form action="{{ route('lokasi.destroy', $l->id) }}" method="POST" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button onclick="return confirm('Hapus lokasi?')">Hapus</button>
                </form>
            </td>
        </tr>
    @endforeach
</table>