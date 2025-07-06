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
        @if ($resep->count() > 0)
                <div class="card-body">
                    <table class="table table-bordered table-striped table-hover  " id="data-table">
                        <thead class="table-dark">
                            <tr>
                                <th>NO</th>
                                <th>Nama Resep</th>
                                <th>Bahan</th>
                                <th>Langkah</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($resep as $index => $data)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td><strong>{{ $data->judul_resep }}</strong></td>
                                    <td><strong>{{ $data->bahan_resep }}</strong></td>
                                    <td><strong>{{ $data->langkah_resep }}</strong></td>
                                    <td>
                                        <div class="btn-group btn-group-sm" role="group">
                                                <a href="{{ route('resep.show', $data->id) }}"
                                                    class="btn btn-outline-info" title="Detail">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a href="{{ route('resep.edit', $data->id) }}"
                                                    class="btn btn-outline-warning" title="Edit">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{ route('resep.destroy', $data->id) }}" method="POST"
                                                    class="d-inline"
                                                    onsubmit="return confirm('Yakin ingin menghapus resep {{ $data->resep_nama }}?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-outline-danger" title="Hapus">
                                                        <i class="fas fa-trash"></i>
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
