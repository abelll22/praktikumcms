<!DOCTYPE html>
<html>
<head>
    <title>Hapus Barang</title>
</head>
<body>
    <h1>Apakah yakin ingin menghapus data ini?</h1>
    <strong>{{ $barang['title'] }}</strong><br>
    <p>{{ $barang['content'] }}</p>

    <button>Hapus</button>
    <a href="{{ url('/barangs') }}">← Batal</a>
</body>
</html>
