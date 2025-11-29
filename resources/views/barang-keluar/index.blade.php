<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">Data Barang Keluar</h2>
    </x-slot>

    <div class="py-8 max-w-6xl mx-auto">
        <a href="{{ route('admin.barang-keluar.create') }}"
            class="mb-4 inline-block bg-red-600 text-white px-4 py-2 rounded">
            + Tambah Barang Keluar
        </a>

        <table class="table-auto w-full border">
            <thead>
                <tr class="bg-gray-200">
                    <th class="px-4 py-2">Tanggal</th>
                    <th class="px-4 py-2">Barang</th>
                    <th class="px-4 py-2">Jumlah</th>
                    <th class="px-4 py-2">Penerima</th>
                    <th class="px-4 py-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($barangKeluar as $item)
                    <tr>
                        <td class="border px-4 py-2">{{ $item->tanggal }}</td>
                        <td class="border px-4 py-2">{{ $item->barang->nama }}</td>
                        <td class="border px-4 py-2">{{ $item->jumlah }}</td>
                        <td class="border px-4 py-2">{{ $item->penerima }}</td>
                        <td class="border px-4 py-2">
                            <a href="{{ route('admin.barang-keluar.edit', $item->id) }}" class="text-blue-600">Edit</a>
                            <form action="{{ route('admin.barang-keluar.destroy', $item->id) }}" method="POST"
                                class="inline">
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