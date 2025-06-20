<!DOCTYPE html>
<html>
<head>
    <title>Upload Gambar</title>
</head>
<body>
    <h2>Form Upload Gambar</h2>

    {{-- Menampilkan pesan sukses --}}
    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    {{-- Menampilkan pesan error --}}
    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Form Upload --}}
    <form action="{{ route('image.upload') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label>Judul:</label><br>
        <input type="text" name="title"><br><br>

        <label>Pilih Gambar:</label><br>
        <input type="file" name="image"><br><br>

        <button type="submit">Upload</button>
    </form>

    {{-- Preview jika gambar berhasil diupload --}}
    @if (isset($image))
        <h3>Gambar Terbaru:</h3>
        <p><strong>{{ $image->title }}</strong></p>
        <img src="{{ asset('storage/' . $image->image_path) }}" width="250">
        
{{-- Tombol Delete --}}
    <form action="{{ route('image.delete', $image->id) }}" method="POST" style="margin-top: 15px;">
        @csrf
        @method('DELETE')
        <button type="submit" style="color: white; background: red; padding: 8px 20px; border: none; cursor: pointer;">
            Hapus Gambar
        </button>
    </form>

    @endif
</body>
</html>
