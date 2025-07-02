<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function create()
    {
        return view('upload');
    }

    public function store(Request $request)
    {
        // ✅ Validasi file + pesan error custom
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ], [
            'title.required' => 'Judul gambar wajib diisi!',
            'image.required' => 'File gambar belum dipilih.',
            'image.image' => 'File yang diupload harus berupa gambar!',
            'image.mimes' => 'Format gambar hanya boleh jpeg, png, jpg, gif, svg.',
            'image.max' => 'Ukuran gambar maksimal 2MB ya kak!',
        ]);

        // ✅ Simpan ke storage (folder public/images)
        $imagePath = $request->file('image')->store('images', 'public');

        // ✅ Simpan ke DB
        $image = Image::create([
            'title' => $request->title,
            'image_path' => $imagePath,
        ]);

        // ✅ Tampilkan ke halaman upload
        return view('upload', [
            'image' => $image
        ])->with('success', 'Gambar berhasil diunggah!');
    }

    public function destroy($id)
    {
        $image = Image::findOrFail($id);

        // ✅ Hapus dari storage
        if (Storage::disk('public')->exists($image->image_path)) {
            Storage::disk('public')->delete($image->image_path);
        }

        // ✅ Hapus dari database
        $image->delete();

        return redirect('/upload')->with('success', 'Gambar berhasil dihapus.');
    }
}
