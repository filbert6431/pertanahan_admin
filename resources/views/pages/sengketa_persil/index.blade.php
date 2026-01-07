@extends('layouts.admin.app')

@section('content')
    <main class="content">

        {{-- HEADER --}}
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3 class="text-white mb-0">Daftar Sengketa Persil</h3>

            <a href="{{ route('sengketa_persil.create', $persil_id) }}" class="btn btn-success">
                <i class="fas fa-plus me-1"></i> Tambah Sengketa
            </a>
        </div>

        {{-- TABLE --}}
        <div class="card border-0 shadow bg-dark text-light">
            <div class="card-body table-responsive">

                <table class="table table-dark table-hover align-middle mb-0">
                    <thead class="text-primary">
                        <tr>
                            <th class="text-center">ID Sengketa</th>
                            <th class="text-center">Persil</th>
                            <th class="text-center">Tanggal Sengketa</th>
                            <th class="text-center">Pihak 1</th>
                            <th class="text-center">Pihak 2</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Kronologi</th>
                            <th class="text-center">Penyelesaian</th>
                            <th class="text-center">File</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($sengketa_persil as $s)
                            @php
                                $files = \App\Models\media::where('ref_table', 'sengketa_persil')
                                    ->where('ref_id', $s->sengketa_id)
                                    ->get();
                            @endphp

                            <tr>
                                <td class="text-center">{{ $s->sengketa_id }}</td>
                                <td class="text-center">{{ $s->persil->nama ?? $s->persil_id }}</td>
                                <td class="text-center">
                                    {{ $s->tanggal_sengketa ? \Carbon\Carbon::parse($s->tanggal_sengketa)->format('d/m/Y') : '-' }}
                                </td>
                                <td class="text-center">{{ $s->pihak_1 ?? '-' }}</td>
                                <td class="text-center">{{ $s->pihak_2 ?? '-' }}</td>
                                <td class="text-center">
                                    @php
                                        $status = strtolower($s->status ?? 'pending');
                                        $badgeColor = match ($status) {
                                            'diterima' => 'success',
                                            'pending' => 'warning',
                                            'ditolak' => 'danger',
                                            default => 'info',
                                        };
                                    @endphp
                                    <span class="badge bg-{{ $badgeColor }}">{{ ucfirst($status) }}</span>
                                </td>
                                <td class="text-center">{{ $s->kronologi ?? '-' }}</td>
                                <td class="text-center">{{ $s->penyelesaian ?? '-' }}</td>
                                {{-- FILE --}}
                                <td class="text-center">
                                    @if ($files->count())
                                        <span class="badge bg-primary">
                                            {{ $files->count() }} file
                                        </span>

                                        <a href="{{ route('sengketa_persil.show', $s->sengketa_id) }}"
                                            class="btn btn-sm btn-outline-info ms-1">
                                            Lihat
                                        </a>
                                    @else
                                        <span class="badge bg-secondary">No file</span>
                                    @endif
                                </td>

                                {{-- AKSI --}}
                                <td class="text-center">
                                    <a href="{{ route('sengketa_persil.edit', $s->sengketa_id) }}"
                                        class="btn btn-info btn-xs">Edit</a>
                                    <form action="{{ route('sengketa_persil.destroy', $s->sengketa_id) }}" method="POST"
                                        class="d-inline" onsubmit="return confirm('Yakin ingin menghapus sengketa ini?')">
                                        @csrf
                                        @method('DELETE')

                                        <button class="btn btn-sm btn-danger">
                                            <i class="fas fa-trash me-1"></i> Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="11" class="text-center text-muted py-4">
                                    Belum ada sengketa untuk persil ini.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

            </div>
        </div>

    </main>
@endsection
