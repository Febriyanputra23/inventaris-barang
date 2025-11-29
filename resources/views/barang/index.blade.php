<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl">Data Barang</h2>
    </x-slot>

    <div class="py-8 max-w-6xl mx-auto">

        {{-- PERBAIKAN 1: Gunakan route dengan prefix admin --}}
        <a href="{{ route('admin.barang.create') }}"
            class="mb-4 inline-block bg-green-600 text-white px-4 py-2 rounded">
            + Tambah Barang
        </a>

        @if(session('success'))
            <div class="p-4 bg-green-200 text-green-800 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <table class="table-auto w-full border">
            <thead>
                <tr class="bg-gray-200">
                    <th class="px-4 py-2">Kode</th>
                    <th class="px-4 py-2">Nama</th>
                    <th class="px-4 py-2">Kategori</th>
                    <th class="px-4 py-2">Lokasi</th>
                    <th class="px-4 py-2">Stok</th>
                    <th class="px-4 py-2">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @foreach($barang as $item)
                    <tr>
                        <td class="border px-4 py-2">{{ $item->kode }}</td>
                        <td class="border px-4 py-2">{{ $item->nama }}</td>
                        <td class="border px-4 py-2">{{ $item->kategori->nama }}</td>
                        <td class="border px-4 py-2">{{ $item->lokasi->nama }}</td>
                        <td class="border px-4 py-2">{{ $item->stok }}</td>

                        <td class="border px-4 py-2 space-x-2">
                            {{-- PERBAIKAN 2: Edit route --}}
                            <a href="{{ route('admin.barang.edit', $item->id) }}" class="text-blue-600">
                                Edit
                            </a>

                            {{-- PERBAIKAN 3: Destroy route --}}
                            <form action="{{ route('admin.barang.destroy', $item->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button class="text-red-600">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>
    </div>
</x-app-layout>