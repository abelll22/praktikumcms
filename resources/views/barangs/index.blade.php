@extends('layouts.app')

@section('title', 'Daftar Barang')

@section('content')

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
            <a href="{{ route('barangs.show', $barang['id']) }}">Lihat Detail</a> |
            <a href="{{ route('barangs.edit', $barang['id']) }}">Edit</a> |
            <a href="{{ route('barangs.show', ['id' => $barang['id'], 'confirm' => 'delete']) }}">Hapus</a>
        </li>
        <hr>
    @endforeach
    </ul>

    <br><br>
    <a href="{{ route('barangs.create') }}">+ Tambah Barang</a>

@endsection
