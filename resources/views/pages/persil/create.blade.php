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
            <i class="fas fa-map-marked-alt text-white" style="font-size: 1.3rem;"></i>
        </div>
        <div class="flex-grow-1">
            <h1 class="h3 mb-1" style="
                background: linear-gradient(135deg, #ff4d4d 0%, #ff0000 100%);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
                background-clip: text;
                font-weight: 700;
            ">
                Create New Land Plot
            </h1>
            <p class="mb-0 text-light opacity-75">
                <i class="fas fa-plus-circle me-1"></i> Add a new land plot record to the system
            </p>
        </div>
        <a href="{{ route('persil.index') }}" class="btn btn-outline-danger d-flex align-items-center gap-2" style="
            border: 1px solid rgba(255, 0, 0, 0.3);
            color: #ff6666;
            border-radius: 10px;
            padding: 10px 20px;
            font-weight: 500;
        ">
            <i class="fas fa-arrow-left"></i>
            <span>Back to Land Plots</span>
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
            <li class="breadcrumb-item">
                <a href="{{ route('persil.index') }}" class="text-danger text-decoration-none">
                    <i class="fas fa-map me-1"></i> Land Plots
                </a>
            </li>
            <li class="breadcrumb-item active text-light">
                <i class="fas fa-plus me-1"></i> Create Land Plot
            </li>
        </ol>
    </nav>

    <div class="row justify-content-center">
        <div class="col-xl-10 col-lg-12">
            {{-- Form Card --}}
            <div class="card border-0 shadow-lg" style="
                background: rgba(255, 255, 255, 0.03);
                border-radius: 20px;
                border: 1px solid rgba(255, 0, 0, 0.1);
                backdrop-filter: blur(10px);
                overflow: hidden;
            ">
                <div class="card-header border-0" style="
                    background: linear-gradient(90deg, rgba(255,0,0,0.1) 0%, rgba(255,0,0,0.05) 100%);
                    border-bottom: 1px solid rgba(255, 0, 0, 0.1);
                    padding: 25px 30px;
                    border-radius: 20px 20px 0 0;
                ">
                    <div class="d-flex align-items-center">
                        <div style="
                            width: 45px;
                            height: 45px;
                            background: rgba(255, 0, 0, 0.15);
                            border-radius: 10px;
                            display: flex;
                            align-items: center;
                            justify-content: center;
                            margin-right: 15px;
                        ">
                            <i class="fas fa-plus-circle text-danger"></i>
                        </div>
                        <div>
                            <h4 class="mb-1 text-light">Land Plot Information</h4>
                            <small class="text-light opacity-75">Fill in all required fields to add a new land plot</small>
                        </div>
                    </div>
                </div>

                <div class="card-body p-4 p-md-5">
                    {{-- Error Messages --}}
                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert" style="
                            background: rgba(220, 53, 69, 0.15);
                            border: 1px solid rgba(220, 53, 69, 0.3);
                            color: #e6a2a9;
                            border-radius: 10px;
                            backdrop-filter: blur(10px);
                        ">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-exclamation-triangle me-2" style="color: #dc3545; font-size: 1.2rem;"></i>
                                <div class="flex-grow-1">
                                    <strong class="text-danger">Validation Error!</strong>
                                    <ul class="mb-0 mt-2" style="font-size: 0.9rem;">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        </div>
                    @endif

                    <form action="{{ route('persil.store') }}" method="POST">
                        @csrf

                        <div class="row g-4">
                            {{-- Kode Persil --}}
                            <div class="col-md-6">
                                <label class="form-label text-light mb-2 d-flex align-items-center gap-2" style="font-weight: 500;">
                                    <i class="fas fa-barcode"></i> Land Plot Code
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text" style="
                                        background: rgba(255, 255, 255, 0.05);
                                        border: 1px solid rgba(255, 0, 0, 0.2);
                                        border-right: none;
                                        color: #ff6666;
                                        border-radius: 8px 0 0 8px;
                                    ">
                                        <i class="fas fa-hashtag"></i>
                                    </span>
                                    <input type="text"
                                           class="form-control"
                                           id="kode_persil"
                                           name="kode_persil"
                                           placeholder="Enter unique land plot code"
                                           style="
                                            background: rgba(255, 255, 255, 0.05);
                                            border: 1px solid rgba(255, 0, 0, 0.2);
                                            color: #fff;
                                            border-radius: 0 8px 8px 0;
                                            border-left: none;
                                            height: 50px;
                                           "
                                           required>
                                </div>
                                <small class="text-light opacity-75 mt-2 d-block" style="font-size: 0.8rem;">
                                    <i class="fas fa-info-circle me-1"></i> Unique identifier for this land plot
                                </small>
                            </div>

                            {{-- Pemilik --}}
                            <div class="col-md-6">
                                <label class="form-label text-light mb-2 d-flex align-items-center gap-2" style="font-weight: 500;">
                                    <i class="fas fa-user"></i> Owner
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text" style="
                                        background: rgba(255, 255, 255, 0.05);
                                        border: 1px solid rgba(255, 0, 0, 0.2);
                                        border-right: none;
                                        color: #ff6666;
                                        border-radius: 8px 0 0 8px;
                                    ">
                                        <i class="fas fa-user-tie"></i>
                                    </span>
                                    <select name="pemilik_warga_id"
                                            id="pemilik_warga_id"
                                            class="form-select"
                                            style="
                                                background: rgba(255, 255, 255, 0.05);
                                                border: 1px solid rgba(255, 0, 0, 0.2);
                                                color: #fff;
                                                border-radius: 0 8px 8px 0;
                                                border-left: none;
                                                height: 50px;
                                            "
                                            required>
                                        <option value="" style="background: #1a1a1a;">-- Select Owner --</option>
                                        @foreach ($wargaList as $warga)
                                            <option value="{{ $warga->warga_id }}" style="background: #1a1a1a;">
                                                {{ $warga->nama }} (ID: {{ $warga->warga_id }})
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <small class="text-light opacity-75 mt-2 d-block" style="font-size: 0.8rem;">
                                    <i class="fas fa-info-circle me-1"></i> Select the resident who owns this land
                                </small>
                            </div>

                            {{-- Luas --}}
                            <div class="col-md-4">
                                <label class="form-label text-light mb-2 d-flex align-items-center gap-2" style="font-weight: 500;">
                                    <i class="fas fa-ruler-combined"></i> Area (m²)
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text" style="
                                        background: rgba(255, 255, 255, 0.05);
                                        border: 1px solid rgba(255, 0, 0, 0.2);
                                        border-right: none;
                                        color: #ff6666;
                                        border-radius: 8px 0 0 8px;
                                    ">
                                        <i class="fas fa-expand-alt"></i>
                                    </span>
                                    <input type="number"
                                           step="0.01"
                                           class="form-control"
                                           id="luas_m2"
                                           name="luas_m2"
                                           placeholder="0.00"
                                           style="
                                            background: rgba(255, 255, 255, 0.05);
                                            border: 1px solid rgba(255, 0, 0, 0.2);
                                            color: #fff;
                                            border-radius: 0 8px 8px 0;
                                            border-left: none;
                                            height: 50px;
                                           "
                                           required>
                                    <span class="input-group-text" style="
                                        background: rgba(255, 255, 255, 0.05);
                                        border: 1px solid rgba(255, 0, 0, 0.2);
                                        color: #ff6666;
                                        border-left: none;
                                    ">
                                        m²
                                    </span>
                                </div>
                                <small class="text-light opacity-75 mt-2 d-block" style="font-size: 0.8rem;">
                                    <i class="fas fa-info-circle me-1"></i> Land area in square meters
                                </small>
                            </div>

                            {{-- Penggunaan --}}
                            <div class="col-md-4">
                                <label class="form-label text-light mb-2 d-flex align-items-center gap-2" style="font-weight: 500;">
                                    <i class="fas fa-tag"></i> Land Use
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text" style="
                                        background: rgba(255, 255, 255, 0.05);
                                        border: 1px solid rgba(255, 0, 0, 0.2);
                                        border-right: none;
                                        color: #ff6666;
                                        border-radius: 8px 0 0 8px;
                                    ">
                                        <i class="fas fa-landmark"></i>
                                    </span>
                                    <input type="text"
                                           class="form-control"
                                           id="penggunaan"
                                           name="penggunaan"
                                           placeholder="e.g., Agriculture, Residential"
                                           style="
                                            background: rgba(255, 255, 255, 0.05);
                                            border: 1px solid rgba(255, 0, 0, 0.2);
                                            color: #fff;
                                            border-radius: 0 8px 8px 0;
                                            border-left: none;
                                            height: 50px;
                                           "
                                           required>
                                </div>
                                <small class="text-light opacity-75 mt-2 d-block" style="font-size: 0.8rem;">
                                    <i class="fas fa-info-circle me-1"></i> Primary use of this land
                                </small>
                            </div>

                            {{-- RT --}}
                            <div class="col-md-2">
                                <label class="form-label text-light mb-2 d-flex align-items-center gap-2" style="font-weight: 500;">
                                    <i class="fas fa-map-pin"></i> RT
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text" style="
                                        background: rgba(255, 255, 255, 0.05);
                                        border: 1px solid rgba(255, 0, 0, 0.2);
                                        border-right: none;
                                        color: #ff6666;
                                        border-radius: 8px 0 0 8px;
                                    ">
                                        RT
                                    </span>
                                    <input type="text"
                                           class="form-control"
                                           id="rt"
                                           name="rt"
                                           placeholder="e.g., 01"
                                           style="
                                            background: rgba(255, 255, 255, 0.05);
                                            border: 1px solid rgba(255, 0, 0, 0.2);
                                            color: #fff;
                                            border-radius: 0 8px 8px 0;
                                            border-left: none;
                                            height: 50px;
                                           "
                                           required>
                                </div>
                            </div>

                            {{-- RW --}}
                            <div class="col-md-2">
                                <label class="form-label text-light mb-2 d-flex align-items-center gap-2" style="font-weight: 500;">
                                    <i class="fas fa-map-pin"></i> RW
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text" style="
                                        background: rgba(255, 255, 255, 0.05);
                                        border: 1px solid rgba(255, 0, 0, 0.2);
                                        border-right: none;
                                        color: #ff6666;
                                        border-radius: 8px 0 0 8px;
                                    ">
                                        RW
                                    </span>
                                    <input type="text"
                                           class="form-control"
                                           id="rw"
                                           name="rw"
                                           placeholder="e.g., 05"
                                           style="
                                            background: rgba(255, 255, 255, 0.05);
                                            border: 1px solid rgba(255, 0, 0, 0.2);
                                            color: #fff;
                                            border-radius: 0 8px 8px 0;
                                            border-left: none;
                                            height: 50px;
                                           "
                                           required>
                                </div>
                            </div>

                            {{-- Alamat Lahan --}}
                            <div class="col-12">
                                <label class="form-label text-light mb-2 d-flex align-items-center gap-2" style="font-weight: 500;">
                                    <i class="fas fa-map-marker-alt"></i> Land Address
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text" style="
                                        background: rgba(255, 255, 255, 0.05);
                                        border: 1px solid rgba(255, 0, 0, 0.2);
                                        border-right: none;
                                        color: #ff6666;
                                        border-top-left-radius: 8px;
                                        align-items: start;
                                        padding-top: 12px;
                                    ">
                                        <i class="fas fa-location-dot"></i>
                                    </span>
                                    <textarea class="form-control"
                                              id="alamat_lahan"
                                              name="alamat_lahan"
                                              rows="3"
                                              placeholder="Enter complete land address..."
                                              style="
                                                background: rgba(255, 255, 255, 0.05);
                                                border: 1px solid rgba(255, 0, 0, 0.2);
                                                color: #fff;
                                                border-radius: 0 8px 8px 0;
                                                border-left: none;
                                                resize: vertical;
                                                min-height: 100px;
                                              "
                                              required></textarea>
                                </div>
                                <small class="text-light opacity-75 mt-2 d-block" style="font-size: 0.8rem;">
                                    <i class="fas fa-info-circle me-1"></i> Detailed location description of the land
                                </small>
                            </div>
                        </div>

                        {{-- Form Actions --}}
                        <div class="d-flex justify-content-between mt-5 pt-4 border-top border-secondary">
                            <a href="{{ route('persil.index') }}"
                               class="btn btn-outline-danger d-flex align-items-center gap-2" style="
                                border: 1px solid rgba(255, 0, 0, 0.3);
                                color: #ff6666;
                                border-radius: 8px;
                                padding: 12px 24px;
                                font-weight: 500;
                            ">
                                <i class="fas fa-times"></i>
                                <span>Cancel</span>
                            </a>

                            <div class="d-flex gap-2">
                                <button type="reset"
                                        class="btn btn-outline-secondary d-flex align-items-center gap-2" style="
                                    border: 1px solid rgba(108, 117, 125, 0.3);
                                    color: #adb5bd;
                                    border-radius: 8px;
                                    padding: 12px 20px;
                                    font-weight: 500;
                                ">
                                    <i class="fas fa-redo"></i>
                                    <span>Reset Form</span>
                                </button>

                                <button type="submit"
                                        class="btn btn-danger d-flex align-items-center gap-2" style="
                                    background: linear-gradient(135deg, #ff3333 0%, #cc0000 100%);
                                    border: none;
                                    border-radius: 8px;
                                    padding: 12px 30px;
                                    font-weight: 600;
                                    box-shadow: 0 4px 15px rgba(255, 0, 0, 0.3);
                                ">
                                    <i class="fas fa-save"></i>
                                    <span>Save Land Plot</span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            {{-- Tips Card --}}
            <div class="card border-0 shadow-sm mt-4" style="
                background: rgba(255, 0, 0, 0.05);
                border: 1px solid rgba(255, 0, 0, 0.1);
                border-radius: 12px;
            ">
                <div class="card-body p-4">
                    <div class="d-flex align-items-start gap-3">
                        <div style="
                            width: 40px;
                            height: 40px;
                            background: rgba(255, 0, 0, 0.15);
                            border-radius: 10px;
                            display: flex;
                            align-items: center;
                            justify-content: center;
                        ">
                            <i class="fas fa-lightbulb text-danger"></i>
                        </div>
                        <div>
                            <h6 class="text-light mb-2">Tips for Adding Land Plots</h6>
                            <ul class="text-light opacity-75 mb-0" style="font-size: 0.9rem;">
                                <li>Use a consistent naming convention for land plot codes</li>
                                <li>Ensure the owner is already registered in the system</li>
                                <li>Provide accurate area measurements for proper documentation</li>
                                <li>Include complete address details for easy identification</li>
                                <li>Double-check RT/RW information for administrative accuracy</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Auto-focus on first input
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('kode_persil').focus();
    });

    // Input validation styling
    const inputs = document.querySelectorAll('input, select, textarea');

    inputs.forEach(input => {
        // Add focus effect
        input.addEventListener('focus', function() {
            this.style.boxShadow = '0 0 0 0.25rem rgba(255, 0, 0, 0.25)';
            this.style.borderColor = 'rgba(255, 0, 0, 0.4)';
        });

        // Remove focus effect
        input.addEventListener('blur', function() {
            this.style.boxShadow = 'none';
            this.style.borderColor = 'rgba(255, 0, 0, 0.2)';
        });

        // Add validation styling
        input.addEventListener('input', function() {
            if (this.validity.valid) {
                this.style.borderColor = 'rgba(40, 167, 69, 0.4)';
            } else if (this.value === '') {
                this.style.borderColor = 'rgba(255, 0, 0, 0.2)';
            } else {
                this.style.borderColor = 'rgba(255, 193, 7, 0.4)';
            }
        });
    });

    // Character counter for textarea
    const textarea = document.getElementById('alamat_lahan');
    const charCount = document.createElement('small');
    charCount.className = 'text-light opacity-75';
    charCount.style.fontSize = '0.8rem';
    charCount.style.display = 'block';
    charCount.style.marginTop = '5px';
    charCount.innerHTML = '<i class="fas fa-keyboard me-1"></i> Characters: <span id="charCount">0</span>';

    textarea.parentNode.appendChild(charCount);

    textarea.addEventListener('input', function() {
        document.getElementById('charCount').textContent = this.value.length;

        if (this.value.length < 10) {
            charCount.style.color = '#dc3545';
        } else if (this.value.length < 30) {
            charCount.style.color = '#ffc107';
        } else {
            charCount.style.color = '#28a745';
        }
    });
</script>

<style>
    /* Form styling */
    .form-control, .form-select, textarea {
        transition: all 0.3s ease;
    }

    .form-control:focus, .form-select:focus, textarea:focus {
        background: rgba(255, 255, 255, 0.08) !important;
        border-color: rgba(255, 0, 0, 0.4) !important;
        box-shadow: 0 0 0 0.25rem rgba(255, 0, 0, 0.25) !important;
        color: #fff !important;
    }

    /* Required field indicator */
    .form-label span.text-danger {
        font-size: 1.2em;
        margin-left: 2px;
    }

    /* Input group styling */
    .input-group-text {
        transition: all 0.3s ease;
    }

    .form-control:focus + .input-group-text,
    .form-control:focus ~ .input-group-text {
        border-color: rgba(255, 0, 0, 0.4) !important;
        background: rgba(255, 0, 0, 0.1) !important;
    }

    /* Button hover effects */
    .btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(255, 0, 0, 0.2) !important;
    }

    /* Select dropdown styling */
    .form-select option {
        background: #1a1a1a;
        color: #fff;
    }

    .form-select option:hover {
        background: rgba(255, 0, 0, 0.2) !important;
    }

    /* Smooth transitions */
    * {
        transition: background-color 0.3s ease,
                    border-color 0.3s ease,
                    box-shadow 0.3s ease,
                    transform 0.3s ease;
    }

    /* Placeholder styling */
    ::placeholder {
        color: rgba(255, 255, 255, 0.3) !important;
    }

    /* Scrollbar styling for textarea */
    textarea::-webkit-scrollbar {
        width: 8px;
    }

    textarea::-webkit-scrollbar-track {
        background: rgba(255, 255, 255, 0.05);
        border-radius: 10px;
    }

    textarea::-webkit-scrollbar-thumb {
        background: rgba(255, 0, 0, 0.3);
        border-radius: 10px;
    }

    textarea::-webkit-scrollbar-thumb:hover {
        background: rgba(255, 0, 0, 0.5);
    }
</style>
@endsection
