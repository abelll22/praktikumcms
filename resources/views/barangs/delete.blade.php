@extends('layouts.app')

@section('title', 'Hapus Barang')

@section('content')
    <h1>Apakah yakin ingin menghapus data ini?</h1>
    <strong>{{ $barang->title }}</strong><br>
    <p>{{ $barang->content }}</p>

    <form action="{{ route('barangs.destroy', $barang['id']) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit">Hapus</button>
</form>

    <br>
    <a href="{{ route('barangs.index') }}">← Batal</a>
@endsection
