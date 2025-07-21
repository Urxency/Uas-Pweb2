@extends('layouts.app')
@section('content')
    <div class="container">

        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center bg-primary">
                <h3 class="card-title text-bg-primary">Edit Resep</h3>
                <a href="{{ route('resep.index') }}" class="btn btn-warning">Kembali</a>
            </div>
            <div class="card-body">
                <form action="{{ route('resep.update', $resep->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group my-2">
                        <label for="judul_resep">Nama Resep</label>
                        <input type="text" class="form-control @error('judul_resep') is-invalid @enderror"
                            name="judul_resep" id="judul_resep" value="{{ old('judul_resep', $resep->judul_resep) }}" autofocus>
                        @error('judul_resep')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    {{-- Kategori --}}
                    <div class="form-group my-2">
                        <label for="kategori_id">Kategori</label>
                        <select class="form-select @error('kategori_id') is-invalid @enderror" name="kategori_id" id="kategori_id">
                            <option disabled selected>Pilih kategori</option>
                            @foreach ($kategori as $item)
                                <option value="{{ $item->id }}" {{ $resep->kategori_id == $item->id ? 'selected' : '' }}>
                                    {{ $item->nama_kategori }}
                                </option>
                            @endforeach
                        </select>
                        @error('kategori_id')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group my-2">
                        <label for="level">Level</label>
                        <select class="form-select @error('level') is-invalid @enderror" name="level" id="level">
                            <option selected disabled>Pilih Level</option>
                            <option value="Mudah" {{ old('level') == 'Mudah' ? 'selected' : '' }}>Mudah</option>
                            <option value="Sedang" {{ old('level') == 'Sedang' ? 'selected' : '' }}>Sedang</option>
                            <option value="Sulit" {{ old('level') == 'Sulit' ? 'selected' : '' }}>Sulit</option>
                        </select>
                        @error('level')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group my-2">
                        <label for="durasi">Durasi</label>
                        <select class="form-select @error('durasi') is-invalid @enderror" name="durasi" id="durasi">
                            <option selected disabled>Pilih durasi</option>
                            <option value="15 menit" {{ old('durasi') == '15 menit' ? 'selected' : '' }}>15 menit</option>
                            <option value="30 menit" {{ old('durasi') == '30 menit' ? 'selected' : '' }}>30 menit</option>
                            <option value="1 jam" {{ old('durasi') == '1 jam' ? 'selected' : '' }}>1 jam</option>
                            <option value=">1 jam" {{ old('durasi') == '>1 jam' ? 'selected' : '' }}>Lebih dari 1 jam</option>
                        </select>
                        @error('durasi')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    {{-- Bahan --}}
                    <div class="form-group my-2">
                        <label for="bahan_resep">Bahan</label>
                        <textarea class="form-control @error('bahan_resep') is-invalid @enderror"
                            name="bahan_resep" id="bahan_resep" rows="4">{{ old('bahan_resep', $resep->bahan_resep) }}</textarea>
                        @error('bahan_resep')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    {{-- Langkah --}}
                    <div class="form-group my-2">
                        <label for="langkah_resep">Langkah</label>
                        <textarea class="form-control @error('langkah_resep') is-invalid @enderror"
                            name="langkah_resep" id="langkah_resep" rows="5">{{ old('langkah_resep', $resep->langkah_resep) }}</textarea>
                        @error('langkah_resep')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    {{-- Gambar --}}
                    <div class="form-group my-2">
                        <label for="gambar">Gambar Resep</label>
                        <input type="file" class="form-control @error('gambar') is-invalid @enderror"
                            name="gambar" id="gambar" accept="image/*">
                        @error('gambar')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror

                        @if ($resep->gambar)
                            <div class="mt-2">
                                <img src="{{ asset('storage/gambar/' . $resep->gambar) }}" alt="Gambar Resep" width="150">
                            </div>
                        @endif
                    </div>


                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection