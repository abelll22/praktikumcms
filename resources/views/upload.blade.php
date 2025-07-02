@extends('layouts.app')

@section('title', 'Upload Gambar')

@section('content')
<style>
    .upload-wrapper {
        max-width: 550px;
        margin: 60px auto;
        background: #fff0f5;
        padding: 40px;
        border-radius: 20px;
        box-shadow: 0 0 20px rgba(255, 105, 180, 0.2);
        animation: fadeIn 0.8s ease-in-out;
    }

    .upload-wrapper h2 {
        text-align: center;
        color: #d63384;
        margin-bottom: 30px;
        font-weight: bold;
    }

    .form-control {
        border-radius: 12px;
    }

    .btn-upload {
        background-color: #ff69b4;
        border: none;
        width: 100%;
        padding: 12px;
        font-weight: bold;
        color: white;
        border-radius: 12px;
        transition: background-color 0.3s ease;
    }

    .btn-upload:hover {
        background-color: #d63384;
    }

    .upload-success {
        background-color: #e0ffe9;
        color: #206a3c;
        padding: 12px;
        border-radius: 8px;
        margin-bottom: 20px;
        text-align: center;
    }

    .upload-error {
        background-color: #ffe5ec;
        color: #a5003c;
        padding: 12px;
        border-radius: 8px;
        margin-bottom: 20px;
    }

    .preview-img {
        text-align: center;
        margin-top: 30px;
    }

    .preview-img img {
        max-width: 100%;
        border-radius: 10px;
        margin-top: 10px;
        border: 2px solid #ff69b4;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>

<div class="upload-wrapper">
    <h2>📷 Upload Gambar</h2>

    {{-- Success --}}
    @if (session('success'))
        <div class="upload-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- Error --}}
    @if ($errors->any())
        <div class="upload-error">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Form Upload --}}
    <form action="{{ route('image.upload') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Judul Gambar:</label>
            <input type="text" class="form-control" name="title" placeholder="Masukkan judul gambar..." required>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Pilih Gambar:</label>
            <input type="file" class="form-control" name="image" accept="image/*" required>
        </div>

        <button type="submit" class="btn btn-upload">🚀 Upload Sekarang</button>
    </form>

    {{-- Preview Gambar --}}
    @if (isset($image))
        <div class="preview-img">
            <h5 class="mt-4">🖼️ Gambar Terbaru:</h5>
            <p><strong>{{ $image->title }}</strong></p>
            <img src="{{ asset('storage/' . $image->image_path) }}" alt="Uploaded Image">

            {{-- Tombol Delete --}}
            <form action="{{ route('image.delete', $image->id) }}" method="POST" class="mt-3">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">🗑️ Hapus Gambar</button>
            </form>
        </div>
    @endif
</div>
@endsection
