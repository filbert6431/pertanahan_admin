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
            <i class="fas fa-user-plus text-white" style="font-size: 1.3rem;"></i>
        </div>
        <div class="flex-grow-1">
            <h1 class="h3 mb-1" style="
                background: linear-gradient(135deg, #ff4d4d 0%, #ff0000 100%);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
                background-clip: text;
                font-weight: 700;
            ">
                Create New User
            </h1>
            <p class="mb-0 text-light opacity-75">
                <i class="fas fa-user-cog me-1"></i> Add a new administrator or user account
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
                <i class="fas fa-user-plus me-1"></i> Create User
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
                            <i class="fas fa-user-plus text-danger"></i>
                        </div>
                        <div>
                            <h5 class="mb-0 text-light">User Information</h5>
                            <small class="text-light opacity-75">Fill in the form below to create a new user</small>
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

                    <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        {{-- Profile Picture --}}
                        <div class="mb-4">
                            <label class="form-label text-light mb-2 d-flex align-items-center gap-2" style="font-weight: 500;">
                                <i class="fas fa-camera"></i> Profile Picture
                            </label>
                            <div class="file-upload-area" style="
                                border: 2px dashed rgba(255, 0, 0, 0.2);
                                border-radius: 10px;
                                padding: 30px;
                                text-align: center;
                                background: rgba(255, 255, 255, 0.02);
                                transition: all 0.3s ease;
                                cursor: pointer;
                            " onclick="document.getElementById('profilePicture').click()">
                                <i class="fas fa-cloud-upload-alt fa-2x mb-3" style="color: #ff6666;"></i>
                                <h6 class="text-light mb-2">Upload Profile Picture</h6>
                                <p class="text-light opacity-75 mb-0" style="font-size: 0.9rem;">
                                    Click to upload or drag and drop<br>
                                    JPG, PNG, WEBP (Max 2MB)
                                </p>
                                <input type="file"
                                       name="profile_picture"
                                       id="profilePicture"
                                       class="form-control d-none"
                                       accept="image/*"
                                       required
                                       onchange="previewImage(this)">
                            </div>
                            <div id="imagePreview" class="mt-3 text-center" style="display: none;">
                                <img id="preview" class="rounded-circle border border-danger"
                                     style="width: 120px; height: 120px; object-fit: cover; border-width: 3px !important;">
                                <button type="button" class="btn btn-sm btn-outline-danger mt-2"
                                        onclick="removeImage()">
                                    <i class="fas fa-times me-1"></i> Remove Image
                                </button>
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
                                           value="{{ old('name') }}"
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
                                        <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }} style="background: #1a1a1a;">Administrator</option>
                                        <option value="user" {{ old('role') == 'user' ? 'selected' : '' }} style="background: #1a1a1a;">Regular User</option>
                                    </select>
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
                                           value="{{ old('email') }}"
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

                            {{-- Password --}}
                            <div class="col-md-6">
                                <label class="form-label text-light mb-2 d-flex align-items-center gap-2" style="font-weight: 500;">
                                    <i class="fas fa-lock"></i> Password
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
                                           placeholder="Enter password"
                                           style="
                                            background: rgba(255, 255, 255, 0.05);
                                            border: 1px solid rgba(255, 0, 0, 0.2);
                                            color: #fff;
                                            border-radius: 0 8px 8px 0;
                                            border-left: none;
                                           "
                                           required>
                                    <button type="button" class="btn btn-outline-danger"
                                            style="border: 1px solid rgba(255, 0, 0, 0.3); margin-left: -1px;"
                                            onclick="togglePassword()">
                                        <i class="fas fa-eye" id="eyeIcon"></i>
                                    </button>
                                </div>
                                <div class="password-strength mt-2" id="passwordStrength">
                                    <div class="d-flex justify-content-between mb-1">
                                        <small class="text-light opacity-75">Password strength:</small>
                                        <small class="text-light opacity-75" id="strengthText">Weak</small>
                                    </div>
                                    <div class="progress" style="height: 4px; background: rgba(255, 255, 255, 0.1);">
                                        <div class="progress-bar" id="strengthBar"
                                             style="width: 0%; background: #dc3545;"></div>
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

                            <button type="submit"
                                    class="btn btn-danger d-flex align-items-center gap-2" style="
                                background: linear-gradient(135deg, #ff3333 0%, #cc0000 100%);
                                border: none;
                                border-radius: 8px;
                                padding: 10px 30px;
                                font-weight: 600;
                                box-shadow: 0 4px 15px rgba(255, 0, 0, 0.3);
                            ">
                                <i class="fas fa-save"></i>
                                <span>Create User</span>
                            </button>
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
                            <h6 class="text-light mb-2">Tips for Creating User Accounts</h6>
                            <ul class="text-light opacity-75 mb-0" style="font-size: 0.9rem;">
                                <li>Use a strong password with at least 8 characters</li>
                                <li>Provide a clear profile picture for easy identification</li>
                                <li>Assign appropriate roles based on user responsibilities</li>
                                <li>Use a valid email address for account recovery</li>
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

    function removeImage() {
        const previewContainer = document.getElementById('imagePreview');
        const fileUploadArea = document.querySelector('.file-upload-area');
        const fileInput = document.getElementById('profilePicture');

        fileInput.value = '';
        previewContainer.style.display = 'none';
        fileUploadArea.style.display = 'block';
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

    // Password Strength Checker
    document.getElementById('password').addEventListener('input', function(e) {
        const password = e.target.value;
        const strengthBar = document.getElementById('strengthBar');
        const strengthText = document.getElementById('strengthText');

        let strength = 0;
        let color = '#dc3545';
        let text = 'Weak';

        // Length check
        if (password.length >= 8) strength += 25;
        if (password.length >= 12) strength += 25;

        // Complexity checks
        if (/[A-Z]/.test(password)) strength += 25;
        if (/[0-9]/.test(password)) strength += 15;
        if (/[^A-Za-z0-9]/.test(password)) strength += 10;

        // Cap at 100
        strength = Math.min(strength, 100);

        // Update UI
        strengthBar.style.width = strength + '%';

        if (strength < 40) {
            color = '#dc3545';
            text = 'Weak';
        } else if (strength < 70) {
            color = '#ffc107';
            text = 'Fair';
        } else if (strength < 90) {
            color = '#28a745';
            text = 'Good';
        } else {
            color = '#20c997';
            text = 'Strong';
        }

        strengthBar.style.background = color;
        strengthText.textContent = text;
        strengthText.style.color = color;
    });

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

    /* Smooth transitions */
    * {
        transition: background-color 0.3s ease,
                    border-color 0.3s ease,
                    box-shadow 0.3s ease,
                    transform 0.3s ease;
    }
</style>
@endsection
