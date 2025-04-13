<!DOCTYPE html>
<html>
<head>
    <title>Daftar Barang</title>
</head>
<body>
    <h1>Daftar Barang Hari Ini</h1>

    {{-- Menampilkan pesan sukses jika ada --}}
    @if (session('success'))
        <p style="color: green;"><strong>{{ session('success') }}</strong></p>
    @endif

    <ul>
    @foreach ($barangs as $barang)
        <li>
            <strong>{{ $barang['title'] }}</strong><br>
            {{ $barang['content'] }}<br>
            <a href="{{ url('/barangs/' . $barang['id']) }}">Lihat Detail</a> |
            <a href="{{ url('/barangs/' . $barang['id'] . '/edit') }}">Edit</a> |
            <a href="{{ url('/barangs/' . $barang['id'] . '/delete') }}">Hapus</a>
        </li>
        <hr>
    @endforeach
    </ul>
    
    <br><br>
    <a href="{{ route('barangs.create') }}">+ Tambah Barang</a>
</body>
</html>

