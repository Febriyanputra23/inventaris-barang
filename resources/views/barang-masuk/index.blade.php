<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">Data Barang Masuk</h2>
    </x-slot>

    <div class="py-8 max-w-6xl mx-auto">
        <a href="{{ route('admin.barang-masuk.create') }}" class="mb-4 inline-block bg-green-600 text-white px-4 py-2 rounded">
            + Tambah Barang Masuk
        </a>

        <table class="table-auto w-full border">
            <thead>
                <tr class="bg-gray-200">
                    <th class="px-4 py-2">Tanggal</th>
                    <th class="px-4 py-2">Barang</th>
                    <th class="px-4 py-2">Jumlah</th>
                    <th class="px-4 py-2">Supplier</th>
                    <th class="px-4 py-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($barangMasuk as $item)
                <tr>
                    <td class="border px-4 py-2">{{ $item->tanggal }}</td>
                    <td class="border px-4 py-2">{{ $item->barang->nama }}</td>
                    <td class="border px-4 py-2">{{ $item->jumlah }}</td>
                    <td class="border px-4 py-2">{{ $item->supplier }}</td>
                    <td class="border px-4 py-2">
                        <a href="{{ route('admin.barang-masuk.edit', $item->id) }}" class="text-blue-600">Edit</a>
                        <form action="{{ route('admin.barang-masuk.destroy', $item->id) }}" method="POST" class="inline">
                            @csrf @method('DELETE')
                            <button class="text-red-600 ml-2">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>