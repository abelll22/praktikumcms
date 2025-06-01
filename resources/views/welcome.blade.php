@extends('layouts.app')

@section('title', 'Beranda Toko Sembako')

@section('content')
<style>
    body {
        background: linear-gradient(135deg, #ffc1e3, #ffe5ec);
        min-height: 100vh;
        margin: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .welcome-text {
        text-align: center;
        color: #d63384;
    }

    .welcome-text h1 {
        font-size: 4rem;
        margin-bottom: 20px;
        font-weight: bold;
        animation: fadeIn 1.5s ease-in-out;
    }

    .welcome-text p {
        font-size: 1.5rem;
        margin-bottom: 30px;
        animation: fadeIn 2s ease-in-out;
    }

    .welcome-text a.btn {
        font-size: 1.2rem;
        padding: 10px 30px;
        background-color: #d63384;
        border: none;
        color: white;
        border-radius: 30px;
        transition: background-color 0.3s;
    }

    .welcome-text a.btn:hover {
        background-color: #a61e4d;
        color: white;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(-20px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>

<div class="welcome-text">
    <h1>Selamat Datang di Toko Sembako</h1>
    <p>Belanja hemat, lengkap, dan cepat hanya di sini 🎉🛒</p>
    <a href="{{ route('barangs.index') }}" class="btn">Masuk ke Daftar Barang</a>
</div>
@endsection
