<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;

class ImageController extends Controller
{
    public function create()
    {
        return view('upload');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Simpan file ke folder storage/app/public/images
        $imagePath = $request->file('image')->store('images', 'public');

        // Simpan data ke database
        $image = Image::create([
            'title' => $request->title,
            'image_path' => $imagePath,
        ]);

        // Kirim data gambar ke tampilan untuk ditampilkan kembali
        return view('upload', [
            'image' => $image
        ])->with('success', 'Gambar berhasil diunggah!');
    }
}
