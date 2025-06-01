@extends('layouts.app')

@section('title', 'Daftar Transaksi')

@section('content')
    <h1 class="mb-4">🧾 Daftar Transaksi Penjualan</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('transaksis.create') }}" class="btn btn-success mb-3">+ Tambah Transaksi</a>
    <a href="{{ url('/') }}" class="btn btn-secondary mb-3">← Kembali ke Beranda</a>

    <table class="table table-bordered table-striped">
 <thead style="background-color: #98FF98; color: #000;">


            <tr>
                <th>Nama Pembeli</th>
                <th>Barang</th>
                <th>Jumlah</th>
                <th>Total Harga</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($transaksis as $transaksi)
            <tr>
                <td>{{ $transaksi->nama_pembeli }}</td>
                <td>{{ $transaksi->barang->title }}</td>
                <td>{{ $transaksi->jumlah }}</td>
                <td>Rp{{ number_format($transaksi->total_harga, 0, ',', '.') }}</td>
                <td>{{ $transaksi->created_at->format('d-m-Y H:i') }}</td>
                <td>
                    <form action="{{ route('transaksis.destroy', $transaksi->id) }}" method="POST" onsubmit="return confirm('Yakin mau hapus transaksi ini?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">🗑️ Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
