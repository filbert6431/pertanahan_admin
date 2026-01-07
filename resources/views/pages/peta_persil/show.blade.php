@extends('layouts.admin.app')

@section('content')
<main class="content">
    <div class="container-fluid">
        {{-- HEADER --}}
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h3 class="text-white mb-1">
                    <i class="fas fa-map me-2"></i>Detail Peta Persil
                </h3>
                <small class="text-light-emphasis">ID Peta: {{ $peta->peta_id }}</small>
            </div>
            <div>
                <a href="{{ route('peta_persil.index', $peta->persil_id) }}" class="btn btn-outline-light me-2">
                    <i class="fas fa-arrow-left me-2"></i>Kembali
                </a>
                <a href="{{ route('peta_persil.edit', $peta->peta_id) }}" class="btn btn-warning me-2">
                    <i class="fas fa-edit me-1"></i>Edit
                </a>
                <form action="{{ route('peta_persil.destroy', $peta->peta_id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger"
                            onclick="return confirm('Hapus peta ini?')">
                        <i class="fas fa-trash me-1"></i>Hapus
                    </button>
                </form>
            </div>
        </div>

        {{-- DETAIL CARD --}}
        <div class="row">
            {{-- INFO PETA --}}
            <div class="col-md-6">
                <div class="card border-0 shadow mb-4">
                    <div class="card-header bg-info text-white">
                        <h5 class="mb-0">
                            <i class="fas fa-info-circle me-2"></i>Informasi Peta
                        </h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-sm">
                            <tr>
                                <th width="120">Persil ID</th>
                                <td>{{ $peta->persil_id }}</td>
                            </tr>
                            <tr>
                                <th>Panjang</th>
                                <td>{{ $peta->panjang_m }} meter</td>
                            </tr>
                            <tr>
                                <th>Lebar</th>
                                <td>{{ $peta->lebar_m }} meter</td>
                            </tr>
                            @if($peta->geojson)
                            <tr>
                                <th>Koordinat</th>
                                <td>
                                    <pre class="bg-light p-2 rounded mb-0">{{ $peta->geojson }}</pre>
                                </td>
                            </tr>
                            @endif
                            <tr>
                                <th>Dibuat</th>
                                <td>{{ $peta->created_at->format('d/m/Y H:i') }}</td>
                            </tr>
                            <tr>
                                <th>Diperbarui</th>
                                <td>{{ $peta->updated_at->format('d/m/Y H:i') }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>

            {{-- FILE PETA --}}
            <div class="col-md-6">
                <div class="card border-0 shadow mb-4">
                    <div class="card-header bg-success text-white">
                        <h5 class="mb-0">
                            <i class="fas fa-file me-2"></i>File Peta
                        </h5>
                    </div>
                    <div class="card-body">
                        @if($files->count() > 0)
                            <div class="list-group">
                                @foreach($files as $file)
                                <div class="list-group-item d-flex justify-content-between align-items-center">
                                    <div>
                                        <i class="fas fa-file me-2"></i>
                                        {{ $file->file_url }}
                                    </div>
                                    <div>
                                        <a href="{{ Storage::url('uploads/' . $file->file_url) }}"
                                           target="_blank"
                                           class="btn btn-sm btn-info">
                                            <i class="fas fa-download"></i>
                                        </a>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        @else
                            <div class="text-center py-4">
                                <i class="fas fa-file fa-3x text-muted mb-3"></i>
                                <p class="text-muted mb-0">Tidak ada file peta</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
