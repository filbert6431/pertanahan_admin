@extends('layouts.admin.app')

@section('content')
<div class="container-fluid px-4">
    {{-- Header Section --}}
    <div class="d-flex align-items-center py-4 mb-3">
        <div style="
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, #ff0000 0%, #990000 100%);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
            box-shadow: 0 4px 15px rgba(255, 0, 0, 0.2);
        ">
            <i class="fas fa-map-marked-alt text-white" style="font-size: 1.3rem;"></i>
        </div>
        <div class="flex-grow-1">
            <h1 class="h3 mb-1" style="
                background: linear-gradient(f135deg, #ff4d4d 0%, #ff0000 100%);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
                background-clip: text;
                font-weight: 700;
            ">
                Data Persil Management
            </h1>
            <p class="mb-0 text-light opacity-75">
                <i class="fas fa-layer-group me-1"></i> Manage land plots and property records
            </p>
        </div>
        <a href="{{ route('persil.create') }}" class="btn btn-danger d-flex align-items-center gap-2" style="
            background: linear-gradient(135deg, #ff3333 0%, #cc0000 100%);
            border: none;
            border-radius: 10px;
            padding: 10px 20px;
            font-weight: 600;
            box-shadow: 0 4px 15px rgba(255, 0, 0, 0.3);
        ">
            <i class="fas fa-plus"></i>
            <span>Add New Land Plot</span>
        </a>
    </div>

    {{-- Breadcrumb --}}
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb" style="
            background: rgba(255, 255, 255, 0.05);
            border-radius: 10px;
            padding: 12px 20px;
            border: 1px solid rgba(255, 0, 0, 0.1);
        ">
            <li class="breadcrumb-item">
                <a href="{{ route('dashboard') }}" class="text-danger text-decoration-none">
                    <i class="fas fa-home me-1"></i> Dashboard
                </a>
            </li>
            <li class="breadcrumb-item active text-light">
                <i class="fas fa-map me-1"></i> Land Plots
            </li>
        </ol>
    </nav>

    {{-- Session Alerts --}}
    @if (session('update'))
        <div class="alert alert-success alert-dismissible fade show mb-4" role="alert" style="
            background: rgba(40, 167, 69, 0.15);
            border: 1px solid rgba(40, 167, 69, 0.3);
            color: #75b798;
            border-radius: 10px;
            backdrop-filter: blur(10px);
        ">
            <div class="d-flex align-items-center">
                <i class="fas fa-check-circle me-2" style="color: #28a745; font-size: 1.2rem;"></i>
                <div class="flex-grow-1">
                    <strong class="text-success">Success!</strong> {!! session('update') !!}
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif

    @if (session('destroy'))
        <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert" style="
            background: rgba(220, 53, 69, 0.15);
            border: 1px solid rgba(220, 53, 69, 0.3);
            color: #e6a2a9;
            border-radius: 10px;
            backdrop-filter: blur(10px);
        ">
            <div class="d-flex align-items-center">
                <i class="fas fa-exclamation-circle me-2" style="color: #dc3545; font-size: 1.2rem;"></i>
                <div class="flex-grow-1">
                    <strong class="text-danger">Deleted!</strong> {!! session('destroy') !!}
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif

    {{-- Filter & Search --}}
    <div class="card border-0 shadow-lg mb-4" style="
        background: rgba(255, 255, 255, 0.03);
        border-radius: 15px;
        border: 1px solid rgba(255, 0, 0, 0.1);
        backdrop-filter: blur(10px);
    ">
        <div class="card-body p-4">
            <form method="GET" action="{{ route('persil.index') }}">
                <div class="row g-3 align-items-end">
                    <div class="col-md-3">
                        <label class="form-label text-light mb-2" style="font-size: 0.85rem; font-weight: 500;">
                            <i class="fas fa-filter me-1"></i> Filter Status
                        </label>
                        <select name="status" class="form-select" onchange="this.form.submit()" style="
                            background: rgba(255, 255, 255, 0.05);
                            border: 1px solid rgba(255, 0, 0, 0.2);
                            color: #fff;
                            border-radius: 8px;
                            padding: 10px 15px;
                        ">
                            <option value="" style="background: #1a1a1a;">All Status</option>
                            <option value="diterima" {{ request('status') == 'diterima' ? 'selected' : '' }}
                                style="background: #1a1a1a; color: #75b798;">
                                Diterima
                            </option>
                            <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}
                                style="background: #1a1a1a; color: #ffc107;">
                                Pending
                            </option>
                            <option value="ditolak" {{ request('status') == 'ditolak' ? 'selected' : '' }}
                                style="background: #1a1a1a; color: #e6a2a9;">
                                Ditolak
                            </option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label text-light mb-2" style="font-size: 0.85rem; font-weight: 500;">
                            <i class="fas fa-search me-1"></i> Search Land Plots
                        </label>
                        <div class="input-group">
                            <input type="text" name="search" class="form-control"
                                   value="{{ request('search') }}" placeholder="Search by code, owner, or address..."
                                   style="
                                    background: rgba(255, 255, 255, 0.05);
                                    border: 1px solid rgba(255, 0, 0, 0.2);
                                    color: #fff;
                                    border-radius: 8px 0 0 8px;
                                    padding: 10px 15px;
                                    border-right: none;
                                   ">
                            <button type="submit" class="btn btn-danger" style="
                                border-radius: 0 8px 8px 0;
                                border: 1px solid rgba(255, 0, 0, 0.3);
                                background: linear-gradient(135deg, #ff3333 0%, #cc0000 100%);
                                padding: 10px 20px;
                            ">
                                <i class="fas fa-search"></i>
                            </button>
                            @if (request('search'))
                            <a href="{{ request()->fullUrlWithQuery(['search' => null]) }}"
                               class="btn btn-outline-danger ms-2" style="
                                border: 1px solid rgba(255, 0, 0, 0.3);
                                color: #ff6666;
                                border-radius: 8px;
                                padding: 10px 15px;
                               ">
                                Clear
                            </a>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-3 text-end">
                        <div class="stat-box p-3 rounded" style="
                            background: rgba(255, 0, 0, 0.1);
                            border: 1px solid rgba(255, 0, 0, 0.2);
                            border-radius: 10px;
                        ">
                            <div class="text-danger fw-bold">{{ $dataPersil->total() }}</div>
                            <small class="text-light opacity-75">Total Land Plots</small>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    {{-- Table Section --}}
    <div class="card border-0 shadow-lg" style="
        background: rgba(255, 255, 255, 0.03);
        border-radius: 15px;
        border: 1px solid rgba(255, 0, 0, 0.1);
        backdrop-filter: blur(10px);
        overflow: hidden;
    ">
        <div class="card-header border-0" style="
            background: linear-gradient(90deg, rgba(255,0,0,0.1) 0%, rgba(255,0,0,0.05) 100%);
            border-bottom: 1px solid rgba(255, 0, 0, 0.1);
            padding: 20px;
        ">
            <div class="d-flex align-items-center justify-content-between">
                <h5 class="mb-0 text-light">
                    <i class="fas fa-list me-2 text-danger"></i>
                    Land Plot Records
                </h5>
                <span class="badge rounded-pill" style="
                    background: linear-gradient(135deg, #ff3333 0%, #cc0000 100%);
                    color: white;
                    padding: 8px 16px;
                    font-size: 0.85rem;
                ">
                    {{ $dataPersil->count() }} Records
                </span>
            </div>
        </div>

        <div class="card-body p-0">
            <div class="table-responsive" style="max-height: 600px; overflow-y: auto;">
                <table class="table table-hover mb-0">
                    <thead style="
                        background: rgba(0, 0, 0, 0.3);
                        position: sticky;
                        top: 0;
                        z-index: 10;
                    ">
                        <tr>
                            <th style="
                                padding: 15px 20px;
                                color: #ff6666;
                                font-weight: 600;
                                border-bottom: 2px solid rgba(255, 0, 0, 0.3);
                                white-space: nowrap;
                            ">
                                <i class="fas fa-hashtag me-2"></i>ID
                            </th>
                            <th style="
                                padding: 15px 20px;
                                color: #ff6666;
                                font-weight: 600;
                                border-bottom: 2px solid rgba(255, 0, 0, 0.3);
                                white-space: nowrap;
                            ">
                                <i class="fas fa-barcode me-2"></i>Kode
                            </th>
                            <th style="
                                padding: 15px 20px;
                                color: #ff6666;
                                font-weight: 600;
                                border-bottom: 2px solid rgba(255, 0, 0, 0.3);
                                white-space: nowrap;
                            ">
                                <i class="fas fa-user me-2"></i>Pemilik
                            </th>
                            <th style="
                                padding: 15px 20px;
                                color: #ff6666;
                                font-weight: 600;
                                border-bottom: 2px solid rgba(255, 0, 0, 0.3);
                                white-space: nowrap;
                            ">
                                <i class="fas fa-ruler-combined me-2"></i>Luas
                            </th>
                            <th style="
                                padding: 15px 20px;
                                color: #ff6666;
                                font-weight: 600;
                                border-bottom: 2px solid rgba(255, 0, 0, 0.3);
                                white-space: nowrap;
                            ">
                                <i class="fas fa-tag me-2"></i>Penggunaan
                            </th>
                            <th style="
                                padding: 15px 20px;
                                color: #ff6666;
                                font-weight: 600;
                                border-bottom: 2px solid rgba(255, 0, 0, 0.3);
                                white-space: nowrap;
                            ">
                                <i class="fas fa-map-marker-alt me-2"></i>Alamat
                            </th>
                            <th style="
                                padding: 15px 20px;
                                color: #ff6666;
                                font-weight: 600;
                                border-bottom: 2px solid rgba(255, 0, 0, 0.3);
                                white-space: nowrap;
                            ">
                                <i class="fas fa-map-pin me-2"></i>RT
                            </th>
                            <th style="
                                padding: 15px 20px;
                                color: #ff6666;
                                font-weight: 600;
                                border-bottom: 2px solid rgba(255, 0, 0, 0.3);
                                white-space: nowrap;
                            ">
                                <i class="fas fa-map-pin me-2"></i>RW
                            </th>
                            <th style="
                                padding: 15px 20px;
                                color: #ff6666;
                                font-weight: 600;
                                border-bottom: 2px solid rgba(255, 0, 0, 0.3);
                                white-space: nowrap;
                            ">
                                <i class="fas fa-circle me-2"></i>Status
                            </th>
                            <th style="
                                padding: 15px 20px;
                                color: #ff6666;
                                font-weight: 600;
                                border-bottom: 2px solid rgba(255, 0, 0, 0.3);
                                white-space: nowrap;
                            ">
                                <i class="fas fa-file-alt me-2"></i>Dokumen
                            </th>
                            <th style="
                                padding: 15px 20px;
                                color: #ff6666;
                                font-weight: 600;
                                border-bottom: 2px solid rgba(255, 0, 0, 0.3);
                                white-space: nowrap;
                            ">
                                <i class="fas fa-balance-scale me-2"></i>Sengketa
                            </th>
                            <th style="
                                padding: 15px 20px;
                                color: #ff6666;
                                font-weight: 600;
                                border-bottom: 2px solid rgba(255, 0, 0, 0.3);
                                white-space: nowrap;
                            ">
                                <i class="fas fa-map me-2"></i>Peta
                            </th>
                            <th style="
                                padding: 15px 20px;
                                color: #ff6666;
                                font-weight: 600;
                                border-bottom: 2px solid rgba(255, 0, 0, 0.3);
                                white-space: nowrap;
                            ">
                                <i class="fas fa-cogs me-2"></i>Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($dataPersil as $item)
                        <tr style="
                            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
                            transition: all 0.3s ease;
                        ">
                            <td style="padding: 15px 20px; white-space: nowrap;">
                                <span class="badge rounded-pill" style="
                                    background: rgba(255, 0, 0, 0.15);
                                    color: #ff9999;
                                    padding: 5px 12px;
                                    font-size: 0.8rem;
                                    font-weight: 600;
                                ">
                                    #{{ $item->persil_id }}
                                </span>
                            </td>

                            <td style="padding: 15px 20px;">
                                <div class="text-light fw-semibold">{{ $item->kode_persil }}</div>
                            </td>

                            <td style="padding: 15px 20px;">
                                <div class="text-light">{{ optional($item->pemilik)->nama ?? $item->pemilik_warga_id }}</div>
                            </td>

                            <td style="padding: 15px 20px; white-space: nowrap;">
                                <div class="text-light fw-semibold">{{ number_format($item->luas_m2) }} m²</div>
                            </td>

                            <td style="padding: 15px 20px;">
                                <span class="badge rounded-pill" style="
                                    background: rgba(255, 255, 255, 0.1);
                                    color: #ddd;
                                    padding: 4px 10px;
                                    font-size: 0.8rem;
                                ">
                                    {{ $item->penggunaan }}
                                </span>
                            </td>

                            <td style="padding: 15px 20px; max-width: 200px;">
                                <div class="text-light" style="
                                    white-space: nowrap;
                                    overflow: hidden;
                                    text-overflow: ellipsis;
                                    max-width: 200px;
                                ">
                                    {{ $item->alamat_lahan }}
                                </div>
                            </td>

                            <td style="padding: 15px 20px;">
                                <div class="text-center">
                                    <span class="badge rounded-pill" style="
                                        background: rgba(255, 0, 0, 0.15);
                                        color: #ff9999;
                                        padding: 5px 10px;
                                        font-weight: 600;
                                    ">
                                        {{ $item->rt }}
                                    </span>
                                </div>
                            </td>

                            <td style="padding: 15px 20px;">
                                <div class="text-center">
                                    <span class="badge rounded-pill" style="
                                        background: rgba(255, 0, 0, 0.15);
                                        color: #ff9999;
                                        padding: 5px 10px;
                                        font-weight: 600;
                                    ">
                                        {{ $item->rw }}
                                    </span>
                                </div>
                            </td>

                            {{-- STATUS --}}
                            <td style="padding: 15px 20px;">
                                <form action="{{ route('Persil.updateStatus', $item->persil_id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    @php
                                        $status = strtolower($item->status ?? 'pending');
                                        $badgeConfig = [
                                            'diterima' => ['color' => '#28a745', 'bg' => 'rgba(40, 167, 69, 0.2)', 'icon' => 'fa-check-circle'],
                                            'pending' => ['color' => '#ffc107', 'bg' => 'rgba(255, 193, 7, 0.2)', 'icon' => 'fa-clock'],
                                            'ditolak' => ['color' => '#dc3545', 'bg' => 'rgba(220, 53, 69, 0.2)', 'icon' => 'fa-times-circle'],
                                        ];
                                        $config = $badgeConfig[$status] ?? $badgeConfig['pending'];
                                    @endphp

                                    <div class="dropdown dropup d-inline-block">
                                        <button class="btn btn-sm dropdown-toggle d-flex align-items-center gap-2"
                                                type="button"
                                                data-bs-toggle="dropdown"
                                                style="
                                                    background: {{ $config['bg'] }};
                                                    border: 1px solid {{ $config['color'] }};
                                                    color: {{ $config['color'] }};
                                                    border-radius: 20px;
                                                    padding: 5px 12px;
                                                    font-size: 0.8rem;
                                                    font-weight: 500;
                                                ">
                                            <i class="fas {{ $config['icon'] }}"></i>
                                            <span class="text-uppercase">{{ $status }}</span>
                                        </button>
                                        <ul class="dropdown-menu" style="
                                            background: rgba(26, 26, 26, 0.95);
                                            border: 1px solid rgba(255, 0, 0, 0.2);
                                            backdrop-filter: blur(10px);
                                            min-width: 120px;
                                        ">
                                            <li>
                                                <button class="dropdown-item text-success d-flex align-items-center gap-2"
                                                        name="status" value="diterima">
                                                    <i class="fas fa-check-circle"></i> Diterima
                                                </button>
                                            </li>
                                            <li>
                                                <button class="dropdown-item text-warning d-flex align-items-center gap-2"
                                                        name="status" value="pending">
                                                    <i class="fas fa-clock"></i> Pending
                                                </button>
                                            </li>
                                            <li>
                                                <button class="dropdown-item text-danger d-flex align-items-center gap-2"
                                                        name="status" value="ditolak">
                                                    <i class="fas fa-times-circle"></i> Ditolak
                                                </button>
                                            </li>
                                        </ul>
                                    </div>
                                </form>
                            </td>

                            {{-- DOKUMEN --}}
                            <td style="padding: 15px 20px;">
                                @php
                                    $dokumen = $item->dokumenPersil ?? collect();
                                    $fileCount = $dokumen->flatMap(fn($d) => $d->media ?? collect())->count();
                                @endphp

                                <div class="d-flex flex-column align-items-center gap-2">
                                    @if ($fileCount > 0)
                                    <span class="badge rounded-pill" style="
                                        background: linear-gradient(135deg, #4dabf7 0%, #339af0 100%);
                                        color: white;
                                        padding: 4px 10px;
                                        font-size: 0.8rem;
                                    ">
                                        {{ $fileCount }} file
                                    </span>
                                    <a href="{{ route('dokpersil.index', $item->persil_id) }}"
                                       class="btn btn-sm d-flex align-items-center gap-1" style="
                                        background: rgba(13, 110, 253, 0.1);
                                        border: 1px solid rgba(13, 110, 253, 0.3);
                                        color: #6ea8fe;
                                        border-radius: 6px;
                                        padding: 4px 10px;
                                        font-size: 0.8rem;
                                    ">
                                        <i class="fas fa-eye"></i>
                                        Lihat
                                    </a>
                                    @else
                                    <span class="badge rounded-pill" style="
                                        background: rgba(108, 117, 125, 0.2);
                                        color: #adb5bd;
                                        padding: 4px 10px;
                                        font-size: 0.8rem;
                                    ">
                                        No files
                                    </span>
                                    <a href="{{ route('dokpersil.index', $item->persil_id) }}"
                                       class="btn btn-sm d-flex align-items-center gap-1" style="
                                        background: rgba(108, 117, 125, 0.1);
                                        border: 1px solid rgba(108, 117, 125, 0.3);
                                        color: #adb5bd;
                                        border-radius: 6px;
                                        padding: 4px 10px;
                                        font-size: 0.8rem;
                                    ">
                                        <i class="fas fa-plus"></i>
                                        Dokumen
                                    </a>
                                    @endif
                                </div>
                            </td>

                            {{-- SENGGETA --}}
                            <td style="padding: 15px 20px;">
                                @php
                                    $sengketa = $item->sengketa_persil ?? collect();
                                    $fileCount = $sengketa->sum(fn($s) => $s->media->count());
                                @endphp

                                <div class="d-flex flex-column align-items-center gap-2">
                                    @if ($fileCount > 0)
                                    <span class="badge rounded-pill" style="
                                        background: linear-gradient(135deg, #fd7e14 0%, #e8590c 100%);
                                        color: white;
                                        padding: 4px 10px;
                                        font-size: 0.8rem;
                                    ">
                                        {{ $fileCount }} file
                                    </span>
                                    <a href="{{ route('sengketa_persil.index', $item->persil_id) }}"
                                       class="btn btn-sm d-flex align-items-center gap-1" style="
                                        background: rgba(253, 126, 20, 0.1);
                                        border: 1px solid rgba(253, 126, 20, 0.3);
                                        color: #fd7e14;
                                        border-radius: 6px;
                                        padding: 4px 10px;
                                        font-size: 0.8rem;
                                    ">
                                        <i class="fas fa-eye"></i>
                                        Lihat
                                    </a>
                                    @else
                                    <span class="badge rounded-pill" style="
                                        background: rgba(108, 117, 125, 0.2);
                                        color: #adb5bd;
                                        padding: 4px 10px;
                                        font-size: 0.8rem;
                                    ">
                                        No files
                                    </span>
                                    <a href="{{ route('sengketa_persil.index', $item->persil_id) }}"
                                       class="btn btn-sm d-flex align-items-center gap-1" style="
                                        background: rgba(108, 117, 125, 0.1);
                                        border: 1px solid rgba(108, 117, 125, 0.3);
                                        color: #adb5bd;
                                        border-radius: 6px;
                                        padding: 4px 10px;
                                        font-size: 0.8rem;
                                    ">
                                        <i class="fas fa-plus"></i>
                                        Sengketa
                                    </a>
                                    @endif
                                </div>
                            </td>

                            {{-- PETA --}}
                            <td style="padding: 15px 20px;">
                                @php
                                    $peta = $item->peta ?? null;
                                    $fileCount = $peta ? $peta->media->count() : 0;
                                    $hasPeta = $peta != null;
                                @endphp

                                <div class="d-flex flex-column align-items-center gap-2">
                                    @if ($hasPeta)
                                    <span class="badge rounded-pill" style="
                                        background: linear-gradient(135deg, #20c997 0%, #099268 100%);
                                        color: white;
                                        padding: 4px 10px;
                                        font-size: 0.8rem;
                                    ">
                                        {{ $fileCount }} file
                                    </span>
                                    <div class="d-flex gap-1">
                                        <a href="{{ route('peta_persil.show', $peta->peta_id) }}"
                                           class="btn btn-sm d-flex align-items-center" style="
                                            background: rgba(32, 201, 151, 0.1);
                                            border: 1px solid rgba(32, 201, 151, 0.3);
                                            color: #20c997;
                                            border-radius: 6px;
                                            padding: 4px 8px;
                                            font-size: 0.8rem;
                                        ">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('peta_persil.edit', $peta->peta_id) }}"
                                           class="btn btn-sm d-flex align-items-center" style="
                                            background: rgba(255, 193, 7, 0.1);
                                            border: 1px solid rgba(255, 193, 7, 0.3);
                                            color: #ffc107;
                                            border-radius: 6px;
                                            padding: 4px 8px;
                                            font-size: 0.8rem;
                                        ">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                    </div>
                                    @else
                                    <span class="badge rounded-pill" style="
                                        background: rgba(108, 117, 125, 0.2);
                                        color: #adb5bd;
                                        padding: 4px 10px;
                                        font-size: 0.8rem;
                                    ">
                                        No data
                                    </span>
                                    <a href="{{ route('peta_persil.create', $item->persil_id) }}"
                                       class="btn btn-sm d-flex align-items-center gap-1" style="
                                        background: rgba(40, 167, 69, 0.1);
                                        border: 1px solid rgba(40, 167, 69, 0.3);
                                        color: #28a745;
                                        border-radius: 6px;
                                        padding: 4px 10px;
                                        font-size: 0.8rem;
                                    ">
                                        <i class="fas fa-plus"></i>
                                        Peta
                                    </a>
                                    @endif
                                </div>
                            </td>

                            {{-- ACTIONS --}}
                            <td style="padding: 15px 20px;">
                                <div class="d-flex flex-column gap-2">
                                    <a href="{{ route('persil.edit', $item->persil_id) }}"
                                       class="btn btn-sm d-flex align-items-center justify-content-center gap-1" style="
                                        background: rgba(13, 110, 253, 0.1);
                                        border: 1px solid rgba(13, 110, 253, 0.3);
                                        color: #6ea8fe;
                                        border-radius: 6px;
                                        padding: 6px 12px;
                                        font-size: 0.8rem;
                                    ">
                                        <i class="fas fa-edit"></i>
                                        Edit
                                    </a>
                                    <form action="{{ route('persil.destroy', $item->persil_id) }}"
                                          method="POST"
                                          style="display:inline"
                                          onsubmit="return confirm('Are you sure you want to delete this land plot?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="btn btn-sm d-flex align-items-center justify-content-center gap-1 w-100" style="
                                            background: rgba(220, 53, 69, 0.1);
                                            border: 1px solid rgba(220, 53, 69, 0.3);
                                            color: #e6a2a9;
                                            border-radius: 6px;
                                            padding: 6px 12px;
                                            font-size: 0.8rem;
                                        ">
                                            <i class="fas fa-trash-alt"></i>
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="13" class="text-center py-5">
                                <div class="text-light opacity-75">
                                    <i class="fas fa-map-marked-alt fa-2x mb-3" style="color: #ff6666;"></i>
                                    <h5 class="mb-2">No Land Plots Found</h5>
                                    <p class="mb-0">Start by adding your first land plot record.</p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card-footer border-0" style="
            background: rgba(0, 0, 0, 0.3);
            border-top: 1px solid rgba(255, 0, 0, 0.1);
            padding: 20px;
        ">
            <div class="d-flex justify-content-between align-items-center">
                <div class="text-light opacity-75" style="font-size: 0.9rem;">
                    Showing {{ $dataPersil->firstItem() }} to {{ $dataPersil->lastItem() }} of {{ $dataPersil->total() }} entries
                </div>
                <div>
                    {{ $dataPersil->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* Custom hover effects */
    .table-hover tbody tr:hover {
        background: rgba(255, 0, 0, 0.05) !important;
        transform: translateX(3px);
        box-shadow: 0 5px 15px rgba(255, 0, 0, 0.1);
    }

    /* Button hover effects */
    .btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(255, 0, 0, 0.2) !important;
    }

    /* Form control focus */
    .form-control:focus,
    .form-select:focus {
        background: rgba(255, 255, 255, 0.08) !important;
        border-color: rgba(255, 0, 0, 0.4) !important;
        box-shadow: 0 0 0 0.25rem rgba(255, 0, 0, 0.25) !important;
        color: #fff !important;
    }

    /* Pagination styling */
    .pagination .page-item .page-link {
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(255, 0, 0, 0.2);
        color: #ff6666;
        margin: 0 3px;
        border-radius: 8px;
    }

    .pagination .page-item.active .page-link {
        background: linear-gradient(135deg, #ff3333 0%, #cc0000 100%);
        border-color: rgba(255, 0, 0, 0.3);
        color: white;
    }

    .pagination .page-item .page-link:hover {
        background: rgba(255, 0, 0, 0.1);
        border-color: rgba(255, 0, 0, 0.4);
    }

    /* Smooth transitions */
    * {
        transition: background-color 0.3s ease,
                    border-color 0.3s ease,
                    box-shadow 0.3s ease,
                    transform 0.3s ease;
    }

    /* Scrollbar styling */
    ::-webkit-scrollbar {
        width: 8px;
        height: 8px;
    }

    ::-webkit-scrollbar-track {
        background: rgba(255, 255, 255, 0.05);
        border-radius: 10px;
    }

    ::-webkit-scrollbar-thumb {
        background: rgba(255, 0, 0, 0.3);
        border-radius: 10px;
    }

    ::-webkit-scrollbar-thumb:hover {
        background: rgba(255, 0, 0, 0.5);
    }
</style>
@endsection
