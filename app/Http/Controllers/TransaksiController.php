<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\Barang;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksis = Transaksi::with('barang')->get();
        return view('transaksis.index', compact('transaksis'));
    }

    public function create()
    {
        $barangs = Barang::all();
        return view('transaksis.create', compact('barangs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_pembeli' => 'required',
            'barang_id' => 'required|exists:barang,id',
            'jumlah' => 'required|integer|min:1',
        ]);

        $barang = Barang::findOrFail($request->barang_id);

        // GANTI INI jika Barang punya field harga_satuan
        // $total_harga = $barang->harga_satuan * $request->jumlah;
        // ATAU gunakan stok_barang (sesuai versimu sekarang):
        $total_harga = $barang->stok_barang * $request->jumlah;

        Transaksi::create([
            'nama_pembeli' => $request->nama_pembeli,
            'barang_id' => $request->barang_id,
            'jumlah' => $request->jumlah,
            'total_harga' => $total_harga,
        ]);

        return redirect()->route('transaksis.index')->with('success', 'Transaksi berhasil ditambahkan.');
    }

    public function destroy($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->delete();

        return redirect()->route('transaksis.index')->with('success', 'Transaksi berhasil dihapus.');
    }
}
