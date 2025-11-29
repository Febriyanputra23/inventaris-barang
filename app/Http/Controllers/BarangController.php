<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use App\Models\Lokasi;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index()
    {
        $barang = Barang::with('kategori', 'lokasi')->get();
        return view('barang.index', compact('barang'));
    }

    public function create()
    {
        return view('barang.create', [
            'kategori' => Kategori::all(),
            'lokasi' => Lokasi::all()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required|unique:barangs',
            'nama' => 'required',
            'kategori_id' => 'required',
            'lokasi_id' => 'required',
            'stok' => 'required|numeric',
            'stok_minimal' => 'required|numeric'
        ]);

        Barang::create($request->all());

        // PERBAIKAN: Redirect ke admin.barang.index
        return redirect()->route('admin.barang.index')->with('success', 'Barang berhasil ditambahkan');
    }

    public function edit(Barang $barang)
    {
        return view('barang.edit', [
            'barang' => $barang,
            'kategori' => Kategori::all(),
            'lokasi' => Lokasi::all()
        ]);
    }

    public function update(Request $request, Barang $barang)
    {
        $request->validate([
            'nama' => 'required',
            'kategori_id' => 'required',
            'lokasi_id' => 'required',
            'stok' => 'required|numeric',
            'stok_minimal' => 'required|numeric'
        ]);

        $barang->update($request->all());

        // PERBAIKAN: Redirect ke admin.barang.index
        return redirect()->route('admin.barang.index')->with('success', 'Barang berhasil diperbarui');
    }

    public function destroy(Barang $barang)
    {
        $barang->delete();

        // PERBAIKAN: Redirect ke admin.barang.index
        return redirect()->route('admin.barang.index')->with('success', 'Barang berhasil dihapus');
    }
}