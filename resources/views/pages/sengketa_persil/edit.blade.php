@extends('layouts.admin.app')

@section('content')
    <main class="content">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3 class="text-white mb-0">Edit Sengketa Persil</h3>
            <a href="{{ route('sengketa_persil.index', $sengketa->persil_id) }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left me-1"></i> Kembali
            </a>
        </div>

        <div class="card border-0 shadow bg-dark text-light">
            <div class="card-body">
                {{-- ERROR VALIDASI --}}
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form a
                ction="{{ route('sengketa_persil.update', $sengketa->sengketa_id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <input type="hidden" name="persil_id" value="{{ $sengketa->persil_id }}">

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="tanggal_sengketa" class="form-label">Tanggal Sengketa</label>
                            <input type="date" class="form-control" id="tanggal_sengketa" name="tanggal_sengketa" value="{{ old('tanggal_sengketa', $sengketa->tanggal_sengketa ? \Carbon\Carbon::parse($sengketa->tanggal_sengketa)->format('Y-m-d') : '') }}" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="pihak_1" class="form-label">Pihak 1</label>
                            <input type="text" class="form-control" id="pihak_1" name="pihak_1" value="{{ old('pihak_1', $sengketa->pihak_1) }}" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="pihak_2" class="form-label">Pihak 2</label>
                            <input type="text" class="form-control" id="pihak_2" name="pihak_2" value="{{ old('pihak_2', $sengketa->pihak_2) }}" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-control" id="status" name="status" required>
                                <option value="pending" {{ old('status', $sengketa->status) == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="diterima" {{ old('status', $sengketa->status) == 'diterima' ? 'selected' : '' }}>Diterima</option>
                                <option value="ditolak" {{ old('status', $sengketa->status) == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                            </select>
                        </div>

                        <div class="col-md-12 mb-3">
                            <label for="kronologi" class="form-label">Kronologi</label>
                            <textarea class="form-control" id="kronologi" name="kronologi" rows="3">{{ old('kronologi', $sengketa->kronologi) }}</textarea>
                        </div>

                        <div class="col-md-12 mb-3">
                            <label for="penyelesaian" class="form-label">Penyelesaian</label>
                            <textarea class="form-control" id="penyelesaian" name="penyelesaian" rows="3">{{ old('penyelesaian', $sengketa->penyelesaian) }}</textarea>
                        </div>

                        <div class="col-md-12 mb-3">
                            <label for="keterangan" class="form-label">Keterangan</label>
                            <textarea class="form-control" id="keterangan" name="keterangan" rows="3">{{ old('keterangan', $sengketa->keterangan) }}</textarea>
                        </div>

                        <div class="col-md-12 mb-3">
                            <label for="files" class="form-label">Upload File Tambahan (opsional)</label>
                            <input type="file" class="form-control" id="files" name="files[]" multiple>
                            <small class="text-muted">Biarkan kosong jika tidak ingin menambah file.</small>
                            @php
                                $existingFiles = \App\Models\media::where('ref_table', 'sengketa_persil')->where('ref_id', $sengketa->sengketa_id)->get();
                            @endphp
                            @if($existingFiles->count())
                                <div class="mt-2">
                                    <strong>File yang sudah ada:</strong>
                                    <ul>
                                        @foreach($existingFiles as $file)
                                            <li><a href="{{ asset('storage/' . $file->file_path) }}" target="_blank">{{ $file->file_name }}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>
                    </div>

                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-save me-1"></i> Update
                    </button>
                </form>
            </div>
        </div>
    </main>
@endsection
