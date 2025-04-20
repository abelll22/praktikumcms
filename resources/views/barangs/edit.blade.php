@extends('layouts.app')

@section('title', 'Edit Barang')

@section('content')
    <h1>Edit Barang</h1>

    <form method="POST" action="{{ route('barangs.update', $barang['id']) }}">
        @csrf
        @method('PUT')

        <label>Nama atau merk:</label><br>
        <input type="text" name="title" value=""  required><br><br>

        <label>Catatan Tambahan:</label><br>
        <textarea name="content" rows="5" cols="40"  required></textarea><br><br>

        <button type="submit">Simpan</button>
    </form>
    <br>
    <a href="{{ route('barangs.show', $barang['id']) }}">← Kembali ke detail</a>
@endsection
