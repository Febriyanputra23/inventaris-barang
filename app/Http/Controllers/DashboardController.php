<?php
// app/Http/Controllers/DashboardController.php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Barang;
use App\Models\BarangMasuk;
use App\Models\BarangKeluar;
use App\Models\Kategori;
use App\Models\Lokasi;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $role = $user->role;

        // DATA UMUM UNTUK SEMUA ROLE
        $data = [
            'total_barang' => Barang::count(),
            'barang_hampir_habis' => Barang::where('stok', '<=', 5)->get(),
        ];

        // DATA SPESIFIK ROLE
        if ($role === 'admin') {
            $data['total_masuk'] = BarangMasuk::count();
            $data['total_keluar'] = BarangKeluar::count();
            $data['total_kategori'] = Kategori::count();
            $data['total_lokasi'] = Lokasi::count();
            $data['barang_masuk_terbaru'] = BarangMasuk::with('barang')->latest()->take(5)->get();
            $data['barang_keluar_terbaru'] = BarangKeluar::with('barang')->latest()->take(5)->get();

        } elseif ($role === 'petugas') {
            $data['barang'] = Barang::all();
            $data['barang_masuk_terbaru'] = BarangMasuk::with('barang')->latest()->take(10)->get();
            $data['barang_keluar_terbaru'] = BarangKeluar::with('barang')->latest()->take(10)->get();
            $data['kategori'] = Kategori::all();
            $data['lokasi'] = Lokasi::all();

        } elseif ($role === 'pimpinan') {
            $data['laporan_stok'] = Barang::select('nama', 'stok')->orderBy('stok', 'asc')->get();
            $data['barang_masuk_terbaru'] = BarangMasuk::with('barang')->latest()->take(5)->get();
            $data['barang_keluar_terbaru'] = BarangKeluar::with('barang')->latest()->take(5)->get();
        }

        return view('dashboard', compact('data', 'role'));
    }
}