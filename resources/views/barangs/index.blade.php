@extends('layouts.app')

@section('title', 'Daftar Barang')

@section('content')
    <h1>Daftar Barang</h1>

    @if (session('success'))
        <p style="color: green;"><strong>{{ session('success') }}</strong></p>
    @endif

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
