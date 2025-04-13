<!DOCTYPE html>
<html>
<head>
    <title>Detail Barang</title>
</head>
<body>
    <h1>{{ $barang['title'] }}</h1>
    <p>{{ $barang['content'] }}</p>

    @if (isset($barang['items']))
        <h3>Detail:</h3>
        <ul>
            @foreach ($barang['items'] as $item)
                <li>{{ $item }}</li>
            @endforeach
        </ul>
    @endif

    <a href="{{ url('/barangs') }}">Kembali ke Daftar Barang</a>
</body>
</html>
