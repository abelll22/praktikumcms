@extends('layouts.app')

@section('title', 'Detail Barang')

@section('content')

    @if (request('confirm') === 'delete')
        <h1><strong>Apakah yakin ingin menghapus data ini?</strong></h1>

        <p><strong>{{ $barang['title'] }}</strong></p>
        <p>{{ $barang['content'] }}</p>

        <form action="{{ route('barangs.destroy', $barang['id']) }}" method="POST" style="display: inline;">
            @csrf
            @method('DELETE')
            <button type="submit">Hapus</button>
        </form>
        <a href="{{ route('barangs.show', $barang['id']) }}">← Batal</a>

    @else
        <h1>{{ $barang['title'] }}</h1>
        <p>{{ $barang['content'] }}</p>

        @if (!empty($barang['items']))
            <h3>Detail:</h3>
            <ul>
                @foreach ($barang['items'] as $item)
                    <li>{{ $item }}</li>
                @endforeach
            </ul>
        @endif

        <a href="{{ route('barangs.index') }}" class="btn btn-secondary mt-3">Kembali ke Daftar Barang</a>
        <a href="{{ route('barangs.edit', $barang['id']) }}" class="btn btn-warning mt-3">Edit</a>
        <a href="{{ route('barangs.show', ['id' => $barang['id'], 'confirm' => 'delete']) }}" class="btn btn-danger mt-3">Hapus</a>
    @endif

@endsection
