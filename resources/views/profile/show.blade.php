@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">

                {{-- Flash Message --}}
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <div class="card shadow rounded">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center mb-4">
                            <div class="me-3">
                                <img src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&background=0D8ABC&color=fff&size=100"
                                    alt="Avatar" class="rounded-circle shadow" width="80" height="80">
                            </div>
                            <div>
                                <h4 class="mb-1">{{ $user->name }}</h4>
                                <p class="mb-0 text-muted">{{ $user->email }}</p>
                            </div>
                        </div>

                        <hr>

                        <div class="mb-3">
                            <h6 class="text-uppercase text-secondary">Role</h6>
                            <span class="badge bg-primary fs-6">{{ $user->role->name ?? 'Tidak ada' }}</span>
                        </div>

                        <div class="mb-3">
                            <h6 class="text-uppercase text-secondary">Tanggal Daftar</h6>
                            <p class="mb-0">
                                {{ \Carbon\Carbon::parse($user->created_at)->locale('id')->translatedFormat('d F Y') }}
                            </p>
                        </div>

                        <div class="d-flex justify-content-between mt-4">
                            <a href="{{ route('home') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left me-1"></i> Kembali
                            </a>

                            <div class="d-flex gap-2">
                                <a href="{{ route('profile.edit', $user->id) }}" class="btn btn-info">
                                    <i class="fas fa-edit me-1"></i> Edit
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
