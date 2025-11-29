<?php

namespace App\Http\Controllers;

use App\Models\Barang;

class LaporanController extends Controller
{
    public function stok()
    {
        $barang = Barang::with('kategori','lokasi')->get();
        return view('laporan.stok', compact('barang'));
    }

    public function barangHabis()
    {
        // stok < stok minimal
        $barang = Barang::whereColumn('stok', '<', 'stok_minimal')->get();
        return view('laporan.habis', compact('barang'));
    }
}
