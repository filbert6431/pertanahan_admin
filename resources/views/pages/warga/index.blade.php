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
            <i class="fas fa-users text-white" style="font-size: 1.3rem;"></i>
        </div>
        <div class="flex-grow-1">
            <h1 class="h3 mb-1" style="
                background: linear-gradient(135deg, #ff4d4d 0%, #ff0000 100%);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
                background-clip: text;
                font-weight: 700;
            ">
                Warga Management
            </h1>
            <p class="mb-0 text-light opacity-75">
                <i class="fas fa-user-friends me-1"></i> Manage resident data and information
            </p>
        </div>
        <a href="{{ route('warga.create') }}" class="btn btn-danger d-flex align-items-center gap-2" style="
            background: linear-gradient(135deg, #ff3333 0%, #cc0000 100%);
            border: none;
            border-radius: 10px;
            padding: 10px 20px;
            font-weight: 600;
            box-shadow: 0 4px 15px rgba(255, 0, 0, 0.3);
        ">
            <i class="fas fa-user-plus"></i>
            <span>Add New Resident</span>
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
                <i class="fas fa-users me-1"></i> Residents
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
            <form method="GET" action="{{ route('warga.index') }}">
                <div class="row g-3 align-items-end">
                    <div class="col-md-3">
                        <label class="form-label text-light mb-2" style="font-size: 0.85rem; font-weight: 500;">
                            <i class="fas fa-filter me-1"></i> Filter by Status
                        </label>
                        <select name="status" class="form-select" onchange="this.form.submit()" style="
                            background: rgba(255, 255, 255, 0.05);
                            border: 1px solid rgba(255, 0, 0, 0.2);
                            color: #fff;
                            border-radius: 8px;
                            padding: 10px 15px;
                        ">
                            <option value="" style="background: #1a1a1a;">All Residents</option>
                            <option value="aktif" {{ request('status') == 'aktif' ? 'selected' : '' }}
                                style="background: #1a1a1a; color: #75b798;">
                                Active
                            </option>
                            <option value="nonaktif" {{ request('status') == 'nonaktif' ? 'selected' : '' }}
                                style="background: #1a1a1a; color: #aaa;">
                                Inactive
                            </option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label text-light mb-2" style="font-size: 0.85rem; font-weight: 500;">
                            <i class="fas fa-search me-1"></i> Search Residents
                        </label>
                        <div class="input-group">
                            <input type="text" name="search" class="form-control"
                                   value="{{ request('search') }}" placeholder="Search by name, ID card, or phone number..."
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
                            <div class="text-danger fw-bold">{{ $dataWarga->total() }}</div>
                            <small class="text-light opacity-75">Total Residents</small>
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
                    Resident Records
                </h5>
                <span class="badge rounded-pill" style="
                    background: linear-gradient(135deg, #ff3333 0%, #cc0000 100%);
                    color: white;
                    padding: 8px 16px;
                    font-size: 0.85rem;
                ">
                    {{ $dataWarga->count() }} Records
                </span>
            </div>
        </div>

        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead style="background: rgba(0, 0, 0, 0.3);">
                        <tr>
                            <th style="
                                padding: 15px 20px;
                                color: #ff6666;
                                font-weight: 600;
                                border-bottom: 2px solid rgba(255, 0, 0, 0.3);
                            ">
                                <i class="fas fa-id-card me-2"></i>ID Card
                            </th>
                            <th style="
                                padding: 15px 20px;
                                color: #ff6666;
                                font-weight: 600;
                                border-bottom: 2px solid rgba(255, 0, 0, 0.3);
                            ">
                                <i class="fas fa-user me-2"></i>Name
                            </th>
                            <th style="
                                padding: 15px 20px;
                                color: #ff6666;
                                font-weight: 600;
                                border-bottom: 2px solid rgba(255, 0, 0, 0.3);
                            ">
                                <i class="fas fa-venus-mars me-2"></i>Gender
                            </th>
                            <th style="
                                padding: 15px 20px;
                                color: #ff6666;
                                font-weight: 600;
                                border-bottom: 2px solid rgba(255, 0, 0, 0.3);
                            ">
                                <i class="fas fa-pray me-2"></i>Religion
                            </th>
                            <th style="
                                padding: 15px 20px;
                                color: #ff6666;
                                font-weight: 600;
                                border-bottom: 2px solid rgba(255, 0, 0, 0.3);
                            ">
                                <i class="fas fa-briefcase me-2"></i>Occupation
                            </th>
                            <th style="
                                padding: 15px 20px;
                                color: #ff6666;
                                font-weight: 600;
                                border-bottom: 2px solid rgba(255, 0, 0, 0.3);
                            ">
                                <i class="fas fa-phone me-2"></i>Phone
                            </th>
                            <th style="
                                padding: 15px 20px;
                                color: #ff6666;
                                font-weight: 600;
                                border-bottom: 2px solid rgba(255, 0, 0, 0.3);
                            ">
                                <i class="fas fa-envelope me-2"></i>Email
                            </th>
                            <th style="
                                padding: 15px 20px;
                                color: #ff6666;
                                font-weight: 600;
                                border-bottom: 2px solid rgba(255, 0, 0, 0.3);
                            ">
                                <i class="fas fa-circle me-2"></i>Status
                            </th>
                            <th style="
                                padding: 15px 20px;
                                color: #ff6666;
                                font-weight: 600;
                                border-bottom: 2px solid rgba(255, 0, 0, 0.3);
                            ">
                                <i class="fas fa-cogs me-2"></i>Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataWarga as $item)
                        <tr style="
                            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
                            transition: all 0.3s ease;
                        ">
                            <td style="padding: 15px 20px;">
                                <div class="text-light fw-semibold">{{ $item->no_ktp }}</div>
                            </td>

                            <td style="padding: 15px 20px;">
                                <div class="text-light fw-semibold">{{ $item->nama }}</div>
                            </td>

                            <td style="padding: 15px 20px;">
                                <span class="badge rounded-pill" style="
                                    background: {{ $item->jenis_kelamin == 'Laki-laki' ? 'rgba(13, 110, 253, 0.15)' : 'rgba(220, 53, 69, 0.15)' }};
                                    color: {{ $item->jenis_kelamin == 'Laki-laki' ? '#6ea8fe' : '#e6a2a9' }};
                                    padding: 4px 10px;
                                    font-size: 0.8rem;
                                ">
                                    {{ $item->jenis_kelamin }}
                                </span>
                            </td>

                            <td style="padding: 15px 20px;">
                                <span class="badge rounded-pill" style="
                                    background: rgba(255, 255, 255, 0.1);
                                    color: #ddd;
                                    padding: 4px 10px;
                                    font-size: 0.8rem;
                                ">
                                    {{ $item->agama }}
                                </span>
                            </td>

                            <td style="padding: 15px 20px;">
                                <div class="text-light" style="
                                    white-space: nowrap;
                                    overflow: hidden;
                                    text-overflow: ellipsis;
                                    max-width: 150px;
                                ">
                                    {{ $item->pekerjaan }}
                                </div>
                            </td>

                            <td style="padding: 15px 20px;">
                                <div class="text-light">{{ $item->no_hp }}</div>
                            </td>

                            <td style="padding: 15px 20px;">
                                <div class="text-light">{{ $item->email }}</div>
                            </td>

                            {{-- STATUS --}}
                            <td style="padding: 15px 20px;">
                                <form action="{{ route('warga.updateStatus', $item->warga_id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    @php
                                        $status = strtolower($item->status ?? 'pending');
                                        $badgeConfig = [
                                            'aktif' => ['color' => '#28a745', 'bg' => 'rgba(40, 167, 69, 0.2)', 'icon' => 'fa-check-circle'],
                                            'nonaktif' => ['color' => '#6c757d', 'bg' => 'rgba(108, 117, 125, 0.2)', 'icon' => 'fa-times-circle'],
                                            'pending' => ['color' => '#ffc107', 'bg' => 'rgba(255, 193, 7, 0.2)', 'icon' => 'fa-clock'],
                                            'banned' => ['color' => '#dc3545', 'bg' => 'rgba(220, 53, 69, 0.2)', 'icon' => 'fa-ban'],
                                        ];
                                        $config = $badgeConfig[$status] ?? $badgeConfig['pending'];
                                    @endphp

                                    <div class="dropdown d-inline-block">
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
                                                        name="status" value="aktif">
                                                    <i class="fas fa-check-circle"></i> Active
                                                </button>
                                            </li>
                                            <li>
                                                <button class="dropdown-item text-secondary d-flex align-items-center gap-2"
                                                        name="status" value="nonaktif">
                                                    <i class="fas fa-times-circle"></i> Inactive
                                                </button>
                                            </li>
                                        </ul>
                                    </div>
                                </form>
                            </td>

                            {{-- ACTIONS --}}
                            <td style="padding: 15px 20px;">
                                <div class="d-flex gap-2">
                                    <a href="{{ route('warga.edit', $item->warga_id) }}"
                                       class="btn btn-sm d-flex align-items-center gap-1" style="
                                        background: rgba(13, 110, 253, 0.1);
                                        border: 1px solid rgba(13, 110, 253, 0.3);
                                        color: #6ea8fe;
                                        border-radius: 6px;
                                        padding: 6px 12px;
                                        font-size: 0.85rem;
                                    ">
                                        <i class="fas fa-edit"></i>
                                        Edit
                                    </a>

                                    <form action="{{ route('warga.destroy', $item->warga_id) }}"
                                          method="POST"
                                          style="display:inline"
                                          onsubmit="return confirm('Are you sure you want to delete this resident?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="btn btn-sm d-flex align-items-center gap-1" style="
                                            background: rgba(220, 53, 69, 0.1);
                                            border: 1px solid rgba(220, 53, 69, 0.3);
                                            color: #e6a2a9;
                                            border-radius: 6px;
                                            padding: 6px 12px;
                                            font-size: 0.85rem;
                                        ">
                                            <i class="fas fa-trash-alt"></i>
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
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
                    Showing {{ $dataWarga->firstItem() }} to {{ $dataWarga->lastItem() }} of {{ $dataWarga->total() }} entries
                </div>
                <div>
                    {{ $dataWarga->links('pagination::bootstrap-5') }}
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
