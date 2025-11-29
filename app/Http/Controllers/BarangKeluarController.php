<?php
// app/Http/Controllers/BarangKeluarController.php
namespace App\Http\Controllers;

use App\Models\BarangKeluar;
use App\Models\Barang;
use Illuminate\Http\Request;

class BarangKeluarController extends Controller
{
    public function index()
    {
        $barangKeluar = BarangKeluar::with('barang')->latest()->get();
        return view('barang-keluar.index', compact('barangKeluar'));
    }

    public function create()
    {
        $barang = Barang::all();
        return view('barang-keluar.create', compact('barang'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'barang_id' => 'required',
            'jumlah' => 'required|numeric',
            'tanggal' => 'required|date',
            'penerima' => 'required',
            'keterangan' => 'nullable'
        ]);

        // Cek stok cukup
        $barang = Barang::find($request->barang_id);
        if ($barang->stok < $request->jumlah) {
            return back()->with('error', 'Stok tidak cukup! Stok tersedia: ' . $barang->stok);
        }

        // Kurangi stok barang
        $barang->stok -= $request->jumlah;
        $barang->save();

        BarangKeluar::create($request->all());

        return redirect()->route('admin.barang-keluar.index')->with('success', 'Barang keluar berhasil ditambahkan');
    }

    public function show(BarangKeluar $barangKeluar)
    {
        return view('barang-keluar.show', compact('barangKeluar'));
    }

    public function edit(BarangKeluar $barangKeluar)
    {
        $barang = Barang::all();
        return view('barang-keluar.edit', compact('barangKeluar', 'barang'));
    }

    public function update(Request $request, BarangKeluar $barangKeluar)
    {
        $request->validate([
            'barang_id' => 'required',
            'jumlah' => 'required|numeric',
            'tanggal' => 'required|date',
            'penerima' => 'required',
            'keterangan' => 'nullable'
        ]);

        $barangKeluar->update($request->all());

        return redirect()->route('admin.barang-keluar.index')->with('success', 'Barang keluar berhasil diperbarui');
    }

    public function destroy(BarangKeluar $barangKeluar)
    {
        // Kembalikan stok barang
        $barang = $barangKeluar->barang;
        $barang->stok += $barangKeluar->jumlah;
        $barang->save();

        $barangKeluar->delete();

        return redirect()->route('admin.barang-keluar.index')->with('success', 'Barang keluar berhasil dihapus');
    }
}