@extends('layouts.admin.app')

@section('content')
<main class="content">
    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="text-white mb-1">
                <i class="fas fa-gavel me-2"></i>Tambah Sengketa Persil
            </h3>
            <small class="text-light-emphasis">Menambahkan data sengketa baru untuk persil</small>
        </div>
        <a href="{{ route('sengketa_persil.index', $persil_id) }}" class="btn btn-outline-light">
            <i class="fas fa-arrow-left me-2"></i>Kembali
        </a>
    </div>

    {{-- FORM CARD --}}
    <div class="card border-0 shadow-lg">
        <div class="card-header bg-dark text-white py-3">
            <h5 class="mb-0">
                <i class="fas fa-file-contract me-2"></i>Form Data Sengketa
            </h5>
        </div>

        <div class="card-body bg-dark text-light">
            <form action="{{ route('sengketa_persil.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="persil_id" value="{{ $persil_id }}">

                <div class="row">
                    {{-- PIHAK 1 --}}
                    <div class="col-md-6 mb-4">
                        <label for="pihak_1" class="form-label fw-semibold">
                            <i class="fas fa-user-tie me-2"></i>Pihak 1
                            <span class="text-danger">*</span>
                        </label>
                        <input type="text"
                               class="form-control bg-secondary border-secondary text-light"
                               id="pihak_1"
                               name="pihak_1"
                               placeholder="Masukkan nama pihak pertama"
                               required>
                        <div class="form-text text-light-emphasis">Pihak pengaju sengketa</div>
                    </div>

                    {{-- PIHAK 2 --}}
                    <div class="col-md-6 mb-4">
                        <label for="pihak_2" class="form-label fw-semibold">
                            <i class="fas fa-user-tie me-2"></i>Pihak 2
                            <span class="text-danger">*</span>
                        </label>
                        <input type="text"
                               class="form-control bg-secondary border-secondary text-light"
                               id="pihak_2"
                               name="pihak_2"
                               placeholder="Masukkan nama pihak kedua"
                               required>
                        <div class="form-text text-light-emphasis">Pihak yang diajukan sengketa</div>
                    </div>

                    {{-- STATUS --}}
                    <div class="col-md-6 mb-4">
                        <label for="status" class="form-label fw-semibold">
                            <i class="fas fa-info-circle me-2"></i>Status
                            <span class="text-danger">*</span>
                        </label>
                        <select class="form-select bg-secondary border-secondary text-light"
                                id="status"
                                name="status"
                                required>
                            <option value="" selected disabled>-- Pilih Status --</option>
                            <option value="pending" class="text-warning">Pending</option>
                            <option value="diterima" class="text-success">Diterima</option>
                            <option value="ditolak" class="text-danger">Ditolak</option>
                        </select>
                        <div class="form-text text-light-emphasis">Status terkini dari sengketa</div>
                    </div>

                    {{-- KRONOLOGI --}}
                    <div class="col-12 mb-4">
                        <label for="kronologi" class="form-label fw-semibold">
                            <i class="fas fa-clock-rotate-left me-2"></i>Kronologi
                        </label>
                        <textarea class="form-control bg-secondary border-secondary text-light"
                                  id="kronologi"
                                  name="kronologi"
                                  rows="4"
                                  placeholder="Deskripsikan kronologi kejadian sengketa..."></textarea>
                        <div class="form-text text-light-emphasis">Uraian lengkap tentang awal mula sengketa</div>
                    </div>

                    {{-- PENYELESAIAN --}}
                    <div class="col-12 mb-4">
                        <label for="penyelesaian" class="form-label fw-semibold">
                            <i class="fas fa-handshake me-2"></i>Penyelesaian
                        </label>
                        <textarea class="form-control bg-secondary border-secondary text-light"
                                  id="penyelesaian"
                                  name="penyelesaian"
                                  rows="4"
                                  placeholder="Jelaskan upaya penyelesaian yang dilakukan..."></textarea>
                        <div class="form-text text-light-emphasis">Langkah-langkah penyelesaian sengketa</div>
                    </div>

                    {{-- FILE UPLOAD --}}
                    <div class="col-12 mb-4">
                        <label for="files" class="form-label fw-semibold">
                            <i class="fas fa-paperclip me-2"></i>Dokumen Pendukung
                        </label>
                        <input type="file"
                               class="form-control bg-secondary border-secondary text-light"
                               id="files"
                               name="files[]"
                               multiple
                               accept=".pdf,.doc,.docx,.jpg,.jpeg,.png">
                        <div class="form-text text-light-emphasis">
                            Unggah file pendukung (PDF, DOC, JPG, PNG, JPEG). Maksimal 10MB per file.
                        </div>
                    </div>
                </div>

                {{-- ACTION BUTTONS --}}
                <div class="d-flex justify-content-end gap-3 mt-5 pt-4 border-top border-secondary">
                    <a href="{{ route('sengketa_persil.index', $persil_id) }}" class="btn btn-outline-light px-4">
                        <i class="fas fa-times me-2"></i>Batal
                    </a>
                    <button type="submit" class="btn btn-primary px-4">
                        <i class="fas fa-save me-2"></i>Simpan Data
                    </button>
                </div>
            </form>
        </div>
    </div>
</main>
@endsection

@push('styles')
<style>
    .form-control:focus, .form-select:focus {
        border-color: #6c757d;
        box-shadow: 0 0 0 0.25rem rgba(108, 117, 125, 0.25);
    }
    .card {
        border-radius: 10px;
        overflow: hidden;
    }
    .card-header {
        border-bottom: 1px solid rgba(255,255,255,0.1);
    }
    .form-label {
        color: #e9ecef;
    }
    .form-text {
        font-size: 0.85rem;
    }
</style>
@endpush
