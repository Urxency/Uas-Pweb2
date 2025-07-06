@extends('layouts.app')

@section('content')
<div class="container mt-3">
    <div class="card">
        <div class="card-header bg-priamary text-bg-primary">
            <h3>Resep</h3>
        </div>
        <div class="card-body">
            <p><strong>Nama Resep :</strong> {{ $resep->judul_resep }}</p>
            <a href="{{ route('resep.index') }}" class="btn btn-warning">Kembali</a>
        </div>
    </div>
</div>

@endsection