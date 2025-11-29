<?php

namespace App\Http\Controllers;

use App\Models\Lokasi;
use Illuminate\Http\Request;

class LokasiController extends Controller
{
    public function index()
    {
        $data = Lokasi::all();
        return view('lokasi.index', compact('data'));
    }

    public function create()
    {
        return view('lokasi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required'
        ]);

        Lokasi::create([
            'nama' => $request->nama
        ]);

        return redirect()->route('lokasi.index')->with('success', 'Lokasi ditambahkan');
    }

    public function edit(Lokasi $lokasi)
    {
        return view('lokasi.edit', compact('lokasi'));
    }

    public function update(Request $request, Lokasi $lokasi)
    {
        $request->validate([
            'nama' => 'required'
        ]);

        $lokasi->update($request->only('nama'));

        return redirect()->route('lokasi.index')->with('success', 'Lokasi diperbarui');
    }

    public function destroy(Lokasi $lokasi)
    {
        $lokasi->delete();

        return redirect()->route('lokasi.index')->with('success', 'Lokasi dihapus');
    }
}
