<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;

class BarangController extends Controller
{
    public function index()
    {
        $barangs = Barang::all();
        return view('barangs.index', compact('barangs'));
    }

    public function show($id)
    {
        $barang = Barang::findOrFail($id);
        return view('barangs.show', compact('barang'));
    }

    public function create()
    {
        return view('barangs.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'id_pemasok' => 'required',
            'stok_barang' => 'required|integer',
            'pesanan_barang' => 'required',
        ]);

        Barang::create($validated);

        return redirect()->route('barangs.index')->with('success', 'Barang berhasil disimpan.');
    }

    public function destroy($id)
    {
        Barang::destroy($id);
        return redirect()->route('barangs.index')->with('success', 'Barang berhasil dihapus.');
    }
}
