@extends('layouts.app')

@section('content')
<div class="container mt-3">
    <div class="card">
        <div class="card-header bg-priamary text-bg-primary">
            <h3>Kategori</h3>
        </div>
        <div class="card-body">
            <p><strong>Nama Kategori :</strong> {{ $kategori->nama_kategori }}</p>
            <a href="{{ route('kategori.index') }}" class="btn btn-warning">Kembali</a>
        </div>
    </div>
</div>

@endsection

