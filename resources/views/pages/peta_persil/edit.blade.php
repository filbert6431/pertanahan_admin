@extends('layouts.admin.app')

@section('content')
<main class="content">
    <div class="container-fluid">
        {{-- HEADER --}}
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h3 class="text-white mb-1">
                    <i class="fas fa-edit me-2"></i>Edit Peta Persil
                </h3>
                <small class="text-light-emphasis">ID: {{ $peta->peta_id }}</small>
            </div>
            <a href="{{ route('peta_persil.show', $peta->peta_id) }}" class="btn btn-outline-light">
                <i class="fas fa-times me-2"></i>Batal
            </a>
        </div>

        {{-- FORM EDIT --}}
        <div class="card border-0 shadow">
            <div class="card-body">
                <form action="{{ route('peta_persil.update', $peta->peta_id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        {{-- PANJANG --}}
                        <div class="col-md-6 mb-3">
                            <label for="panjang_m" class="form-label">Panjang (meter)</label>
                            <input type="number"
                                   class="form-control"
                                   id="panjang_m"
                                   name="panjang_m"
                                   value="{{ old('panjang_m', $peta->panjang_m) }}"
                                   required
                                   min="1">
                        </div>

                        {{-- LEBAR --}}
                        <div class="col-md-6 mb-3">
                            <label for="lebar_m" class="form-label">Lebar (meter)</label>
                            <input type="number"
                                   class="form-control"
                                   id="lebar_m"
                                   name="lebar_m"
                                   value="{{ old('lebar_m', $peta->lebar_m) }}"
                                   required
                                   min="1">
                        </div>

                        {{-- KOORDINAT --}}
                        <div class="col-12 mb-3">
                            <label for="geojson" class="form-label">Koordinat</label>
                            <textarea class="form-control"
                                      id="geojson"
                                      name="geojson"
                                      rows="3">{{ old('geojson', $peta->geojson) }}</textarea>
                        </div>

                        {{-- FILE PETA --}}
                        <div class="col-12 mb-4">
                            <label for="file_peta" class="form-label">File Peta Baru</label>
                            <input type="file"
                                   class="form-control"
                                   id="file_peta"
                                   name="file_peta"
                                   accept=".jpg,.jpeg,.png,.pdf">
                            <small class="text-muted">Upload file baru untuk mengganti yang lama</small>

                            @if($files->count() > 0)
                                <div class="mt-2">
                                    <small class="text-info">
                                        <i class="fas fa-info-circle me-1"></i>
                                        File saat ini:
                                        @foreach($files as $file)
                                            {{ $file->file_url }}
                                        @endforeach
                                    </small>
                                </div>
                            @endif
                        </div>
                    </div>

                    {{-- ACTION BUTTONS --}}
                    <div class="d-flex justify-content-between mt-4 pt-3 border-top">
                        <a href="{{ route('peta_persil.show', $peta->peta_id) }}" class="btn btn-secondary">
                            <i class="fas fa-times me-2"></i>Batal
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-2"></i>Perbarui Data
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection
