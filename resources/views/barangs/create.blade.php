<!DOCTYPE html>
<html>
<head>
    <title>Tambah Barang</title>
</head>
<body>
    <h1>Tambah Barang</h1>

    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <form action="{{ url('/barangs') }}" method="POST">
        @csrf
        <label>Nama Barang:</label><br>
        <input type="text" name="title" required><br><br>

        <label>Catatan tambahan barang:</label><br>
        <textarea name="content" rows="5" cols="40" required></textarea><br><br>

        <button type="submit">Simpan</button>
    </form>
    <br>
    <a href="{{ url('/barangs') }}">← Kembali ke Daftar Barang Hari Ini</a>
</body>
</html>
