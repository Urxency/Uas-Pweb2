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
                <h3 class="card-title mb-0">Kategori Resep</h3>
                <a href="{{ route('kategori.create') }}" class="btn btn-primary">Tambah kategori</a>
            </div>
        @if ($kategori->count() > 0)
                <div class="card-body">
                    <table class="table table-bordered table-striped table-hover  " id="data-table">
                        <thead class="table-dark">
                            <tr>
                                <th>No</th>
                                <th>Nama kategori</th>
                                <th>Durasi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kategori as $index => $data)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td><strong>{{ $data->nama_kategori }}</strong></td>
                                    <td><strong>{{ $data->durasi }}</strong></td>
                                    <td>
                                        <div class="btn-group btn-group-sm" role="group">
                                                <a href="{{ route('kategori.show', $data->id) }}"
                                                    class="btn btn-outline-info" title="Detail">
                                                    <i class="fas fa-eye"></i>Show
                                                </a>
                                                <a href="{{ route('kategori.edit', $data->id) }}"
                                                    class="btn btn-outline-warning" title="Edit">
                                                    <i class="fas fa-edit"></i>Edit
                                                </a>
                                                <form action="{{ route('kategori.destroy', $data->id) }}" method="POST"
                                                    class="d-inline"
                                                    onsubmit="return confirm('Yakin ingin menghapus kategori {{ $data->kategori_nama }}?')">
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
                        <h5 class="text-muted">Belum ada data kategori</h5>
                    </div>
            @endif
        </div>
    </div>
    </div>
    </div>
    </div>
    </div>
@endsection
