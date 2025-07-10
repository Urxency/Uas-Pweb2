@extends('layouts.app')
@section('content')
    <div class="container">

        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center bg-primary">
                <h3 class="card-title text-bg-primary">Edit resep</h3>
                <a href="{{ route('resep.index') }}" class="btn btn-warning">Kembali</a>
            </div>
            <div class="card-body">
                <form action="{{ route('resep.update', $resep->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group my-2">
                        <label for="judul_resep">Nama Resep</label>
                        <input type="text" class="form-control @error('judul_resep') is-invalid @enderror"
                            name="judul_resep" id="judul_resep" value="{{ old('judul_resep', $resep->judul_resep) }}"
                            autofocus>
                        @error('judul_resep')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group my-2">
                        <label for="kategori_id">Bahan</label>
                        <input type="text" class="form-control @error('kategori_id') is-invalid @enderror"
                            name="kategori_id" id="kategori_id" value="{{ old('kategori_id', $resep->kategori_id) }}"
                            autofocus>
                        @error('bahan_resep')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group my-2">
                        <label for="bahan_resep">Bahan</label>
                        <input type="text" class="form-control @error('bahan_resep') is-invalid @enderror"
                            name="bahan_resep" id="bahan_resep" value="{{ old('bahan_resep', $resep->bahan_resep) }}"
                            autofocus>
                        @error('bahan_resep')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group my-2">
                        <label for="langkah_resep">Langkah</label>
                        <input type="text" class="form-control @error('langkah_resep') is-invalid @enderror"
                            name="langkah_resep" id="langkah_resep" value="{{ old('langkah_resep', $resep->langkah_resep) }}"
                            autofocus>
                        @error('langkah_resep')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group my-2">
                        <label for="gambar">Gambar Resep</label>
                        <input type="text" class="form-control @error('gambar') is-invalid @enderror"
                            name="gambar" id="gambar" value="{{ old('gambar', $resep->gambar) }}"
                            autofocus>
                        @error('gambar')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>


                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>

            </div>
        </div>
    @endsection
