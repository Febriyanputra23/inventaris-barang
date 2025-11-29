<?php
// app/Http/Controllers/BarangMasukController.php
namespace App\Http\Controllers;

use App\Models\BarangMasuk;
use App\Models\Barang;
use Illuminate\Http\Request;

class BarangMasukController extends Controller
{
    public function index()
    {
        $barangMasuk = BarangMasuk::with('barang')->latest()->get();
        return view('barang-masuk.index', compact('barangMasuk'));
    }

    public function create()
    {
        $barang = Barang::all();
        return view('barang-masuk.create', compact('barang'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'barang_id' => 'required',
            'jumlah' => 'required|numeric',
            'tanggal' => 'required|date',
            'supplier' => 'required',
            'keterangan' => 'nullable'
        ]);

        // Tambah stok barang
        $barang = Barang::find($request->barang_id);
        $barang->stok += $request->jumlah;
        $barang->save();

        BarangMasuk::create($request->all());

        return redirect()->route('admin.barang-masuk.index')->with('success', 'Barang masuk berhasil ditambahkan');
    }

    public function show(BarangMasuk $barangMasuk)
    {
        return view('barang-masuk.show', compact('barangMasuk'));
    }

    public function edit(BarangMasuk $barangMasuk)
    {
        $barang = Barang::all();
        return view('barang-masuk.edit', compact('barangMasuk', 'barang'));
    }

    public function update(Request $request, BarangMasuk $barangMasuk)
    {
        $request->validate([
            'barang_id' => 'required',
            'jumlah' => 'required|numeric',
            'tanggal' => 'required|date',
            'supplier' => 'required',
            'keterangan' => 'nullable'
        ]);

        $barangMasuk->update($request->all());

        return redirect()->route('admin.barang-masuk.index')->with('success', 'Barang masuk berhasil diperbarui');
    }

    public function destroy(BarangMasuk $barangMasuk)
    {
        // Kurangi stok barang
        $barang = $barangMasuk->barang;
        $barang->stok -= $barangMasuk->jumlah;
        $barang->save();

        $barangMasuk->delete();

        return redirect()->route('admin.barang-masuk.index')->with('success', 'Barang masuk berhasil dihapus');
    }
}