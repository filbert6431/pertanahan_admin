@extends('layouts.admin.app')

@section('content')
<main class="content">
    <div class="container-fluid">
        {{-- HEADER --}}
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h3 class="text-white mb-1">
                    <i class="fas fa-map me-2"></i>Daftar Peta Persil
                </h3>
                <small class="text-light-emphasis">Persil ID: {{ $persil_id }}</small>
            </div>
            <div>
                <a href="{{ route('persil.index') }}" class="btn btn-outline-light me-2">
                    <i class="fas fa-list me-1"></i>Daftar Persil
                </a>
                <a href="{{ route('peta_persil.create', $persil_id) }}" class="btn btn-primary">
                    <i class="fas fa-plus me-1"></i>Tambah Peta
                </a>
            </div>
        </div>

        {{-- TABLE --}}
        <div class="card border-0 shadow">
            <div class="card-body">
                @if($peta->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="table-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>Panjang</th>
                                    <th>Lebar</th>
                                    <th>geojson</th>
                                    <th>File</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($peta as $item)
                                <tr>
                                    <td>{{ $item->peta_id }}</td>
                                    <td>{{ $item->panjang_m }} m</td>
                                    <td>{{ $item->lebar_m }} m</td>
                                    <td>
                                        @if($item->geojson)
                                            <span class="badge bg-success">Ada</span>
                                        @else
                                            <span class="badge bg-secondary">Tidak ada</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($item->media->count() > 0)
                                            <span class="badge bg-info">{{ $item->media->count() }} file</span>
                                        @else
                                            <span class="badge bg-secondary">Tidak ada</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('peta_persil.show', $item->peta_id) }}"
                                               class="btn btn-sm btn-info">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('peta_persil.edit', $item->peta_id) }}"
                                               class="btn btn-sm btn-warning">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('peta_persil.destroy', $item->peta_id) }}"
                                                  method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger"
                                                        onclick="return confirm('Hapus peta ini?')">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="text-center py-5">
                        <i class="fas fa-map fa-3x text-muted mb-3"></i>
                        <h5>Belum ada data peta</h5>
                        <p class="text-muted">Tambahkan peta untuk persil ini</p>
                        <a href="{{ route('peta_persil.create', $persil_id) }}" class="btn btn-primary">
                            <i class="fas fa-plus me-2"></i>Tambah Peta
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</main>
@endsection
