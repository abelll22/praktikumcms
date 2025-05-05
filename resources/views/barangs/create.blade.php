@extends('layouts.app')

@section('title', 'Tambah Barang')

@section('content')
    <h1>Tambah Barang</h1>

    <form action="{{ route('barangs.store') }}" method="POST">
        @csrf
        <label>Nama Barang:</label><br>
        <input type="text" name="title" required><br><br>

        <label>ID Pemasok:</label><br>
        <input type="text" name="id_pemasok" required><br><br>

        <label>Stok Barang:</label><br>
        <input type="number" name="stok_barang" required><br><br>

        <label>Pesanan Barang:</label><br>
        <textarea name="pesanan_barang" required></textarea><br><br>

        <button type="submit">Simpan</button>
    </form>

    <a href="{{ route('barangs.index') }}">← Kembali ke Daftar Barang</a>
@endsection
