@php
    $role = strtolower(auth()->user()->role);
@endphp

<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            {{-- USER INFO --}}
            <div class="p-6 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <p class="text-lg font-semibold text-gray-700 dark:text-gray-300">
                    Hai <span class="text-blue-500">{{ auth()->user()->name }}</span>,
                    kamu login sebagai <span class="uppercase">{{ auth()->user()->role }}</span>
                </p>
            </div>

            {{-- Include dashboard spesifik sesuai role --}}
            @includeIf("dashboard.$role")

        </div>

        <div class="grid grid-cols-3 gap-6">

            {{-- Semua role boleh lihat barang --}}
            <a href="{{ route($role . '.barang.index') }}" class="p-6 bg-white shadow rounded-lg hover:bg-gray-100">
                <h3 class="text-xl font-semibold">Data Barang</h3>
                <p class="text-gray-600 mt-2">Lihat Data Barang</p>
            </a>

            {{-- Hanya admin boleh tambah barang --}}
            @if ($role === 'admin')
                <a href="{{ route('admin.barang.create') }}" class="p-6 bg-white shadow rounded-lg hover:bg-gray-100">
                    <h3 class="text-xl font-semibold">Tambah Barang</h3>
                    <p class="text-gray-600 mt-2">Input barang baru ke database</p>
                </a>
            @endif

        </div>

    </div>
</x-app-layout>