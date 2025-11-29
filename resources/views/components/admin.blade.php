<h3 class="text-xl font-bold mb-4">Ringkasan Sistem</h3>

<div class="grid grid-cols-1 md:grid-cols-3 gap-4">

    <div class="bg-gray-700 text-white rounded-lg p-4">
        <h4 class="text-lg font-semibold">Total Barang</h4>
        <p class="text-3xl font-bold">{{ $total_barang }}</p>
    </div>

    <div class="bg-gray-700 text-white rounded-lg p-4">
        <h4 class="text-lg font-semibold">Barang Masuk</h4>
        <p class="text-3xl font-bold">{{ $total_masuk }}</p>
    </div>

    <div class="bg-gray-700 text-white rounded-lg p-4">
        <h4 class="text-lg font-semibold">Barang Keluar</h4>
        <p class="text-3xl font-bold">{{ $total_keluar }}</p>
    </div>

    <div class="bg-gray-700 text-white rounded-lg p-4">
        <h4 class="text-lg font-semibold">Kategori</h4>
        <p class="text-3xl font-bold">{{ $total_kategori }}</p>
    </div>

    <div class="bg-gray-700 text-white rounded-lg p-4">
        <h4 class="text-lg font-semibold">Lokasi Penyimpanan</h4>
        <p class="text-3xl font-bold">{{ $total_lokasi }}</p>
    </div>

</div>

@include('dashboard.bagian.barang-hampir-habis')