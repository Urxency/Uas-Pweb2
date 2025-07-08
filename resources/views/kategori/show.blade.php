@extends('layouts.app')

@section('title', 'Detail Kategori')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4>Detail Kategori</h4>
        </div>
        <div class="card-body">
            <p><strong>Nama Kategori:</strong> {{ $kategori->nama_kategori }}</p>
        </div>
        <div class="card-footer">
            <a href="{{ route('kategori.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>
@endsection
