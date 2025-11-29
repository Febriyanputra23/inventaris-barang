<div class="p-6 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
    <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-200 mb-4">Dashboard Petugas</h2>
    <p class="text-gray-700 dark:text-gray-300 mb-2">Selamat datang, <span class="text-blue-500">{{ auth()->user()->name }}</span>!</p>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-4">
        <div class="p-4 bg-indigo-100 dark:bg-indigo-900 rounded-lg shadow">
            <h3 class="font-semibold text-lg text-indigo-800 dark:text-indigo-200">Barang Stok Kurang</h3>
            <ul class="text-gray-700 dark:text-gray-300 mt-2">
                @foreach(\App\Models\Barang::where('stok', '<=', 5)->get() as $b)
                    <li>- {{ $b->nama }} ({{ $b->stok }})</li>
                @endforeach
                @if(\App\Models\Barang::where('stok', '<=', 5)->count() == 0)
                    <li>Semua stok cukup</li>
                @endif
            </ul>
        </div>

        <div class="p-4 bg-yellow-100 dark:bg-yellow-900 rounded-lg shadow">
            <h3 class="font-semibold text-lg text-yellow-800 dark:text-yellow-200">Barang Masuk Terbaru</h3>
            <p class="text-gray-700 dark:text-gray-300 mt-2">
                {{ \App\Models\BarangMasuk::orderBy('tanggal', 'desc')->first()?->barang->nama ?? 'Belum ada' }}
            </p>
        </div>
    </div>
</div>
