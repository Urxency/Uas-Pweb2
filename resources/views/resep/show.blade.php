@extends('layouts.app')

@section('content')
<div class="container mt-3">
    <div class="card">
        <div class="card-header bg-priamary text-bg-primary">
            <h3>Resep</h3>
        </div>
        <div class="card-body">
            <p><strong>Nama Resep :</strong> {{ $resep->judul_resep }}</p>
            <p><strong>Kategori :</strong> {{ $resep->kategori_id }}</p>
            <p><strong>Bahan :</strong> {{ $resep->bahan_resep }}</p>
            <p><strong>Langkah :</strong> {{ $resep->langkah_resep }}</p>
            <p><strong>Gambar :</strong> {{ $resep->gambar }}</p>
            <a href="{{ route('resep.index') }}" class="btn btn-warning">Kembali</a>
        </div>
    </div>
</div>

@endsection