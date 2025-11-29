<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">Tambah Barang Baru</h2>
    </x-slot>

    <div class="py-8 max-w-6xl mx-auto">
        {{-- PERBAIKAN: Ganti route('barang.store') menjadi route('admin.barang.store') --}}
        <form action="{{ route('admin.barang.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="kode" class="block">Kode Barang:</label>
                <input type="text" name="kode" id="kode" class="border rounded px-2 py-1 w-full" required>
                @error('kode') <span class="text-red-600">{{ $message }}</span> @enderror
            </div>

            <div class="mb-4">
                <label for="nama" class="block">Nama Barang:</label>
                <input type="text" name="nama" id="nama" class="border rounded px-2 py-1 w-full" required>
                @error('nama') <span class="text-red-600">{{ $message }}</span> @enderror
            </div>

            <div class="mb-4">
                <label for="kategori_id" class="block">Kategori:</label>
                <select name="kategori_id" id="kategori_id" class="border rounded px-2 py-1 w-full" required>
                    <option value="">Pilih Kategori</option>
                    @foreach($kategori as $kat)
                        <option value="{{ $kat->id }}">{{ $kat->nama }}</option>
                    @endforeach
                </select>
                @error('kategori_id') <span class="text-red-600">{{ $message }}</span> @enderror
            </div>

            <div class="mb-4">
                <label for="lokasi_id" class="block">Lokasi:</label>
                <select name="lokasi_id" id="lokasi_id" class="border rounded px-2 py-1 w-full" required>
                    <option value="">Pilih Lokasi</option>
                    @foreach($lokasi as $lok)
                        <option value="{{ $lok->id }}">{{ $lok->nama }}</option>
                    @endforeach
                </select>
                @error('lokasi_id') <span class="text-red-600">{{ $message }}</span> @enderror
            </div>

            <div class="mb-4">
                <label for="stok" class="block">Stok:</label>
                <input type="number" name="stok" id="stok" class="border rounded px-2 py-1 w-full" required>
                @error('stok') <span class="text-red-600">{{ $message }}</span> @enderror
            </div>

            <div class="mb-4">
                <label for="stok_minimal" class="block">Stok Minimal:</label>
                <input type="number" name="stok_minimal" id="stok_minimal" class="border rounded px-2 py-1 w-full"
                    required>
                @error('stok_minimal') <span class="text-red-600">{{ $message }}</span> @enderror
            </div>

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Simpan</button>
            {{-- PERBAIKAN: Juga ganti route index --}}
            <a href="{{ route('admin.barang.index') }}" class="bg-gray-600 text-white px-4 py-2 rounded ml-2">Batal</a>
        </form>
    </div>
</x-app-layout>