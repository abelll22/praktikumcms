<!DOCTYPE html>
<html>
<head>
    <title>Edit Barang</title>
</head>
<body>
    <h1>Edit Barang</h1>

    <form method="POST" action="{{ url('/barangs/' . $barang['id']) }}">
        @csrf
        @method('PUT')

        <label>Nama atau merk:</label><br>
        <input type="text" name="title" value=""><br><br> 

        <label>Catatan Tambahan:</label><br>
        <textarea name="content" rows="5" cols="40"></textarea><br><br> 
    </form>
    <button type="submit">Simpan</button>
    <a href="{{ url('/barangs/' . $barang['id']) }}">← Kembali ke detail</a>
</body>
</html>

