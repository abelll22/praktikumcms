@extends('layouts.app')

@section('title', 'Tambah Transaksi')

@section('content')
<h1>Tambah Transaksi Penjualan</h1>

<form action="{{ route('transaksis.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label>Nama Pembeli</label>
        <input type="text" name="nama_pembeli" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Pilih Barang</label>
        <select name="barang_id" class="form-control" required>
            @foreach($barangs as $barang)
                <option value="{{ $barang->id }}">{{ $barang->title }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>Jumlah</label>
        <input type="number" name="jumlah" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-primary">Simpan Transaksi</button>
</form>

<a href="{{ route('transaksis.index') }}" class="btn btn-link mt-3">← Kembali ke Daftar Transaksi</a>
@endsection
