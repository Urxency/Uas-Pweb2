@extends('layouts.app')

@section('content')
<div class="container mt-3">
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h3>Resep</h3>
        </div>
        <div class="card-body">
            <p><strong>Nama Resep :</strong> {{ $resep->judul_resep }}</p>
            <p><strong>Kategori :</strong> {{ $resep->kategori->nama_kategori }}</p>
            <p><strong>Bahan :</strong> {{ $resep->bahan_resep }}</p>
            <p><strong>Langkah :</strong> {{ $resep->langkah_resep }}</p>
            <p><strong>Gambar :</strong>
                @if ($resep->gambar)
                    <img src="{{ asset('storage/gambar/' . $resep->gambar) }}" width="200" alt="Gambar Resep">
                @else
                    <em>Tidak ada gambar</em>
                @endif
            </p>

            {{-- ✅ Menampilkan rata-rata rating --}}
            <p><strong>Rating Rata-rata:</strong>
                {{ $resep->averageRating() !== null ? number_format($resep->averageRating(), 1) . ' / 5' : 'Belum ada rating' }}
            </p>

            {{-- ✅ Form rating untuk user --}}
            @auth
                <form action="{{ route('resep.rate', $resep->id) }}" method="POST" class="mb-3">
                    @csrf
                    <label for="rating"><strong>Beri Rating:</strong></label>
                    <select name="rating" id="rating" class="form-control w-25 d-inline-block" required>
                        @for ($i = 1; $i <= 5; $i++)
                            <option value="{{ $i }}"
                                {{ optional($resep->ratings->where('user_id', Auth::id())->first())->rating == $i ? 'selected' : '' }}>
                                {{ $i }} ⭐
                            </option>
                        @endfor
                    </select>
                    <button type="submit" class="btn btn-success btn-sm">Kirim</button>
                </form>
            @else
                <p><a href="{{ route('login') }}">Login</a> untuk memberikan rating.</p>
            @endauth

            <a href="{{ route('resep.index') }}" class="btn btn-warning">Kembali</a>
        </div>
    </div>
</div>
@endsection
