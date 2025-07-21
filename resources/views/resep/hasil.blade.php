@extends('layouts.app')

@section('content')
<div class="container">
    <h4>Hasil pencarian untuk: "{{ $keyword }}"</h4>

    @if ($reseps->count() > 0)
        <div class="row">
            @foreach ($reseps as $resep)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        @if ($resep->gambar)
                            <img src="{{ asset('storage/' . $resep->gambar) }}" class="card-img-top" alt="{{ $resep->judul_resep }}">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $resep->judul_resep }}</h5>
                            <p class="card-text">{{ Str::limit($resep->bahan_resep, 60) }}</p>
                            <a href="{{ route('resep.show', $resep->id) }}" class="btn btn-sm btn-primary">Lihat Resep</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        {{ $reseps->withQueryString()->links() }}
    @else
        <div class="alert alert-info">Tidak ada resep ditemukan.</div>
    @endif
</div>
@endsection