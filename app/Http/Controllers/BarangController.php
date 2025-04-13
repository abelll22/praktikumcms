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
        $barang = Barang::find($id);
        if (!$barang) {
            abort(404);
        }
        return view('barangs.show', compact('barang'));
    }

    public function create()
    {
        $barangs = Barang::all(); 
        return view('barangs.create', compact('barangs'));
    }

    public function store(Request $request)
    {
        return redirect('/barangs')->with('success', 'Tambahan Barang berhasil disimpan!');
    }

    public function delete($id)
    {
        $barang = Barang::find($id);
        if (!$barang) abort(404);
        return view('barangs.delete', compact('barang'));
    }

    public function edit($id)
    {
        $barang = Barang::find($id);
        if (!$barang) abort(404);
        return view('barangs.edit', compact('barang'));
    }

    public function update(Request $request, $id)
    {
        return redirect('/barangs/' . $id)->with('success', 'Barang berhasil diperbarui!');
    }
}
