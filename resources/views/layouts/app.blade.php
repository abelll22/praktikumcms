<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #fff0f5; 
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .navbar {
            background-color: #ff69b4 !important; 
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        .navbar-brand {
            font-weight: bold;
            font-size: 1.5rem;
            color: #fff !important;
        }
        .nav-link {
            font-weight: 500;
            color: #fff !important;
        }
        .nav-link:hover {
            background-color: #ffc0cb; 
            color: #000 !important;
            border-radius: 10px;
        }
    </style>
</head>
<body>
    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ url('/') }}">TOKO SEMBAKO</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}">🏠 Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('barangs.index') }}">📦 Daftar Barang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('barangs.create') }}">➕ Tambah Barang</a>
                    </li>
                    <li class="nav-item">
          <a class="nav-link" href="{{ route('transaksis.index') }}">➕ Transaksi Penjualan</a>
        </li>
                </ul>
            </div>
        </div>
    </nav>

    {{-- Konten --}}
    <div class="container mt-4">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
