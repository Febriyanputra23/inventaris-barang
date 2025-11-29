<div class="p-6 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
    <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-200 mb-4">Dashboard Admin</h2>
    <p class="text-gray-700 dark:text-gray-300 mb-2">Selamat datang, <span
            class="text-blue-500">{{ auth()->user()->name }}</span>!</p>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-4">
        <div class="p-4 bg-blue-100 dark:bg-blue-900 rounded-lg shadow">
            <h3 class="font-semibold text-lg text-blue-800 dark:text-blue-200">Jumlah Barang</h3>
            <p class="text-2xl font-bold">{{ \App\Models\Barang::count() }}</p>
        </div>

        <div class="p-4 bg-green-100 dark:bg-green-900 rounded-lg shadow">
            <h3 class="font-semibold text-lg text-green-800 dark:text-green-200">Barang Masuk Terbaru</h3>
            <p class="text-gray-700 dark:text-gray-300">
                {{ \App\Models\BarangMasuk::orderBy('tanggal', 'desc')->first()?->barang->nama ?? 'Belum ada' }}
            </p>
        </div>

        <div class="p-4 bg-red-100 dark:bg-red-900 rounded-lg shadow">
            <h3 class="font-semibold text-lg text-red-800 dark:text-red-200">Barang Keluar Terbaru</h3>
            <p class="text-gray-700 dark:text-gray-300">
                {{ \App\Models\BarangKeluar::orderBy('tanggal', 'desc')->first()?->barang->nama ?? 'Belum ada' }}
            </p>
        </div>
    </div>
</div>