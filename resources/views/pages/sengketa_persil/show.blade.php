@extends('layouts.admin.app')

@section('content')
    <main class="content">

        {{-- HEADER --}}
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3 class="text-white mb-0">
                Sengketa Persil
            </h3>

            <a href="{{ route('sengketa_persil.index', ['persil_id' => $sengketa->persil_id]) }}"
               class="btn btn-secondary">
                <i class="fas fa-arrow-left me-1"></i> Kembali
            </a>
        </div>

        {{-- INFO SENGKETA --}}
        <div class="card border-0 shadow bg-dark text-light mb-3">
            <div class="card-body">
                <p class="mb-1">
                    <strong>Pihak 1:</strong> {{ $sengketa->pihak_1 }}
                </p>
                <p class="mb-1">
                    <strong>Pihak 2:</strong> {{ $sengketa->pihak_2 }}
                </p>
                <p class="mb-1">
                    <strong>Status:</strong>
                    <span class="badge bg-
                        {{ $sengketa->status === 'diterima' ? 'success' :
                           ($sengketa->status === 'ditolak' ? 'danger' : 'warning') }}">
                        {{ ucfirst($sengketa->status) }}
                    </span>
                </p>
                <p class="mb-1">
                    <strong>Kronologi:</strong> {{ $sengketa->kronologi ?? '-' }}
                </p>
                <p class="mb-0">
                    <strong>Penyelesaian:</strong> {{ $sengketa->penyelesaian ?? '-' }}
                </p>
            </div>
        </div>

        {{-- FILE LIST --}}
        <div class="card border-0 shadow bg-dark text-light">
            <div class="card-body table-responsive">

                <table class="table table-dark table-hover align-middle mb-0">
                    <thead class="text-primary">
                        <tr>
                            <th>File</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($files as $file)
                            @php
                                $ext = strtolower(pathinfo($file->file_url, PATHINFO_EXTENSION));
                                $fileUrl = \Illuminate\Support\Facades\Storage::url(
                                    'uploads/' . $file->file_url
                                );
                            @endphp

                            <tr>
                                <td>
                                    <i class="fas
                                        @if (in_array($ext, ['jpg', 'jpeg', 'png', 'webp']))
                                            fa-image text-success
                                        @elseif ($ext === 'pdf')
                                            fa-file-pdf text-danger
                                        @else
                                            fa-file text-light
                                        @endif
                                        me-2">
                                    </i>

                                    {{ $file->file_url }}
                                </td>

                                <td class="text-center">
                                    {{-- VIEW --}}
                                    <a href="{{ $fileUrl }}"
                                       target="_blank"
                                       class="btn btn-sm btn-outline-info me-1">
                                        <i class="fas fa-eye"></i>
                                    </a>

                                    {{-- DOWNLOAD --}}
                                    <a href="{{ $fileUrl }}"
                                       download
                                       class="btn btn-sm btn-outline-success">
                                        <i class="fas fa-download"></i>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="2" class="text-center text-muted py-4">
                                    Tidak ada file pada sengketa ini.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

            </div>
        </div>

    </main>
@endsection
