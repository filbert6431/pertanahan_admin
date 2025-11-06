@extends('layouts.admin.app')

@section('content')
<!-- Sign In Start -->
<div class="container-fluid">
    <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
        <!-- Kolom utama -->
        <div class="col-12 col-md-10 col-lg-8 col-xl-9">
            <div class="bg-secondary rounded p-4 p-sm-5 my-4 mx-3 shadow-lg">

                <!-- Header -->
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <a href="{{ url('/index') }}" class="text-decoration-none">
                        <h3 class="text-primary mb-0">
                            <i class="fa fa-user-edit me-2"></i>DarkPan
                        </h3>
                    </a>
                    <h3 class="mb-0">Buat Akun</h3>
                </div>

                {{-- Form Start --}}
                <form action="{{ route('admin.store') }}" method="POST">
                    @csrf

                    {{-- Nama --}}
                    <div class="form-floating mb-3">
                        <input
                            type="text"
                            class="form-control"
                            name="name"
                            id="Name"
                            placeholder="Firman"
                            required
                        >
                        <label for="Name">Nama</label>
                    </div>

                    {{-- Email --}}
                    <div class="form-floating mb-3">
                        <input
                            type="email"
                            class="form-control"
                            name="email"
                            id="Email"
                            placeholder="name@example.com"
                            required
                        >
                        <label for="Email">Email Address</label>
                    </div>

                    {{-- Password --}}
                    <div class="form-floating mb-4">
                        <input
                            type="password"
                            class="form-control"
                            name="password"
                            id="Password"
                            placeholder="Password"
                            required
                        >
                        <label for="Password">Password</label>
                    </div>

                    {{-- Checkbox dan Link --}}
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <div class="form-check">
                            <input
                                type="checkbox"
                                class="form-check-input"
                                id="exampleCheck1"
                            >
                            <label class="form-check-label" for="exampleCheck1">
                                Check me out
                            </label>
                        </div>
                        <a href="#" class="text-light text-decoration-none">Forgot Password?</a>
                    </div>

                    {{-- Tombol Submit --}}
                    <button type="submit" class="btn btn-primary py-3 w-100 mb-4">
                        Sign Up
                    </button>
                </form>
                {{-- Form End --}}
            </div>
        </div>
    </div>
</div>
<!-- Sign In End -->
@endsection
