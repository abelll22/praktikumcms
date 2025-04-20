@extends('layouts.app')

@section('title', 'Tambah Barang')

@section('content')
    <h1>Tambah Barang</h1>

    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <form action="{{ route('barangs.store') }}" method="POST">
        @csrf
        <label>Nama Barang:</label><br>
        <input type="text" name="title" required><br><br>

        <label>Catatan tambahan barang:</label><br>
        <textarea name="content" rows="5" cols="40" required></textarea><br><br>

        <button type="submit">Simpan</button>
    </form>
    <br>
    <a href="{{ route('barangs.index') }}">← Kembali ke Daftar Barang Hari Ini</a>
@endsection
