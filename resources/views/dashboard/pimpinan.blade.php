<div class="p-6 bg-white shadow sm:rounded-lg">
    <h2 class="text-2xl font-bold text-gray-800 mb-4">Dashboard Pimpinan</h2>
    <p class="text-gray-700 mb-2">
        Selamat datang, <span class="text-blue-500">{{ auth()->user()->name }}</span>!
    </p>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-4">

        <!-- Barang Stok Kurang -->
        <div class="p-4 bg-indigo-100 rounded-lg shadow">
            <h3 class="font-semibold text-lg text-indigo-800">Barang Stok Kurang</h3>
            <ul class="text-gray-700 mt-2">
                @foreach(\App\Models\Barang::where('stok', '<=', 5)->get() as $b)
                    <li>- {{ $b->nama }} ({{ $b->stok }})</li>
                @endforeach
                @if(\App\Models\Barang::where('stok', '<=', 5)->count() == 0)
                    <li>Semua stok cukup</li>
                @endif
            </ul>
        </div>

        <!-- Bagian Kanan -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-4">

            <div class="p-4 bg-purple-100 rounded-lg shadow">
                <h3 class="font-semibold text-lg text-purple-800">Total Barang</h3>
                <p class="text-2xl font-bold">{{ \App\Models\Barang::count() }}</p>
            </div>

            <div class="p-4 bg-teal-100 rounded-lg shadow">
                <h3 class="font-semibold text-lg text-teal-800">Kategori Barang</h3>
                <p class="text-gray-700">
                    {{ \App\Models\Kategori::count() }} kategori
                </p>
            </div>

        </div>
    </div>
</div>
