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
            <i class="fas fa-user-edit text-white" style="font-size: 1.3rem;"></i>
        </div>
        <div class="flex-grow-1">
            <h1 class="h3 mb-1" style="
                background: linear-gradient(135deg, #ff4d4d 0%, #ff0000 100%);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
                background-clip: text;
                font-weight: 700;
            ">
                Edit Resident Information
            </h1>
            <p class="mb-0 text-light opacity-75">
                <i class="fas fa-user-cog me-1"></i> Update resident details for ID: <strong class="text-danger">{{ $dataWarga->warga_id }}</strong>
            </p>
        </div>
        <a href="{{ route('warga.index') }}" class="btn btn-outline-danger d-flex align-items-center gap-2" style="
            border: 1px solid rgba(255, 0, 0, 0.3);
            color: #ff6666;
            border-radius: 10px;
            padding: 10px 20px;
            font-weight: 500;
        ">
            <i class="fas fa-arrow-left"></i>
            <span>Back to Residents</span>
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
                <a href="{{ route('warga.index') }}" class="text-danger text-decoration-none">
                    <i class="fas fa-users me-1"></i> Residents
                </a>
            </li>
            <li class="breadcrumb-item active text-light">
                <i class="fas fa-user-edit me-1"></i> Edit Resident
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
                    <div class="d-flex align-items-center justify-content-between">
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
                                <i class="fas fa-user-edit text-danger"></i>
                            </div>
                            <div>
                                <h4 class="mb-1 text-light">Update Resident Information</h4>
                                <small class="text-light opacity-75">Edit details for resident: {{ $dataWarga->nama }}</small>
                            </div>
                        </div>
                        <span class="badge rounded-pill" style="
                            background: rgba(255, 0, 0, 0.15);
                            color: #ff9999;
                            padding: 6px 12px;
                            font-size: 0.8rem;
                        ">
                            <i class="fas fa-id-badge me-1"></i>
                            ID: {{ $dataWarga->warga_id }}
                        </span>
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

                    <form action="{{ route('warga.update', $dataWarga->warga_id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        {{-- Personal Information Section --}}
                        <div class="mb-4">
                            <h6 class="text-light mb-3 d-flex align-items-center gap-2">
                                <i class="fas fa-id-card text-danger"></i>
                                Personal Information
                            </h6>
                            <div class="row g-3">
                                {{-- Nomor KTP --}}
                                <div class="col-md-6">
                                    <label class="form-label text-light mb-2 d-flex align-items-center gap-2" style="font-weight: 500;">
                                        <i class="fas fa-id-card"></i> ID Card Number
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
                                               name="no_ktp"
                                               id="no_ktp"
                                               value="{{ old('no_ktp', $dataWarga->no_ktp) }}"
                                               placeholder="Enter ID card number"
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
                                        <i class="fas fa-info-circle me-1"></i> 16-digit national ID number
                                    </small>
                                </div>

                                {{-- Nama --}}
                                <div class="col-md-6">
                                    <label class="form-label text-light mb-2 d-flex align-items-center gap-2" style="font-weight: 500;">
                                        <i class="fas fa-user"></i> Full Name
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
                                            <i class="fas fa-signature"></i>
                                        </span>
                                        <input type="text"
                                               class="form-control"
                                               name="nama"
                                               id="nama"
                                               value="{{ old('nama', $dataWarga->nama) }}"
                                               placeholder="Enter full name"
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

                                {{-- Jenis Kelamin --}}
                                <div class="col-md-6">
                                    <label class="form-label text-light mb-2 d-flex align-items-center gap-2" style="font-weight: 500;">
                                        <i class="fas fa-venus-mars"></i> Gender
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
                                            <i class="fas fa-user-friends"></i>
                                        </span>
                                        <select id="jenis_kelamin"
                                                name="jenis_kelamin"
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
                                            <option value="" style="background: #1a1a1a;">-- Select Gender --</option>
                                            <option value="Laki-laki" {{ old('jenis_kelamin', $dataWarga->jenis_kelamin) == 'Laki-laki' ? 'selected' : '' }} style="background: #1a1a1a;">
                                                Male
                                            </option>
                                            <option value="Perempuan" {{ old('jenis_kelamin', $dataWarga->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }} style="background: #1a1a1a;">
                                                Female
                                            </option>
                                            <option value="Lainnya" {{ old('jenis_kelamin', $dataWarga->jenis_kelamin) == 'Lainnya' ? 'selected' : '' }} style="background: #1a1a1a;">
                                                Other
                                            </option>
                                        </select>
                                    </div>
                                </div>

                                {{-- Agama --}}
                                <div class="col-md-6">
                                    <label class="form-label text-light mb-2 d-flex align-items-center gap-2" style="font-weight: 500;">
                                        <i class="fas fa-pray"></i> Religion
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
                                            <i class="fas fa-place-of-worship"></i>
                                        </span>
                                        <select id="agama"
                                                name="agama"
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
                                            <option value="" style="background: #1a1a1a;">-- Select Religion --</option>
                                            <option value="Islam" {{ old('agama', $dataWarga->agama) == 'Islam' ? 'selected' : '' }} style="background: #1a1a1a;">
                                                Islam
                                            </option>
                                            <option value="Kristen" {{ old('agama', $dataWarga->agama) == 'Kristen' ? 'selected' : '' }} style="background: #1a1a1a;">
                                                Christianity
                                            </option>
                                            <option value="Katolik" {{ old('agama', $dataWarga->agama) == 'Katolik' ? 'selected' : '' }} style="background: #1a1a1a;">
                                                Catholic
                                            </option>
                                            <option value="Hindu" {{ old('agama', $dataWarga->agama) == 'Hindu' ? 'selected' : '' }} style="background: #1a1a1a;">
                                                Hinduism
                                            </option>
                                            <option value="Buddha" {{ old('agama', $dataWarga->agama) == 'Buddha' ? 'selected' : '' }} style="background: #1a1a1a;">
                                                Buddhism
                                            </option>
                                            <option value="Konghucu" {{ old('agama', $dataWarga->agama) == 'Konghucu' ? 'selected' : '' }} style="background: #1a1a1a;">
                                                Confucianism
                                            </option>
                                        </select>
                                    </div>
                                </div>

                                {{-- Pekerjaan --}}
                                <div class="col-md-6">
                                    <label class="form-label text-light mb-2 d-flex align-items-center gap-2" style="font-weight: 500;">
                                        <i class="fas fa-briefcase"></i> Occupation
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
                                        <input type="text"
                                               class="form-control"
                                               name="pekerjaan"
                                               id="pekerjaan"
                                               value="{{ old('pekerjaan', $dataWarga->pekerjaan) }}"
                                               placeholder="Enter occupation"
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
                            </div>
                        </div>

                        {{-- Contact Information Section --}}
                        <div class="mb-4">
                            <h6 class="text-light mb-3 d-flex align-items-center gap-2">
                                <i class="fas fa-address-book text-danger"></i>
                                Contact Information
                            </h6>
                            <div class="row g-3">
                                {{-- Nomor HP --}}
                                <div class="col-md-6">
                                    <label class="form-label text-light mb-2 d-flex align-items-center gap-2" style="font-weight: 500;">
                                        <i class="fas fa-phone"></i> Phone Number
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
                                            <i class="fas fa-mobile-alt"></i>
                                        </span>
                                        <input type="text"
                                               class="form-control"
                                               name="no_hp"
                                               id="no_hp"
                                               value="{{ old('no_hp', $dataWarga->no_hp) }}"
                                               placeholder="Enter phone number"
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
                                        <i class="fas fa-info-circle me-1"></i> Format: 08xx-xxxx-xxxx
                                    </small>
                                </div>

                                {{-- Email --}}
                                <div class="col-md-6">
                                    <label class="form-label text-light mb-2 d-flex align-items-center gap-2" style="font-weight: 500;">
                                        <i class="fas fa-envelope"></i> Email Address
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
                                            <i class="fas fa-at"></i>
                                        </span>
                                        <input type="email"
                                               class="form-control"
                                               name="email"
                                               id="email"
                                               value="{{ old('email', $dataWarga->email) }}"
                                               placeholder="name@example.com"
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
                            </div>
                        </div>

                        {{-- Current Information --}}
                        <div class="card border-0 mt-4" style="
                            background: rgba(255, 0, 0, 0.05);
                            border: 1px solid rgba(255, 0, 0, 0.1);
                            border-radius: 10px;
                        ">
                            <div class="card-body p-3">
                                <h6 class="text-light mb-3 d-flex align-items-center gap-2">
                                    <i class="fas fa-history text-danger"></i>
                                    Current Information
                                </h6>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="mb-2">
                                            <small class="text-light opacity-75">Registered:</small>
                                            <div class="text-light">
                                                @if($dataWarga->created_at)
                                                    {{ $dataWarga->created_at->format('d M Y') }}
                                                @else
                                                    N/A
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-2">
                                            <small class="text-light opacity-75">Last Updated:</small>
                                            <div class="text-light">
                                                @if($dataWarga->updated_at)
                                                    {{ $dataWarga->updated_at->format('d M Y, H:i') }}
                                                @else
                                                    N/A
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-2">
                                            <small class="text-light opacity-75">Current Status:</small>
                                            <div>
                                                @php
                                                    $status = strtolower($dataWarga->status ?? 'pending');
                                                    $badgeColor = match ($status) {
                                                        'aktif' => 'success',
                                                        'nonaktif' => 'secondary',
                                                        default => 'warning',
                                                    };
                                                @endphp
                                                <span class="badge bg-{{ $badgeColor }} text-uppercase">{{ $status }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Form Actions --}}
                        <div class="d-flex justify-content-between mt-5 pt-4 border-top border-secondary">
                            <a href="{{ route('warga.index') }}"
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
                                    <span>Reset Changes</span>
                                </button>

                                <button type="submit"
                                        class="btn btn-success d-flex align-items-center gap-2" style="
                                    background: linear-gradient(135deg, #28a745 0%, #1e7e34 100%);
                                    border: none;
                                    border-radius: 8px;
                                    padding: 12px 30px;
                                    font-weight: 600;
                                    box-shadow: 0 4px 15px rgba(40, 167, 69, 0.3);
                                ">
                                    <i class="fas fa-save"></i>
                                    <span>Update Resident</span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            {{-- Warning Card --}}
            <div class="card border-0 shadow-sm mt-4" style="
                background: rgba(255, 193, 7, 0.05);
                border: 1px solid rgba(255, 193, 7, 0.2);
                border-radius: 12px;
            ">
                <div class="card-body p-4">
                    <div class="d-flex align-items-start gap-3">
                        <div style="
                            width: 40px;
                            height: 40px;
                            background: rgba(255, 193, 7, 0.15);
                            border-radius: 10px;
                            display: flex;
                            align-items: center;
                            justify-content: center;
                        ">
                            <i class="fas fa-exclamation-triangle text-warning"></i>
                        </div>
                        <div>
                            <h6 class="text-light mb-2">Important Notes</h6>
                            <ul class="text-light opacity-75 mb-0" style="font-size: 0.9rem;">
                                <li>ID card number changes require additional verification</li>
                                <li>Email address updates will affect login credentials</li>
                                <li>Phone number changes should be verified for communication</li>
                                <li>Double-check all personal information for accuracy</li>
                                <li>Changes will be logged in the system history</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Input validation styling
    const inputs = document.querySelectorAll('input, select');

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

        // Trigger initial validation for pre-filled values
        input.dispatchEvent(new Event('input'));
    });

    // ID Card number formatting
    const idCardInput = document.getElementById('no_ktp');
    idCardInput.addEventListener('input', function(e) {
        let value = e.target.value.replace(/\D/g, '');
        if (value.length > 16) value = value.substring(0, 16);

        // Format: XXXX-XXXX-XXXX-XXXX
        if (value.length > 12) {
            value = value.substring(0, 4) + '-' + value.substring(4, 8) + '-' +
                    value.substring(8, 12) + '-' + value.substring(12);
        } else if (value.length > 8) {
            value = value.substring(0, 4) + '-' + value.substring(4, 8) + '-' +
                    value.substring(8);
        } else if (value.length > 4) {
            value = value.substring(0, 4) + '-' + value.substring(4);
        }

        e.target.value = value;
    });

    // Phone number formatting
    const phoneInput = document.getElementById('no_hp');
    phoneInput.addEventListener('input', function(e) {
        let value = e.target.value.replace(/\D/g, '');
        if (value.length > 13) value = value.substring(0, 13);

        // Format: 08XX-XXXX-XXXX
        if (value.length > 8) {
            value = value.substring(0, 4) + '-' + value.substring(4, 8) + '-' +
                    value.substring(8);
        } else if (value.length > 4) {
            value = value.substring(0, 4) + '-' + value.substring(4);
        }

        e.target.value = value;
    });

    // Confirmation before leaving page if changes were made
    let formChanged = false;
    const form = document.querySelector('form');

    form.addEventListener('input', function() {
        formChanged = true;
    });

    window.addEventListener('beforeunload', function(e) {
        if (formChanged) {
            e.preventDefault();
            e.returnValue = 'You have unsaved changes. Are you sure you want to leave?';
        }
    });

    // Reset confirmation
    const resetButton = document.querySelector('button[type="reset"]');
    resetButton.addEventListener('click', function(e) {
        if (formChanged) {
            if (!confirm('Are you sure you want to reset all changes?')) {
                e.preventDefault();
            } else {
                formChanged = false;
            }
        }
    });
</script>

<style>
    /* Form styling */
    .form-control, .form-select {
        transition: all 0.3s ease;
    }

    .form-control:focus, .form-select:focus {
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
</style>
@endsection
