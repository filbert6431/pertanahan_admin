@extends('layouts.admin.app')

@section('content')
        {{-- Breadcrumb & Header --}}
        <div class="py-4 px-3">
            <div class="d-flex align-items-center mb-4">
                <div
                    style="
                width: 40px;
                height: 40px;
                background: linear-gradient(135deg, #ff0000 0%, #990000 100%);
                border-radius: 10px;
                display: flex;
                align-items: center;
                justify-content: center;
                margin-right: 15px;
                box-shadow: 0 4px 15px rgba(255, 0, 0, 0.2);
            ">
                    <i class="fas fa-users text-white" style="font-size: 1.2rem;"></i>
                </div>
                <div>
                    <h1 class="h3 mb-0"
                        style="
                    background: linear-gradient(135deg, #ff4d4d 0%, #ff0000 100%);
                    -webkit-background-clip: text;
                    -webkit-text-fill-color: transparent;
                    background-clip: text;
                    font-weight: 700;
                ">
                        Data User Management</h1>
                    <p class="mb-0 text-light opacity-75" style="font-size: 0.9rem;">
                        <i class="fas fa-database me-1"></i> Manage all registered users in the system
                    </p>
                </div>
            </div>

            <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0"
                        style="
                    background: rgba(255, 255, 255, 0.05);
                    border-radius: 10px;
                    padding: 10px 20px;
                    border: 1px solid rgba(255, 0, 0, 0.1);
                ">
                        <li class="breadcrumb-item">
                            <a href="{{ route('dashboard') }}" class="text-danger" style="text-decoration: none;">
                                <i class="fas fa-home me-1"></i> Dashboard
                            </a>
                        </li>
                        <li class="breadcrumb-item active text-light">
                            <i class="fas fa-user-friends me-1"></i> Users
                        </li>
                    </ol>
                </nav>

                <a href="{{ route('user.create') }}" class="btn btn-danger d-flex align-items-center gap-2"
                    style="
                background: linear-gradient(135deg, #ff3333 0%, #cc0000 100%);
                border: none;
                border-radius: 10px;
                padding: 10px 20px;
                font-weight: 600;
                box-shadow: 0 4px 15px rgba(255, 0, 0, 0.3);
                transition: all 0.3s ease;
            ">
                    <i class="fas fa-user-plus"></i>
                    <span>Add New User</span>
                </a>
            </div>
        </div>

        {{-- Session Alerts --}}
        <div class="px-3">
            @if (session('update'))
                <div class="alert alert-success alert-dismissible fade show mb-4" role="alert"
                    style="
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
                <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert"
                    style="
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
        </div>

        {{-- Filter & Search Section --}}
        <div class="px-3 mb-4">
            <div class="card border-0 shadow-lg"
                style="
            background: rgba(255, 255, 255, 0.03);
            border-radius: 15px;
            border: 1px solid rgba(255, 0, 0, 0.1);
            backdrop-filter: blur(10px);
        ">
                <div class="card-body p-4">
                    <form method="GET" action="{{ route('user.index') }}">
                        <div class="row g-3 align-items-end">
                            <div class="col-md-3">
                                <label class="form-label text-light mb-2" style="font-size: 0.85rem; font-weight: 500;">
                                    <i class="fas fa-filter me-1"></i> Filter by Status
                                </label>
                                <select name="status" class="form-select" onchange="this.form.submit()"
                                    style="
                                background: rgba(255, 255, 255, 0.05);
                                border: 1px solid rgba(255, 0, 0, 0.2);
                                color: #fff;
                                border-radius: 8px;
                                padding: 10px 15px;
                                transition: all 0.3s ease;
                            ">
                                    <option value="" style="background: #1a1a1a;">All Users</option>
                                    <option value="aktif" {{ request('status') == 'aktif' ? 'selected' : '' }}
                                        style="background: #1a1a1a; color: #75b798;">Active</option>
                                    <option value="nonaktif" {{ request('status') == 'nonaktif' ? 'selected' : '' }}
                                        style="background: #1a1a1a; color: #aaa;">Inactive</option>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label text-light mb-2" style="font-size: 0.85rem; font-weight: 500;">
                                    <i class="fas fa-search me-1"></i> Search Users
                                </label>
                                <div class="input-group">
                                    <input type="text" name="search" class="form-control"
                                        value="{{ request('search') }}" placeholder="Search by name or email..."
                                        style="
                                        background: rgba(255, 255, 255, 0.05);
                                        border: 1px solid rgba(255, 0, 0, 0.2);
                                        color: #fff;
                                        border-radius: 8px 0 0 8px;
                                        padding: 10px 15px;
                                        border-right: none;
                                       ">
                                    <button type="submit" class="btn btn-danger"
                                        style="
                                    border-radius: 0 8px 8px 0;
                                    border: 1px solid rgba(255, 0, 0, 0.3);
                                    background: linear-gradient(135deg, #ff3333 0%, #cc0000 100%);
                                    padding: 10px 20px;
                                ">
                                        <i class="fas fa-search"></i>
                                    </button>
                                    @if (request('search'))
                                        <a href="{{ request()->fullUrlWithQuery(['search' => null]) }}"
                                            class="btn btn-outline-danger ms-2"
                                            style="
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
                                <div class="stat-box p-3 rounded"
                                    style="
                                background: rgba(255, 0, 0, 0.1);
                                border: 1px solid rgba(255, 0, 0, 0.2);
                                border-radius: 10px;
                            ">
                                    <div class="text-danger fw-bold">{{ $dataUser->total() }}</div>
                                    <small class="text-light opacity-75">Total Users</small>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        {{-- Table Section --}}
        <div class="px-3">
            <div class="card border-0 shadow-lg"
                style="
            background: rgba(255, 255, 255, 0.03);
            border-radius: 15px;
            border: 1px solid rgba(255, 0, 0, 0.1);
            backdrop-filter: blur(10px);
            overflow: hidden;
        ">
                <div class="card-header border-0"
                    style="
                background: linear-gradient(90deg, rgba(255,0,0,0.1) 0%, rgba(255,0,0,0.05) 100%);
                border-bottom: 1px solid rgba(255, 0, 0, 0.1);
                padding: 20px 30px;
            ">
                    <div class="d-flex align-items-center justify-content-between">
                        <h5 class="mb-0 text-light">
                            <i class="fas fa-table me-2 text-danger"></i>
                            User List
                        </h5>
                        <span class="badge rounded-pill"
                            style="
                        background: linear-gradient(135deg, #ff3333 0%, #cc0000 100%);
                        color: white;
                        padding: 8px 16px;
                        font-size: 0.85rem;
                    ">
                            {{ $dataUser->count() }} Records
                        </span>
                    </div>
                </div>

                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead style="background: rgba(0, 0, 0, 0.3);">
                                <tr>
                                    <th
                                        style="
                                    padding: 20px 30px;
                                    color: #ff6666;
                                    font-weight: 600;
                                    border-bottom: 2px solid rgba(255, 0, 0, 0.3);
                                ">
                                        <i class="fas fa-user me-2"></i>User Profile
                                    </th>
                                    <th
                                        style="
                                    padding: 20px 30px;
                                    color: #ff6666;
                                    font-weight: 600;
                                    border-bottom: 2px solid rgba(255, 0, 0, 0.3);
                                ">
                                        <i class="fas fa-envelope me-2"></i>Email
                                    </th>
                                    <th class="text-center"
                                        style="
                                    padding: 20px 30px;
                                    color: #ff6666;
                                    font-weight: 600;
                                    border-bottom: 2px solid rgba(255, 0, 0, 0.3);
                                ">
                                        <i class="fas fa-circle me-2"></i>Status
                                    </th>
                                    <th class="text-center"
                                        style="
                                    padding: 20px 30px;
                                    color: #ff6666;
                                    font-weight: 600;
                                    border-bottom: 2px solid rgba(255, 0, 0, 0.3);
                                ">
                                        <i class="fas fa-user-tag me-2"></i>Role
                                    </th>
                                    <th class="text-center"
                                        style="
                                    padding: 20px 30px;
                                    color: #ff6666;
                                    font-weight: 600;
                                    border-bottom: 2px solid rgba(255, 0, 0, 0.3);
                                ">
                                        <i class="fas fa-cogs me-2"></i>Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dataUser as $item)
                                    <tr
                                        style="
                                border-bottom: 1px solid rgba(255, 255, 255, 0.05);
                                transition: all 0.3s ease;
                            ">
                                        <td style="padding: 20px 30px;">
                                            <div class="d-flex align-items-center gap-3">
                                                @if ($item->profile_picture)
                                                    <div class="avatar-wrapper"
                                                        style="
                                            width: 45px;
                                            height: 45px;
                                            border-radius: 50%;
                                            overflow: hidden;
                                            border: 2px solid rgba(255, 0, 0, 0.3);
                                            box-shadow: 0 4px 10px rgba(255, 0, 0, 0.2);
                                        ">
                                                        <img src="{{ asset('storage/' . $item->profile_picture) }}"
                                                            alt="{{ $item->name }}"
                                                            style="width: 100%; height: 100%; object-fit: cover;">
                                                    </div>
                                                @else
                                                    @php
                                                        $name = $item->name ?? 'A';
                                                        $initial = strtoupper(substr($name, 0, 1));
                                                        $colors = ['#ff3333', '#cc0000', '#990000', '#660000'];
                                                        $bgColor = $colors[crc32($name) % count($colors)];
                                                    @endphp
                                                    <div class="avatar-initial"
                                                        style="
                                            width: 45px;
                                            height: 45px;
                                            border-radius: 50%;
                                            background: linear-gradient(135deg, {{ $bgColor }} 0%, #{{ substr(md5($name), 0, 6) }} 100%);
                                            display: flex;
                                            align-items: center;
                                            justify-content: center;
                                            font-weight: 700;
                                            color: white;
                                            font-size: 1.2rem;
                                            border: 2px solid rgba(255, 255, 255, 0.1);
                                            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
                                        ">
                                                        {{ $initial }}
                                                    </div>
                                                @endif
                                                <div>
                                                    <div class="fw-semibold text-light" style="font-size: 1rem;">
                                                        {{ $item->name }}
                                                    </div>
                                                    <small class="text-light opacity-75" style="font-size: 0.8rem;">
                                                        ID: {{ $item->user_id }}
                                                    </small>
                                                </div>
                                            </div>
                                        </td>

                                        <td style="padding: 20px 30px;">
                                            <div class="text-light">{{ $item->email }}</div>
                                            <small class="text-light opacity-75" style="font-size: 0.8rem;">
                                                <i class="far fa-clock me-1"></i>
                                                @if ($item->created_at)
                                                    {{ $item->created_at->format('d M Y') }}
                                                @else
                                                    No date
                                                @endif
                                            </small>

                                        <td class="text-center" style="padding: 20px 30px;">
                                            <form action="{{ route('user.updateStatus', $item->user_id) }}"
                                                method="POST">
                                                @csrf
                                                @method('PUT')
                                                @php
                                                    $status = strtolower($item->status ?? 'pending');
                                                    $badgeConfig = [
                                                        'aktif' => [
                                                            'color' => '#28a745',
                                                            'bg' => 'rgba(40, 167, 69, 0.2)',
                                                            'icon' => 'fa-check-circle',
                                                        ],
                                                        'nonaktif' => [
                                                            'color' => '#6c757d',
                                                            'bg' => 'rgba(108, 117, 125, 0.2)',
                                                            'icon' => 'fa-times-circle',
                                                        ],
                                                        'pending' => [
                                                            'color' => '#ffc107',
                                                            'bg' => 'rgba(255, 193, 7, 0.2)',
                                                            'icon' => 'fa-clock',
                                                        ],
                                                        'banned' => [
                                                            'color' => '#dc3545',
                                                            'bg' => 'rgba(220, 53, 69, 0.2)',
                                                            'icon' => 'fa-ban',
                                                        ],
                                                    ];
                                                    $config = $badgeConfig[$status] ?? $badgeConfig['pending'];
                                                @endphp

                                                <div class="dropdown d-inline-block">
                                                    <button
                                                        class="btn btn-sm dropdown-toggle d-flex align-items-center gap-2"
                                                        type="button" data-bs-toggle="dropdown"
                                                        style="
                                                        background: {{ $config['bg'] }};
                                                        border: 1px solid {{ $config['color'] }};
                                                        color: {{ $config['color'] }};
                                                        border-radius: 20px;
                                                        padding: 6px 15px;
                                                        font-size: 0.85rem;
                                                        font-weight: 500;
                                                        transition: all 0.3s ease;
                                                    ">
                                                        <i class="fas {{ $config['icon'] }}"></i>
                                                        <span class="text-uppercase">{{ $status }}</span>
                                                    </button>
                                                    <ul class="dropdown-menu"
                                                        style="
                                                background: rgba(26, 26, 26, 0.95);
                                                border: 1px solid rgba(255, 0, 0, 0.2);
                                                backdrop-filter: blur(10px);
                                            ">
                                                        <li>
                                                            <button
                                                                class="dropdown-item text-success d-flex align-items-center gap-2"
                                                                name="status" value="aktif">
                                                                <i class="fas fa-check-circle"></i> Active
                                                            </button>
                                                        </li>
                                                        <li>
                                                            <button
                                                                class="dropdown-item text-secondary d-flex align-items-center gap-2"
                                                                name="status" value="nonaktif">
                                                                <i class="fas fa-times-circle"></i> Inactive
                                                            </button>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </form>
                                        </td>

                                        <td class="text-center" style="padding: 20px 30px;">
                                            <span class="badge rounded-pill"
                                                style="
                                        background: rgba(255, 0, 0, 0.15);
                                        color: #ff9999;
                                        padding: 6px 15px;
                                        font-size: 0.85rem;
                                        font-weight: 500;
                                        border: 1px solid rgba(255, 0, 0, 0.2);
                                    ">
                                                <i class="fas fa-user-tag me-1"></i>
                                                {{ ucfirst($item->role) }}
                                            </span>
                                        </td>

                                        <td class="text-center" style="padding: 20px 30px;">
                                            <div class="d-flex justify-content-center gap-2">
                                                <a href="{{ route('user.edit', $item->user_id) }}"
                                                    class="btn btn-sm d-flex align-items-center gap-2"
                                                    style="
                                            background: rgba(13, 110, 253, 0.15);
                                            border: 1px solid rgba(13, 110, 253, 0.3);
                                            color: #6ea8fe;
                                            border-radius: 8px;
                                            padding: 8px 16px;
                                            transition: all 0.3s ease;
                                        ">
                                                    <i class="fas fa-edit"></i>
                                                    <span>Edit</span>
                                                </a>

                                                <form action="{{ route('user.destroy', $item->user_id) }}" method="POST"
                                                    style="display:inline"
                                                    onsubmit="return confirm('Are you sure you want to delete this user?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="btn btn-sm d-flex align-items-center gap-2"
                                                        style="
                                                background: rgba(220, 53, 69, 0.15);
                                                border: 1px solid rgba(220, 53, 69, 0.3);
                                                color: #e6a2a9;
                                                border-radius: 8px;
                                                padding: 8px 16px;
                                                transition: all 0.3s ease;
                                            ">
                                                        <i class="fas fa-trash-alt"></i>
                                                        <span>Delete</span>
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

                <div class="card-footer border-0"
                    style="
                background: rgba(0, 0, 0, 0.3);
                border-top: 1px solid rgba(255, 0, 0, 0.1);
                padding: 20px 30px;
            ">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="text-light opacity-75" style="font-size: 0.9rem;">
                            Showing {{ $dataUser->firstItem() }} to {{ $dataUser->lastItem() }} of
                            {{ $dataUser->total() }} entries
                        </div>
                        <div>
                            {{ $dataUser->links('pagination::bootstrap-5') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>

    <style>
        /* Custom hover effects */
        .table-hover tbody tr:hover {
            background: rgba(255, 0, 0, 0.05) !important;
            transform: translateX(5px);
            box-shadow: 0 5px 15px rgba(255, 0, 0, 0.1);
        }

        /* Button hover effects */
        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(255, 0, 0, 0.2) !important;
        }

        /* Form control focus */
        .form-control:focus {
            background: rgba(255, 255, 255, 0.08) !important;
            border-color: rgba(255, 0, 0, 0.4) !important;
            box-shadow: 0 0 0 0.25rem rgba(255, 0, 0, 0.25) !important;
            color: #fff !important;
        }

        /* Select dropdown styling */
        .form-select option {
            background: #1a1a1a;
            color: #fff;
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
