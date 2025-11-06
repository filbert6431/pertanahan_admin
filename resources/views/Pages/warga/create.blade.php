@extends('Layout-admin.app')

@section('content')
<!-- Form Tambah Warga Start -->
<div class="container-fluid">
    <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
        <div class="col-12 col-md-10 col-lg-8 col-xl-9">
            <div class="bg-secondary rounded p-4 p-sm-5 my-4 mx-3 shadow-lg">

                <!-- Header -->
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <a href="{{ url('/index') }}" class="text-decoration-none">
                        <h3 class="text-primary mb-0">
                            <i class="fa fa-user-edit me-2"></i>DarkPan
                        </h3>
                    </a>
                    <h3 class="mb-0">Buat Akun Warga</h3>
                </div>

                {{-- Form Start --}}
                <form action="{{ route('warga.store') }}" method="POST">
                    @csrf

                    {{-- Nomor KTP --}}
                    <div class="form-floating mb-3">
                        <input
                            type="text"
                            class="form-control"
                            name="no_ktp"
                            id="no_ktp"
                            placeholder="Nomor KTP"
                            required
                        >
                        <label for="no_ktp">Nomor KTP</label>
                    </div>

                    {{-- Nama --}}
                    <div class="form-floating mb-3">
                        <input
                            type="text"
                            class="form-control"
                            name="nama"
                            id="nama"
                            placeholder="Firman"
                            required
                        >
                        <label for="nama">Nama Lengkap</label>
                    </div>

                    {{-- Jenis Kelamin --}}
                    <div class="mb-3">
                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                        <select
                            id="jenis_kelamin"
                            name="jenis_kelamin"
                            class="form-select"
                            required
                        >
                            <option value="">-- Pilih --</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                            <option value="Lainnya">Lainnya</option>
                        </select>
                    </div>

                    {{-- Agama --}}
                    <div class="mb-3">
                        <label for="agama" class="form-label">Agama</label>
                        <select
                            id="agama"
                            name="agama"
                            class="form-select"
                            required
                        >
                            <option value="">-- Pilih Agama --</option>
                            <option value="Islam">Islam</option>
                            <option value="Kristen">Kristen</option>
                            <option value="Katolik">Katolik</option>
                            <option value="Hindu">Hindu</option>
                            <option value="Buddha">Buddha</option>
                            <option value="Konghucu">Konghucu</option>
                        </select>
                    </div>

                    {{-- Pekerjaan --}}
                    <div class="form-floating mb-3">
                        <input
                            type="text"
                            class="form-control"
                            name="pekerjaan"
                            id="pekerjaan"
                            placeholder="Wirausaha"
                            required
                        >
                        <label for="pekerjaan">Pekerjaan</label>
                    </div>

                    {{-- Nomor HP --}}
                    <div class="form-floating mb-3">
                        <input
                            type="text"
                            class="form-control"
                            name="no_hp"
                            id="no_hp"
                            placeholder="08123456789"
                            required
                        >
                        <label for="no_hp">Nomor HP</label>
                    </div>

                    {{-- Email --}}
                    <div class="form-floating mb-3">
                        <input
                            type="email"
                            class="form-control"
                            name="email"
                            id="email"
                            placeholder="name@example.com"
                            required
                        >
                        <label for="email">Email</label>
                    </div>

                    {{-- Password --}}
                    <div class="form-floating mb-4">
                        <input
                            type="password"
                            class="form-control"
                            name="password"
                            id="password"
                            placeholder="Password"
                            required
                        >
                        <label for="password">Password</label>
                    </div>

                    {{-- Checkbox & Link --}}
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

                    {{-- Submit Button --}}
                    <button type="submit" class="btn btn-primary py-3 w-100 mb-4">
                        Sign Up
                    </button>
                </form>
                {{-- Form End --}}
            </div>
        </div>
    </div>
</div>
<!-- Form Tambah Warga End -->
@endsection
