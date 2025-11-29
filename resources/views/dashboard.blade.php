@php
    $role = strtolower(auth()->user()->role);
@endphp

<x-app-layout>
    <div class="py-10">
        <div class="max-w-7xl mx-auto px-6 space-y-8">

            {{-- USER INFO CARD --}}
            <div class="p-6 bg-white shadow-md rounded-xl flex items-center justify-between">
                <div>
                    <h2 class="text-2xl font-semibold text-gray-800">
                        Selamat Datang, <span class="text-blue-600">{{ auth()->user()->name }}</span>
                    </h2>
                    <p class="mt-1 text-gray-600">
                        Kamu login sebagai <span class="uppercase font-bold">{{ auth()->user()->role }}</span>
                    </p>
                </div>
                <img src="https://cdn-icons-png.flaticon.com/512/9131/9131529.png" 
                     class="w-16 h-16 hidden md:block" alt="Dashboard Icon">
            </div>

            {{-- Include dashboard spesifik sesuai role --}}
            @includeIf("dashboard.$role")

            {{-- MENU GRID --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">

                {{-- DATA BARANG (Semua Role) --}}
                <a href="{{ route($role . '.barang.index') }}"
                   class="p-6 bg-white shadow-md rounded-xl hover:shadow-xl transition transform hover:-translate-y-1">
                    <div class="flex items-center space-x-4">
                        <img src="https://cdn-icons-png.flaticon.com/512/679/679922.png" class="w-12" alt="">
                        <div>
                            <h3 class="text-xl font-semibold text-gray-800">Data Barang</h3>
                            <p class="text-gray-600 mt-1">Melihat dan mengelola data barang</p>
                        </div>
                    </div>
                </a>

                {{-- Tambah Barang (Admin Saja) --}}
                @if ($role === 'admin')
                    <a href="{{ route('admin.barang.create') }}"
                       class="p-6 bg-white shadow-md rounded-xl hover:shadow-xl transition transform hover:-translate-y-1">
                        <div class="flex items-center space-x-4">
                            <img src="https://cdn-icons-png.flaticon.com/512/992/992651.png" class="w-12" alt="">
                            <div>
                                <h3 class="text-xl font-semibold text-gray-800">Tambah Barang</h3>
                                <p class="text-gray-600 mt-1">Input barang baru ke database</p>
                            </div>
                        </div>
                    </a>
                @endif

                {{-- Profil Akun --}}
                <a href="{{ route('profile.edit') }}"
                   class="p-6 bg-white shadow-md rounded-xl hover:shadow-xl transition transform hover:-translate-y-1">
                    <div class="flex items-center space-x-4">
                        <img src="https://cdn-icons-png.flaticon.com/512/847/847969.png" class="w-12" alt="">
                        <div>
                            <h3 class="text-xl font-semibold text-gray-800">Pengaturan Akun</h3>
                            <p class="text-gray-600 mt-1">Edit profil dan keamanan akun</p>
                        </div>
                    </div>
                </a>

            </div>

        </div>
    </div>
</x-app-layout>
