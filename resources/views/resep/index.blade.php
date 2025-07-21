@extends('layouts.app')
@section('content')
    <div class="container">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="card mt-3">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="card-title mb-0">Resep Saya</h3>
                <a href="{{ route('resep.create') }}" class="btn btn-primary">Tambah resep</a>
            </div>
            @if ($reseps->count() > 0)
                <div class="card-body">
                    <table class="table table-bordered table-striped table-hover  " id="data-table">
                        <thead class="table-dark">
                            <tr>
                                <th>NO</th>
                                <th>Nama Resep</th>
                                <th>Kategori</th>
                                <th>Durasi</th>
                                <th>Bahan</th>
                                <th>Langkah</th>
                                <th>Gambar</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reseps as $index => $data)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td><strong>{{ $data->judul_resep }}</strong></td>
                                    <td><strong>{{ $data->kategori?->nama_kategori ?? '-' }}</strong></td>
                                    <td><strong>{{ $data->durasi ?? '-' }}</strong></td>
                                    <td><strong>{{ $data->bahan_resep }}</strong></td>
                                    <td><strong>{{ $data->langkah_resep }}</strong></td>
                                    <td><strong>
                                            @if ($data->gambar)
                                                <img src="{{ asset('storage/gambar/' . $data->gambar) }}"
                                                    alt="{{ $data->gambar }}" class="img-thumbnail" width="80">
                                            @else
                                                <span class="text-muted">Tidak ada</span>
                                            @endif
                                        </strong></td>
                                    <td>
                                        <div class="btn-group btn-group-sm" role="group">
                                            <a href="{{ route('resep.show', $data->id) }}" class="btn btn-outline-info"
                                                title="Detail">
                                                <i class="fas fa-eye"></i>Show
                                            </a>
                                            <a href="{{ route('resep.edit', $data->id) }}" class="btn btn-outline-warning"
                                                title="Edit">
                                                <i class="fas fa-edit"></i>Edit
                                            </a>
                                            <form action="{{ route('resep.destroy', $data->id) }}" method="POST"
                                                class="d-inline"
                                                onsubmit="return confirm('Yakin ingin menghapus resep {{ $data->resep_nama }}?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-outline-danger" title="Hapus">
                                                    <i class="fas fa-trash"></i>Delete
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="text-center py-5">
                        <i class="fas fa-users fa-3x text-muted mb-3"></i>
                        <h5 class="text-muted">Belum ada data resep</h5>
                    </div>
            @endif
        </div>
    </div>
    </div>
    </div>
    </div>
    </div>
@endsection
