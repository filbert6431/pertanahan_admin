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
                Edit User Account
            </h1>
            <p class="mb-0 text-light opacity-75">
                <i class="fas fa-user-cog me-1"></i> Update user information and permissions
            </p>
        </div>
        <a href="{{ route('user.index') }}" class="btn btn-outline-danger d-flex align-items-center gap-2" style="
            border: 1px solid rgba(255, 0, 0, 0.3);
            color: #ff6666;
            border-radius: 10px;
            padding: 10px 20px;
            font-weight: 500;
        ">
            <i class="fas fa-arrow-left"></i>
            <span>Back to Users</span>
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
                <a href="{{ route('user.index') }}" class="text-danger text-decoration-none">
                    <i class="fas fa-users me-1"></i> Users
                </a>
            </li>
            <li class="breadcrumb-item active text-light">
                <i class="fas fa-user-edit me-1"></i> Edit User
            </li>
        </ol>
    </nav>

    <div class="row justify-content-center">
        <div class="col-xl-8 col-lg-10">
            {{-- Form Card --}}
            <div class="card border-0 shadow-lg" style="
                background: rgba(255, 255, 255, 0.03);
                border-radius: 15px;
                border: 1px solid rgba(255, 0, 0, 0.1);
                backdrop-filter: blur(10px);
            ">
                <div class="card-header border-0" style="
                    background: linear-gradient(90deg, rgba(255,0,0,0.1) 0%, rgba(255,0,0,0.05) 100%);
                    border-bottom: 1px solid rgba(255, 0, 0, 0.1);
                    padding: 20px 30px;
                    border-radius: 15px 15px 0 0;
                ">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center">
                            <div style="
                                width: 40px;
                                height: 40px;
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
                                <h5 class="mb-0 text-light">Edit User Information</h5>
                                <small class="text-light opacity-75">Update details for user ID: {{ $dataUser->user_id }}</small>
                            </div>
                        </div>
                        <span class="badge rounded-pill" style="
                            background: rgba(255, 0, 0, 0.15);
                            color: #ff9999;
                            padding: 6px 12px;
                            font-size: 0.8rem;
                        ">
                            <i class="fas fa-user me-1"></i>
                            {{ ucfirst($dataUser->role) }}
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

                    <form action="{{ route('user.update', $dataUser->user_id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        {{-- Current Profile Picture --}}
                        <div class="mb-4 text-center">
                            <div class="position-relative d-inline-block">
                                @if($dataUser->profile_picture)
                                    <img src="{{ asset('storage/' . $dataUser->profile_picture) }}"
                                         class="rounded-circle border border-danger"
                                         width="140"
                                         height="140"
                                         style="object-fit: cover; border-width: 3px !important;"
                                         id="currentImage">
                                @else
                                    @php
                                        $name = $dataUser->name ?? 'U';
                                        $initial = strtoupper(substr($name, 0, 1));
                                        $colors = ['#ff3333', '#cc0000', '#990000', '#660000'];
                                        $bgColor = $colors[crc32($name) % count($colors)];
                                    @endphp
                                    <div class="rounded-circle d-flex align-items-center justify-content-center"
                                         style="
                                            width: 140px;
                                            height: 140px;
                                            background: linear-gradient(135deg, {{ $bgColor }} 0%, #{{ substr(md5($name), 0, 6) }} 100%);
                                            border: 3px solid rgba(255, 0, 0, 0.3);
                                            font-size: 3rem;
                                            font-weight: 700;
                                            color: white;
                                         "
                                         id="currentInitial">
                                        {{ $initial }}
                                    </div>
                                @endif
                                <div class="position-absolute bottom-0 end-0">
                                    <div class="bg-danger rounded-circle p-1 border border-2 border-dark">
                                        <i class="fas fa-user text-white" style="font-size: 0.8rem;"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="text-light opacity-75 mt-2 mb-0">Current profile picture</p>
                        </div>

                        {{-- New Profile Picture --}}
                        <div class="mb-4">
                            <label class="form-label text-light mb-2 d-flex align-items-center gap-2" style="font-weight: 500;">
                                <i class="fas fa-camera"></i> Update Profile Picture (Optional)
                            </label>
                            <div class="file-upload-area" style="
                                border: 2px dashed rgba(255, 0, 0, 0.2);
                                border-radius: 10px;
                                padding: 20px;
                                text-align: center;
                                background: rgba(255, 255, 255, 0.02);
                                transition: all 0.3s ease;
                                cursor: pointer;
                            " onclick="document.getElementById('profilePicture').click()">
                                <i class="fas fa-cloud-upload-alt fa-lg mb-2" style="color: #ff6666;"></i>
                                <h6 class="text-light mb-1">Upload New Photo</h6>
                                <p class="text-light opacity-75 mb-0" style="font-size: 0.85rem;">
                                    Click to upload or drag and drop<br>
                                    JPG, PNG, WEBP (Max 2MB)
                                </p>
                                <input type="file"
                                       name="profile_picture"
                                       id="profilePicture"
                                       class="form-control d-none"
                                       accept="image/*"
                                       onchange="previewImage(this)">
                            </div>
                            <div id="imagePreview" class="mt-3 text-center" style="display: none;">
                                <img id="preview" class="rounded-circle border border-success"
                                     style="width: 120px; height: 120px; object-fit: cover; border-width: 3px !important;">
                                <div class="mt-2">
                                    <button type="button" class="btn btn-sm btn-outline-success me-2"
                                            onclick="keepCurrentImage()">
                                        <i class="fas fa-times me-1"></i> Keep Current
                                    </button>
                                    <button type="button" class="btn btn-sm btn-outline-danger"
                                            onclick="removeNewImage()">
                                        <i class="fas fa-trash me-1"></i> Remove New
                                    </button>
                                </div>
                                <small class="text-light opacity-75 d-block mt-2">New photo preview</small>
                            </div>
                        </div>

                        <div class="row g-3">
                            {{-- Name --}}
                            <div class="col-md-6">
                                <label class="form-label text-light mb-2 d-flex align-items-center gap-2" style="font-weight: 500;">
                                    <i class="fas fa-user"></i> Full Name
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text" style="
                                        background: rgba(255, 255, 255, 0.05);
                                        border: 1px solid rgba(255, 0, 0, 0.2);
                                        border-right: none;
                                        color: #ff6666;
                                        border-radius: 8px 0 0 8px;
                                    ">
                                        <i class="fas fa-user"></i>
                                    </span>
                                    <input type="text"
                                           name="name"
                                           class="form-control"
                                           value="{{ old('name', $dataUser->name) }}"
                                           placeholder="Enter full name"
                                           style="
                                            background: rgba(255, 255, 255, 0.05);
                                            border: 1px solid rgba(255, 0, 0, 0.2);
                                            color: #fff;
                                            border-radius: 0 8px 8px 0;
                                            border-left: none;
                                           "
                                           required>
                                </div>
                            </div>

                            {{-- Email --}}
                            <div class="col-md-6">
                                <label class="form-label text-light mb-2 d-flex align-items-center gap-2" style="font-weight: 500;">
                                    <i class="fas fa-envelope"></i> Email Address
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
                                           name="email"
                                           class="form-control"
                                           value="{{ old('email', $dataUser->email) }}"
                                           placeholder="user@example.com"
                                           style="
                                            background: rgba(255, 255, 255, 0.05);
                                            border: 1px solid rgba(255, 0, 0, 0.2);
                                            color: #fff;
                                            border-radius: 0 8px 8px 0;
                                            border-left: none;
                                           "
                                           required>
                                </div>
                            </div>

                            {{-- Role --}}
                            <div class="col-md-6">
                                <label class="form-label text-light mb-2 d-flex align-items-center gap-2" style="font-weight: 500;">
                                    <i class="fas fa-user-tag"></i> Role
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text" style="
                                        background: rgba(255, 255, 255, 0.05);
                                        border: 1px solid rgba(255, 0, 0, 0.2);
                                        border-right: none;
                                        color: #ff6666;
                                        border-radius: 8px 0 0 8px;
                                    ">
                                        <i class="fas fa-user-shield"></i>
                                    </span>
                                    <select name="role" class="form-select" style="
                                        background: rgba(255, 255, 255, 0.05);
                                        border: 1px solid rgba(255, 0, 0, 0.2);
                                        color: #fff;
                                        border-radius: 0 8px 8px 0;
                                        border-left: none;
                                        height: 45px;
                                    " required>
                                        <option value="admin" {{ old('role', $dataUser->role) == 'admin' ? 'selected' : '' }} style="background: #1a1a1a;">Administrator</option>
                                        <option value="user" {{ old('role', $dataUser->role) == 'user' ? 'selected' : '' }} style="background: #1a1a1a;">Regular User</option>
                                    </select>
                                </div>
                            </div>

                            {{-- Password --}}
                            <div class="col-md-6">
                                <label class="form-label text-light mb-2 d-flex align-items-center gap-2" style="font-weight: 500;">
                                    <i class="fas fa-lock"></i> New Password (Optional)
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text" style="
                                        background: rgba(255, 255, 255, 0.05);
                                        border: 1px solid rgba(255, 0, 0, 0.2);
                                        border-right: none;
                                        color: #ff6666;
                                        border-radius: 8px 0 0 8px;
                                    ">
                                        <i class="fas fa-key"></i>
                                    </span>
                                    <input type="password"
                                           name="password"
                                           id="password"
                                           class="form-control"
                                           placeholder="Leave empty to keep current"
                                           style="
                                            background: rgba(255, 255, 255, 0.05);
                                            border: 1px solid rgba(255, 0, 0, 0.2);
                                            color: #fff;
                                            border-radius: 0 8px 8px 0;
                                            border-left: none;
                                           ">
                                    <button type="button" class="btn btn-outline-danger"
                                            style="border: 1px solid rgba(255, 0, 0, 0.3); margin-left: -1px;"
                                            onclick="togglePassword()">
                                        <i class="fas fa-eye" id="eyeIcon"></i>
                                    </button>
                                </div>
                                <small class="text-light opacity-75 mt-2 d-block" style="font-size: 0.8rem;">
                                    <i class="fas fa-info-circle me-1"></i> Only enter if you want to change the password
                                </small>
                            </div>
                        </div>

                        {{-- User Info Summary --}}
                        <div class="card border-0 mt-4" style="
                            background: rgba(255, 0, 0, 0.05);
                            border: 1px solid rgba(255, 0, 0, 0.1);
                            border-radius: 10px;
                        ">
                            <div class="card-body p-3">
                                <h6 class="text-light mb-3 d-flex align-items-center gap-2">
                                    <i class="fas fa-info-circle"></i> User Information
                                </h6>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-2">
                                            <small class="text-light opacity-75">User ID:</small>
                                            <div class="text-light fw-semibold">{{ $dataUser->user_id }}</div>
                                        </div>
                                        <div class="mb-2">
                                            <small class="text-light opacity-75">Current Status:</small>
                                            <div>
                                                @php
                                                    $status = strtolower($dataUser->status ?? 'pending');
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
                                    <div class="col-md-6">
                                        <div class="mb-2">
                                            <small class="text-light opacity-75">Created:</small>
                                            <div class="text-light">
                                                @if($dataUser->created_at)
                                                    {{ $dataUser->created_at->format('d M Y') }}
                                                @else
                                                    N/A
                                                @endif
                                            </div>
                                        </div>
                                        <div class="mb-2">
                                            <small class="text-light opacity-75">Last Updated:</small>
                                            <div class="text-light">
                                                @if($dataUser->updated_at)
                                                    {{ $dataUser->updated_at->format('d M Y H:i') }}
                                                @else
                                                    N/A
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Form Actions --}}
                        <div class="d-flex justify-content-between mt-5 pt-4 border-top border-secondary">
                            <a href="{{ route('user.index') }}"
                               class="btn btn-outline-danger d-flex align-items-center gap-2" style="
                                border: 1px solid rgba(255, 0, 0, 0.3);
                                color: #ff6666;
                                border-radius: 8px;
                                padding: 10px 24px;
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
                                    padding: 10px 20px;
                                    font-weight: 500;
                                ">
                                    <i class="fas fa-redo"></i>
                                    <span>Reset</span>
                                </button>

                                <button type="submit"
                                        class="btn btn-success d-flex align-items-center gap-2" style="
                                    background: linear-gradient(135deg, #28a745 0%, #1e7e34 100%);
                                    border: none;
                                    border-radius: 8px;
                                    padding: 10px 30px;
                                    font-weight: 600;
                                    box-shadow: 0 4px 15px rgba(40, 167, 69, 0.3);
                                ">
                                    <i class="fas fa-save"></i>
                                    <span>Update User</span>
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
                                <li>Changing the user's role may affect their permissions</li>
                                <li>Email changes will affect login credentials</li>
                                <li>Profile picture updates will replace the existing one</li>
                                <li>Password changes will require the user to login again</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Image Preview
    function previewImage(input) {
        const preview = document.getElementById('preview');
        const previewContainer = document.getElementById('imagePreview');
        const fileUploadArea = document.querySelector('.file-upload-area');

        if (input.files && input.files[0]) {
            const reader = new FileReader();

            reader.onload = function(e) {
                preview.src = e.target.result;
                previewContainer.style.display = 'block';
                fileUploadArea.style.display = 'none';
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    function keepCurrentImage() {
        const previewContainer = document.getElementById('imagePreview');
        const fileUploadArea = document.querySelector('.file-upload-area');
        const fileInput = document.getElementById('profilePicture');

        fileInput.value = '';
        previewContainer.style.display = 'none';
        fileUploadArea.style.display = 'block';
    }

    function removeNewImage() {
        keepCurrentImage(); // Same functionality for now
    }

    // Password Toggle
    function togglePassword() {
        const passwordInput = document.getElementById('password');
        const eyeIcon = document.getElementById('eyeIcon');

        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            eyeIcon.classList.remove('fa-eye');
            eyeIcon.classList.add('fa-eye-slash');
        } else {
            passwordInput.type = 'password';
            eyeIcon.classList.remove('fa-eye-slash');
            eyeIcon.classList.add('fa-eye');
        }
    }

    // Drag and drop for file upload
    const fileUploadArea = document.querySelector('.file-upload-area');
    const fileInput = document.getElementById('profilePicture');

    ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
        fileUploadArea.addEventListener(eventName, preventDefaults, false);
    });

    function preventDefaults(e) {
        e.preventDefault();
        e.stopPropagation();
    }

    ['dragenter', 'dragover'].forEach(eventName => {
        fileUploadArea.addEventListener(eventName, highlight, false);
    });

    ['dragleave', 'drop'].forEach(eventName => {
        fileUploadArea.addEventListener(eventName, unhighlight, false);
    });

    function highlight() {
        fileUploadArea.style.borderColor = '#ff0000';
        fileUploadArea.style.background = 'rgba(255, 0, 0, 0.05)';
    }

    function unhighlight() {
        fileUploadArea.style.borderColor = 'rgba(255, 0, 0, 0.2)';
        fileUploadArea.style.background = 'rgba(255, 255, 255, 0.02)';
    }

    fileUploadArea.addEventListener('drop', handleDrop, false);

    function handleDrop(e) {
        const dt = e.dataTransfer;
        const files = dt.files;

        fileInput.files = files;
        previewImage(fileInput);
    }
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

    /* File upload area hover */
    .file-upload-area:hover {
        background: rgba(255, 0, 0, 0.05) !important;
        border-color: rgba(255, 0, 0, 0.3) !important;
    }

    /* Button hover effects */
    .btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(255, 0, 0, 0.2) !important;
    }

    /* Current image styling */
    #currentImage, #currentInitial {
        box-shadow: 0 4px 15px rgba(255, 0, 0, 0.2);
    }

    /* Smooth transitions */
    * {
        transition: background-color 0.3s ease,
                    border-color 0.3s ease,
                    box-shadow 0.3s ease,
                    transform 0.3s ease;
    }
</style>
@endsection
