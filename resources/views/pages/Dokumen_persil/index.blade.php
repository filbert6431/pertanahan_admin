@extends('layouts.admin.app')

@section('content')
<div class="container-fluid px-4">
    {{-- Header Section --}}
    <div class="d-flex align-items-center py-4 mb-4">
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
            <i class="fas fa-file-alt text-white" style="font-size: 1.3rem;"></i>
        </div>
        <div class="flex-grow-1">
            <h1 class="h3 mb-1" style="
                background: linear-gradient(135deg, #ff4d4d 0%, #ff0000 100%);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
                background-clip: text;
                font-weight: 700;
            ">
                Dokumen Persil
            </h1>
            <div class="d-flex align-items-center gap-2 flex-wrap">
                <p class="mb-0 text-light opacity-75">
                    <i class="fas fa-map-marked-alt me-1"></i> Document management for Land Plot
                </p>
                <span class="badge rounded-pill" style="
                    background: rgba(255, 0, 0, 0.15);
                    color: #ff9999;
                    padding: 4px 12px;
                    font-size: 0.8rem;
                ">
                    <i class="fas fa-hashtag me-1"></i> ID: {{ $persil_id }}
                </span>
            </div>
        </div>
        <a href="{{ route('dokpersil.create', $persil_id) }}" class="btn btn-danger d-flex align-items-center gap-2" style="
            background: linear-gradient(135deg, #ff3333 0%, #cc0000 100%);
            border: none;
            border-radius: 10px;
            padding: 10px 20px;
            font-weight: 600;
            box-shadow: 0 4px 15px rgba(255, 0, 0, 0.3);
        ">
            <i class="fas fa-plus-circle"></i>
            <span>Add Document</span>
        </a>
    </div>

    {{-- Navigation --}}
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
            <li class="breadcrumb-item">
                <a href="{{ route('persil.index') }}" class="text-danger text-decoration-none">
                    <i class="fas fa-map me-1"></i> Land Plots
                </a>
            </li>
            <li class="breadcrumb-item active text-light">
                <i class="fas fa-file-alt me-1"></i> Documents
            </li>
        </ol>
    </nav>

    {{-- Info Card --}}
    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card border-0 shadow-sm" style="
                background: rgba(255, 0, 0, 0.05);
                border: 1px solid rgba(255, 0, 0, 0.1);
                border-radius: 12px;
            ">
                <div class="card-body text-center p-4">
                    <div class="text-danger mb-2">
                        <i class="fas fa-file-alt fa-2x"></i>
                    </div>
                    <h3 class="text-light mb-1">{{ $dokumen->count() }}</h3>
                    <p class="mb-0 text-light opacity-75">Total Documents</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-0 shadow-sm" style="
                background: rgba(13, 110, 253, 0.05);
                border: 1px solid rgba(13, 110, 253, 0.1);
                border-radius: 12px;
            ">
                <div class="card-body text-center p-4">
                    <div class="text-primary mb-2">
                        <i class="fas fa-paperclip fa-2x"></i>
                    </div>
                    @php
                        $totalFiles = 0;
                        foreach ($dokumen as $doc) {
                            $files = \App\Models\media::where('ref_table', 'dokumen_persil')
                                ->where('ref_id', $doc->dokumen_id)
                                ->count();
                            $totalFiles += $files;
                        }
                    @endphp
                    <h3 class="text-light mb-1">{{ $totalFiles }}</h3>
                    <p class="mb-0 text-light opacity-75">Attached Files</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-0 shadow-sm" style="
                background: rgba(32, 201, 151, 0.05);
                border: 1px solid rgba(32, 201, 151, 0.1);
                border-radius: 12px;
            ">
                <div class="card-body text-center p-4">
                    <div class="text-success mb-2">
                        <i class="fas fa-layer-group fa-2x"></i>
                    </div>
                    @php
                        $uniqueTypes = $dokumen->pluck('jenis_dokumen')->unique()->count();
                    @endphp
                    <h3 class="text-light mb-1">{{ $uniqueTypes }}</h3>
                    <p class="mb-0 text-light opacity-75">Document Types</p>
                </div>
            </div>
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
                    Document List
                </h5>
                <span class="badge rounded-pill" style="
                    background: linear-gradient(135deg, #ff3333 0%, #cc0000 100%);
                    color: white;
                    padding: 8px 16px;
                    font-size: 0.85rem;
                ">
                    {{ $dokumen->count() }} Documents
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
                                <i class="fas fa-file-signature me-2"></i>Document Type
                            </th>
                            <th style="
                                padding: 15px 20px;
                                color: #ff6666;
                                font-weight: 600;
                                border-bottom: 2px solid rgba(255, 0, 0, 0.3);
                            ">
                                <i class="fas fa-hashtag me-2"></i>Number
                            </th>
                            <th style="
                                padding: 15px 20px;
                                color: #ff6666;
                                font-weight: 600;
                                border-bottom: 2px solid rgba(255, 0, 0, 0.3);
                            ">
                                <i class="fas fa-info-circle me-2"></i>Description
                            </th>
                            <th style="
                                padding: 15px 20px;
                                color: #ff6666;
                                font-weight: 600;
                                border-bottom: 2px solid rgba(255, 0, 0, 0.3);
                                text-align: center;
                            ">
                                <i class="fas fa-paperclip me-2"></i>Files
                            </th>
                            <th style="
                                padding: 15px 20px;
                                color: #ff6666;
                                font-weight: 600;
                                border-bottom: 2px solid rgba(255, 0, 0, 0.3);
                                text-align: center;
                            ">
                                <i class="fas fa-cogs me-2"></i>Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($dokumen as $doc)
                            @php
                                $files = \App\Models\media::where('ref_table', 'dokumen_persil')
                                    ->where('ref_id', $doc->dokumen_id)
                                    ->get();
                                $fileCount = $files->count();
                                $docTypes = [
                                    'sertifikat' => ['color' => '#28a745', 'icon' => 'fa-certificate'],
                                    'surat_ukur' => ['color' => '#17a2b8', 'icon' => 'fa-ruler-combined'],
                                    'imb' => ['color' => '#6f42c1', 'icon' => 'fa-building'],
                                    'pbb' => ['color' => '#fd7e14', 'icon' => 'fa-file-invoice-dollar'],
                                    'lainnya' => ['color' => '#6c757d', 'icon' => 'fa-file'],
                                ];
                                $docConfig = $docTypes[strtolower($doc->jenis_dokumen)] ?? $docTypes['lainnya'];
                            @endphp

                            <tr style="
                                border-bottom: 1px solid rgba(255, 255, 255, 0.05);
                                transition: all 0.3s ease;
                            ">
                                <td style="padding: 15px 20px;">
                                    <div class="d-flex align-items-center gap-2">
                                        <div style="
                                            width: 36px;
                                            height: 36px;
                                            background: {{ $docConfig['color'] }}20;
                                            border: 1px solid {{ $docConfig['color'] }}40;
                                            border-radius: 8px;
                                            display: flex;
                                            align-items: center;
                                            justify-content: center;
                                        ">
                                            <i class="fas {{ $docConfig['icon'] }}" style="color: {{ $docConfig['color'] }};"></i>
                                        </div>
                                        <div>
                                            <div class="text-light fw-semibold">{{ $doc->jenis_dokumen }}</div>
                                            <small class="text-light opacity-75" style="font-size: 0.8rem;">
                                                ID: {{ $doc->dokumen_id }}
                                            </small>
                                        </div>
                                    </div>
                                </td>

                                <td style="padding: 15px 20px;">
                                    <div class="text-light">
                                        {{ $doc->nomor ?? '<span class="text-muted">-</span>' }}
                                    </div>
                                </td>

                                <td style="padding: 15px 20px; max-width: 250px;">
                                    <div class="text-light" style="
                                        display: -webkit-box;
                                        -webkit-line-clamp: 2;
                                        -webkit-box-orient: vertical;
                                        overflow: hidden;
                                        text-overflow: ellipsis;
                                    ">
                                        {{ $doc->keterangan ?? 'No description' }}
                                    </div>
                                </td>

                                <td style="padding: 15px 20px;">
                                    <div class="d-flex flex-column align-items-center gap-2">
                                        @if ($fileCount > 0)
                                        <span class="badge rounded-pill d-flex align-items-center gap-1" style="
                                            background: linear-gradient(135deg, #4dabf7 0%, #339af0 100%);
                                            color: white;
                                            padding: 5px 12px;
                                            font-size: 0.8rem;
                                        ">
                                            <i class="fas fa-paperclip"></i>
                                            {{ $fileCount }} file{{ $fileCount > 1 ? 's' : '' }}
                                        </span>
                                        <a href="{{ route('dokpersil.show', $doc->dokumen_id) }}"
                                           class="btn btn-sm d-flex align-items-center gap-1" style="
                                            background: rgba(13, 110, 253, 0.1);
                                            border: 1px solid rgba(13, 110, 253, 0.3);
                                            color: #6ea8fe;
                                            border-radius: 6px;
                                            padding: 4px 12px;
                                            font-size: 0.8rem;
                                        ">
                                            <i class="fas fa-eye"></i>
                                            View Files
                                        </a>
                                        @else
                                        <span class="badge rounded-pill d-flex align-items-center gap-1" style="
                                            background: rgba(108, 117, 125, 0.2);
                                            color: #adb5bd;
                                            padding: 5px 12px;
                                            font-size: 0.8rem;
                                        ">
                                            <i class="fas fa-times-circle"></i>
                                            No files
                                        </span>
                                        <button class="btn btn-sm d-flex align-items-center gap-1" style="
                                            background: rgba(108, 117, 125, 0.1);
                                            border: 1px solid rgba(108, 117, 125, 0.3);
                                            color: #adb5bd;
                                            border-radius: 6px;
                                            padding: 4px 12px;
                                            font-size: 0.8rem;
                                            cursor: not-allowed;
                                        " disabled>
                                            <i class="fas fa-eye"></i>
                                            No Files
                                        </button>
                                        @endif
                                    </div>
                                </td>

                                <td style="padding: 15px 20px;">
                                    <div class="d-flex justify-content-center">
                                        <form action="{{ route('dokumen_persil.destroy', $doc->dokumen_id) }}"
                                              method="POST"
                                              onsubmit="return confirm('Are you sure you want to delete this document?');">
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
                        @empty
                        <tr>
                            <td colspan="5" class="text-center py-5">
                                <div class="text-light opacity-75">
                                    <i class="fas fa-file-alt fa-3x mb-3" style="color: #ff6666;"></i>
                                    <h5 class="mb-2">No Documents Found</h5>
                                    <p class="mb-3">Start by adding your first document for this land plot.</p>
                                    <a href="{{ route('dokpersil.create', $persil_id) }}"
                                       class="btn btn-danger d-inline-flex align-items-center gap-2" style="
                                        background: linear-gradient(135deg, #ff3333 0%, #cc0000 100%);
                                        border: none;
                                        border-radius: 8px;
                                        padding: 8px 16px;
                                        font-size: 0.9rem;
                                    ">
                                        <i class="fas fa-plus"></i>
                                        Add First Document
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        @if($dokumen->count() > 0)
        <div class="card-footer border-0" style="
            background: rgba(0, 0, 0, 0.3);
            border-top: 1px solid rgba(255, 0, 0, 0.1);
            padding: 15px 20px;
        ">
            <div class="text-light opacity-75" style="font-size: 0.9rem;">
                Showing {{ $dokumen->count() }} document{{ $dokumen->count() > 1 ? 's' : '' }}
            </div>
        </div>
        @endif
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

    /* Card hover effects */
    .card:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 25px rgba(255, 0, 0, 0.1) !important;
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
