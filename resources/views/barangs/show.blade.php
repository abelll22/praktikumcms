@extends('layouts.app')

@section('title', 'Detail Barang')

@section('content')
    <h1>{{ $barang->title }}</h1>

    <p><strong>ID Barang:</strong> {{ $barang->id }}</p>
    <p><strong>ID Pemasok:</strong> {{ $barang->id_pemasok }}</p>
    <p><strong>Stok Barang:</strong> {{ $barang->stok_barang }}</p>
    <p><strong>Pesanan Barang:</strong> {{ $barang->pesanan_barang }}</p>

    <a href="{{ route('barangs.index') }}" class="btn btn-secondary mt-3">Kembali</a>
@endsection
