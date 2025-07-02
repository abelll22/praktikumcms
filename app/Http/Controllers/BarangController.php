<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log;


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
            'content' => 'required',
        ]);

        Barang::create($validated);

        return redirect()->route('barangs.index')->with('success', 'Barang berhasil disimpan.');
    }

    public function destroy($id)
    {
        Barang::destroy($id);
        return redirect()->route('barangs.index')->with('success', 'Barang berhasil dihapus.');
    }

    public function searchByName(Request $request)
{
    $request->validate([
        'title' => 'required'
    ]);

    try {
        $barang = Barang::where('title', $request->title)->firstOrFail();

        // Log Info jika ditemukan
        Log::info('Barang ditemukan melalui pencarian.', [
            'title_input' => $request->title,
            'barang_id' => $barang->id,
            'waktu' => now()
        ]);

        return redirect()->route('barangs.show', $barang->id);

    } catch (ModelNotFoundException $e) {
        // Log Error jika tidak ditemukan
        Log::error('Pencarian gagal: Barang tidak ditemukan', [
            'title_input' => $request->title,
            'file' => $e->getFile(),
            'line' => $e->getLine(),
            'waktu' => now()
        ]);

        return redirect()->back()->withInput()->with('error', 'Barang dengan nama tersebut tidak ditemukan!');
    }
}
}
