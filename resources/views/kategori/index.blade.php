@extends('layouts.app')

@section('content')
<div class="container">
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4>Kategori Saya</h4>
        <a href="{{ route('kategori.create') }}" class="btn btn-primary">Tambah Kategori</a>
    </div>

    <table class="table table-bordered table-hover">
        <thead class="table-dark">
            <tr>
                <th style="width: 50px;">#</th>
                <th>Nama Kategori</th>
                <th style="width: 150px;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($kategori as $index => $item)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $item->nama_kategori }}</td>
                <td>
                <div class="d-flex gap-1">
                    <a href="{{ route('kategori.show', $item->id) }}" class="btn btn-outline-info btn-sm" title="Lihat">
                        <i class="fas fa-eye">Lihat</i>
                    </a>
                    <a href="{{ route('kategori.edit', $item->id) }}" class="btn btn-outline-warning btn-sm" title="Edit">
                        <i class="fas fa-edit">Edit</i>
                    </a>
                    <form action="{{ route('kategori.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus kategori ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger btn-sm" title="Hapus">
                            <i class="fas fa-trash">Hapus</i>
                        </button>
                    </form>
                </div>
            </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
