@extends('layouts.app')
@section('content')
    <div class="container">

        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center bg-primary">
                <h3 class="card-title text-bg-primary">Tambah kategori</h3>
                <a href="{{ route('kategori.index') }}" class="btn btn-warning">Kembali</a>
            </div>
            <div class="card-body">
                <form action="{{ route('kategori.store') }}" method="POST">
                    @csrf

                    <div class="form-group my-2">
                        <label for="nama_kategori">Nama Kategori</label>
                        <input type="text" class="form-control @error('nama_kategori') is-invalid @enderror"
                            name="nama_kategori" id="nama_kategori" value="{{ old('nama_kategori') }}" autofocus>
                        @error('nama_kategori')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>


                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>

            </div>
        </div>
    @endsection
