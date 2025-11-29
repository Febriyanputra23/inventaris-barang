<div class="p-6 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
    <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-200 mb-4">Dashboard Pimpinan</h2>
    <p class="text-gray-700 dark:text-gray-300 mb-2">Selamat datang, <span
            class="text-blue-500">{{ auth()->user()->name }}</span>!</p>

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

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-4">
            <div class="p-4 bg-purple-100 dark:bg-purple-900 rounded-lg shadow">
                <h3 class="font-semibold text-lg text-purple-800 dark:text-purple-200">Total Barang</h3>
                <p class="text-2xl font-bold">{{ \App\Models\Barang::count() }}</p>
            </div>

            <div class="p-4 bg-teal-100 dark:bg-teal-900 rounded-lg shadow">
                <h3 class="font-semibold text-lg text-teal-800 dark:text-teal-200">Kategori Barang</h3>
                <p class="text-gray-700 dark:text-gray-300">
                    {{ \App\Models\Kategori::count() }} kategori
                </p>
            </div>
        </div>
    </div>