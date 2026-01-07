@extends('layouts.admin.app')

@section('content')
    <main class="content">

        <h3 class="text-white mb-3">Tambah Dokumen Persil</h3>

        <form action="{{ route('dokpersil.store', $persil_id) }}" method="POST" enctype="multipart/form-data"
            class="card p-4 bg-dark text-light">

            @csrf
            <input type="hidden" name="persil_id" value="{{ $persil_id }}">


            <div class="mb-3">
                <label class="form-label">Jenis Dokumen</label>
                <input type="text" name="jenis_dokumen" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Nomor Dokumen</label>
                <input type="text" name="nomor" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Keterangan</label>
                <textarea name="keterangan" class="form-control"></textarea>
            </div>

            {{-- MULTIUPLOAD --}}
            <div class="mb-3">
                <label class="form-label">Upload File (*.pdf, *.jpg, dll)</label>
                <input type="file" name="files[]" multiple class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">
                Simpan Dokumen
            </button>

        </form>

    </main>
@endsection
