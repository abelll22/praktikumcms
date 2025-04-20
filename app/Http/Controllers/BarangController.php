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

    $confirmDelete = request()->query('confirm') === 'delete';

    return view('barangs.show', compact('barang', 'confirmDelete'));
    }

    public function create()
    {
        return view('barangs.create');
    }

    public function store(Request $request)
    {
        return redirect('/barangs')->with('success', 'Barang berhasil ditambahkanS.');
    }

    public function edit($id)
    {
        $barang = Barang::find($id);
        if (!$barang) {
            abort(404);
        }
        return view('barangs.edit', compact('barang'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);
    
        return redirect('/barangs/' . $id)->with('success', 'Barang berhasil diperbarui.');
    }

    public function delete($id)
    {
        $barang = Barang::find($id);
        if (!$barang) {
            abort(404);
        }
        return view('barangs.delete', compact('barang'));
    }

    public function destroy($id)
    {
        return redirect()->route('barangs.index')->with('success', 'Barang berhasil dihapus.');
    }
    

}
