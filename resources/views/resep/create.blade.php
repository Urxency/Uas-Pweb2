@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center bg-primary">
                <h3 class="card-title text-bg-primary">Tambah Resep</h3>
                <a href="{{ route('resep.index') }}" class="btn btn-warning">Kembali</a>
            </div>
            <div class="card-body">
                {{-- ✅ Tambahkan enctype --}}
                <form action="{{ route('resep.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group my-2">
                        <label for="judul_resep">Nama Resep</label>
                        <input type="text" class="form-control @error('judul_resep') is-invalid @enderror"
                            name="judul_resep" id="judul_resep" value="{{ old('judul_resep') }}" autofocus>
                        @error('judul_resep')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group my-2">
                        <label for="nama_kategori">Kategori</label>
                        <select class="form-select @error('kategori_id') is-invalid @enderror" name="kategori_id"
                            id="kategori_id">
                            <option selected disabled>Pilih kategori</option>
                            @foreach ($kategori as $item)
                                <option value="{{ $item->id }}" {{ old('kategori_id') == $item->id ? 'selected' : '' }}>
                                    {{ $item->nama_kategori }}
                                </option>
                            @endforeach
                        </select>
                        @error('kategori_id')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group my-2">
                        <label for="durasi">Durasi</label>
                        <select class="form-select @error('durasi') is-invalid @enderror" name="durasi"
                            id="durasi">
                            <option selected disabled>Pilih kategori</option>
                            @foreach ($kategori as $item)
                                <option value="{{ $item->durasi }}" {{ old('durasi') == $item->id ? 'selected' : '' }}>
                                    {{ $item->durasi }}
                                </option>
                            @endforeach
                        </select>
                        @error('durasi')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group my-2">
                        <label for="bahan_resep">Bahan</label>
                        <input type="text" class="form-control @error('bahan_resep') is-invalid @enderror"
                            name="bahan_resep" id="bahan_resep" value="{{ old('bahan_resep') }}">
                        @error('bahan_resep')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group my-2">
                        <label for="langkah_resep">Langkah</label>
                        <input type="text" class="form-control @error('langkah_resep') is-invalid @enderror"
                            name="langkah_resep" id="langkah_resep" value="{{ old('langkah_resep') }}">
                        @error('langkah_resep')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    {{-- <div class="form-group my-2">
                        <label for="gambar">Gambar Resep</label>
                        <input type="file" class="form-control @error('gambar') is-invalid @enderror" name="gambar"
                            id="gambar" accept="image/*">
                        @error('gambar')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div> --}}

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>

            </div>
        </div>
    @endsection

    
