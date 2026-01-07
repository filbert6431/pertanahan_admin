@extends('layouts.admin.app')

@section('content')
<main class="content">
    <div class="container-fluid">
        {{-- HEADER --}}
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h3 class="text-white mb-1">
                    <i class="fas fa-plus-circle me-2"></i>Tambah Peta Persil
                </h3>
                <small class="text-light-emphasis">Persil ID: {{ $persil_id }}</small>
            </div>
            <a href="{{ route('peta_persil.index', $persil_id) }}" class="btn btn-outline-light">
                <i class="fas fa-arrow-left me-2"></i>Kembali
            </a>
        </div>

        {{-- FORM --}}
        <div class="card border-0 shadow">
            <div class="card-body">
                <form action="{{ route('peta_persil.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="persil_id" value="{{ $persil_id }}">

                    <div class="row">
                        {{-- PANJANG --}}
                        <div class="col-md-6 mb-3">
                            <label for="panjang_m" class="form-label">
                                <i class="fas fa-ruler-horizontal me-1"></i>Panjang (meter)
                                <span class="text-danger">*</span>
                            </label>
                            <input type="number"
                                   class="form-control"
                                   id="panjang_m"
                                   name="panjang_m"
                                   required
                                   min="1">
                        </div>

                        {{-- LEBAR --}}
                        <div class="col-md-6 mb-3">
                            <label for="lebar_m" class="form-label">
                                <i class="fas fa-ruler-vertical me-1"></i>Lebar (meter)
                                <span class="text-danger">*</span>
                            </label>
                            <input type="number"
                                   class="form-control"
                                   id="lebar_m"
                                   name="lebar_m"
                                   required
                                   min="1">
                        </div>

                        {{-- KOORDINAT --}}
                        <div class="col-12 mb-3">
                            <label for="geojson" class="form-label">
                                <i class="fas fa-map-marker-alt me-1"></i>Koordinat (Opsional)
                            </label>
                            <textarea class="form-control"
                                      id="geojson"
                                      name="geojson"
                                      rows="3"
                                      placeholder='Contoh: {"titik1": "110.123,-7.456", "titik2": "110.124,-7.456"}'>
                            </textarea>
                            <small class="text-muted">Bisa dalam format JSON atau teks biasa</small>
                        </div>

                        {{-- FILE PETA --}}
                        <div class="col-12 mb-4">
                            <label for="file_peta" class="form-label">
                                <i class="fas fa-file-upload me-1"></i>File Peta (Opsional)
                            </label>
                            <input type="file"
                                   class="form-control"
                                   id="file_peta"
                                   name="file_peta"
                                   accept=".jpg,.jpeg,.png,.pdf">
                            <small class="text-muted">Format: JPG, PNG, PDF. Maksimal 2MB</small>
                        </div>
                    </div>

                    {{-- ACTION BUTTONS --}}
                    <div class="d-flex justify-content-between mt-4 pt-3 border-top">
                        <a href="{{ route('peta_persil.index', $persil_id) }}" class="btn btn-secondary">
                            <i class="fas fa-times me-2"></i>Batal
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-2"></i>Simpan Data
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection
