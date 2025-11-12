{{-- start main content --}}
@extends('layouts.admin.app')

@section('content')
    <main class="content">

        {{-- Breadcrumb & Header --}}
        <div class="py-4">
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
                <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent mb-3">
                    <li class="breadcrumb-item">
                        <a href="#">
                            <svg class="icon icon-xxs" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                                </path>
                            </svg>
                        </a>
                    </li>
                    <li class="breadcrumb-item"><a href="#">Daftar akun warga</a></li>
                </ol>
            </nav>

            <div class="d-flex justify-content-between w-100 flex-wrap">
                <div class="mb-3 mb-lg-0">
                    <h1 class="h4 text-white">List data Warga</h1>
                </div>
                <div>
                    <a href="{{ route('warga.create') }}" class="btn btn-success text-white">
                        <i class="far fa-question-circle me-1"></i> Tambah Warga
                    </a>
                </div>
            </div>
        </div>

        {{-- Session Alerts --}}
        @if (session('update'))
            <div class="alert alert-info">{!! session('update') !!}</div>
        @endif

        @if (session('destroy'))
            <div class="alert alert-danger">{!! session('destroy') !!}</div>
        @endif

        {{-- Table Section --}}
        <div class="row">
            <div class="col-12 mb-4">
                <div class="card border-0 shadow bg-dark text-light">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="table-admin"
                                class="table table-dark table-hover table-striped align-middle mb-0 rounded">
                                <thead>
                                    <tr class="text-primary">
                                        <th class="text-center">no_ktp</th>
                                        <th class="text-center">nama</th>
                                        <th class="text-center">Jenis Kelamin</th>
                                        <th class="text-center">agama</th>
                                        <th class="text-center">Pekerjaan</th>
                                        <th class="text-center">nomor HP</th>
                                        <th class="text-center">Email</th>
                                        <th class="text-center">Status</th> {{-- ✅ kolom baru --}}
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($dataWarga as $item)
                                        <tr>
                                            <td>{{ $item->no_ktp }}</td>
                                            <td>{{ $item->nama }}</td>
                                            <td>{{ $item->jenis_kelamin }}</td>
                                            <td>{{ $item->agama }}</td>
                                            <td>{{ $item->pekerjaan }}</td>
                                            <td>{{ $item->no_hp }}</td>
                                            <td>{{ $item->email }}</td>

                                            {{-- ✅ Status Badge --}}
                                            <td class="text-center">
                                                @php
                                                    $status = strtolower($item->status ?? 'pending');
                                                    $badgeColor = match ($status) {
                                                        'aktif' => 'success',
                                                        'nonaktif' => 'secondary',
                                                        'pending' => 'warning',
                                                        'banned' => 'danger',
                                                        default => 'info',
                                                    };
                                                @endphp

                                                <form action="{{ route('warga.updateStatus', $item->warga_id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="dropdown">
                                                        <button
                                                            class="btn btn-sm btn-{{ $badgeColor }} dropdown-toggle text-uppercase"
                                                            type="button" id="dropdownMenuButton{{ $item->warga_id }}"
                                                            data-bs-toggle="dropdown" aria-expanded="false">
                                                            {{ $status }}
                                                        </button>
                                                        <ul class="dropdown-menu"
                                                            aria-labelledby="dropdownMenuButton{{ $item->warga_id }}">
                                                            <li><button class="dropdown-item" name="status"
                                                                    value="aktif">Aktif</button></li>
                                                            <li><button class="dropdown-item" name="status"
                                                                    value="nonaktif">Nonaktif</button></li>
                                                        </ul>
                                                    </div>
                                                </form>
                                            </td>
                                            </td>

                                            {{-- Action --}}
                                            <td class="text-center">
                                                <a href="{{ route('warga.edit', $item->warga_id) }}"
                                                    class="btn btn-info btn-xs me-1 py-1 px-2" style="font-size: 0.75rem;">
                                                    <svg class="icon icon-xs me-1" fill="none" stroke-width="1.5"
                                                        stroke="currentColor" viewBox="0 0 24 24"
                                                        xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10">
                                                        </path>
                                                    </svg>
                                                    Edit
                                                </a>

                                                <form action="{{ route('warga.destroy', $item->warga_id) }}" method="POST"
                                                    style="display:inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">
                                                        <svg class="icon icon-xs me-1" fill="none" stroke-width="1.5"
                                                            stroke="currentColor" viewBox="0 0 24 24"
                                                            xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21
                                                                c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673
                                                                a2.25 2.25 0 0 1-2.244 2.077H8.084
                                                                a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79
                                                                m14.456 0a48.108 48.108 0 0 0-3.478-.397
                                                                m-12 .562c.34-.059.68-.114 1.022-.165
                                                                m0 0a48.11 48.11 0 0 1 3.478-.397
                                                                m7.5 0v-.916
                                                                c0-1.18-.91-2.164-2.09-2.201
                                                                a51.964 51.964 0 0 0-3.32 0
                                                                c-1.18.037-2.09 1.022-2.09 2.201v.916
                                                                m7.5 0a48.667 48.667 0 0 0-7.5 0">
                                                            </path>
                                                        </svg>
                                                        Hapus
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>
    {{-- end main content --}}
@endsection
