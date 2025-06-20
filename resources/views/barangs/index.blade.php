@extends('layouts.app')

@section('title', 'Daftar Barang')

@section('content')
    <h1>Daftar Barang</h1>

    {{-- Pesan sukses --}}
    @if (session('success'))
        <p style="color: green;"><strong>{{ session('success') }}</strong></p>
    @endif

    {{-- Pesan error --}}
    @if (session('error'))
        <p style="color: red;"><strong>{{ session('error') }}</strong></p>
    @endif

    {{-- Form Cari Barang --}}
    <form action="{{ route('barangs.search') }}" method="POST" style="margin-bottom: 20px;">
        @csrf
        <label><strong>Cari Barang berdasarkan Nama:</strong></label><br>
        <input type="text" name="title" placeholder="Cari Barang" required>
        <button type="submit">Cari</button>
    </form>

    {{-- Daftar Barang --}}
    <ul>
        @foreach ($barangs as $barang)
            <li>
                <strong>{{ $barang->title }}</strong><br>
                <a href="{{ route('barangs.show', $barang->id) }}">Lihat Detail</a> |
                <form action="{{ route('barangs.destroy', $barang->id) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Hapus</button>
                </form>
            </li>
            <hr>
        @endforeach
    </ul>

    <a href="{{ route('barangs.create') }}">+ Tambah Barang</a>
@endsection
