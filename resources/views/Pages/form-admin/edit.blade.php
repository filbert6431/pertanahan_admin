@extends('layouts.admin.app')

@section('content')
<div class="container-fluid">
    <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
        <div class="col-12 col-md-10 col-lg-8 col-xl-9">
            <div class="bg-secondary rounded p-4 p-sm-5 my-4 mx-3 shadow-lg">
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <a href="{{ route('warga.index') }}">
                        <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>Data Warga</h3>
                    </a>
                    <h3>Update Data Warga</h3>
                </div>

                {{-- form start --}}
                <form action="{{ route('warga.update', $dataWarga->no_ktp) }}" method="POST">
                    @csrf
                    @method('PUT')

                    {{-- Nama --}}
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="nama" id="Nama"
                            value="{{ old('nama', $dataWarga->nama) }}" placeholder="Nama Warga" required>
                        <label for="Nama">Nama Lengkap</label>
                    </div>

                    {{-- Nomor KTP --}}
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="no_ktp" id="NoKTP"
                            value="{{ old('no_ktp', $dataWarga->no_ktp) }}" placeholder="Nomor KTP" required>
                        <label for="NoKTP">Nomor KTP</label>
                    </div>

                    {{-- Jenis Kelamin --}}
                    <div class="form-floating mb-3">
                        <select class="form-select" name="jenis_kelamin" id="JenisKelamin">
                            <option value="" disabled>Pilih Jenis Kelamin</option>
                            <option value="Laki-laki" {{ $dataWarga->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="Perempuan" {{ $dataWarga->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                        <label for="JenisKelamin">Jenis Kelamin</label>
                    </div>

                    {{-- Agama --}}
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="agama" id="Agama"
                            value="{{ old('agama', $dataWarga->agama) }}" placeholder="Agama">
                        <label for="Agama">Agama</label>
                    </div>

                    {{-- Pekerjaan --}}
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="pekerjaan" id="Pekerjaan"
                            value="{{ old('pekerjaan', $dataWarga->pekerjaan) }}" placeholder="Pekerjaan">
                        <label for="Pekerjaan">Pekerjaan</label>
                    </div>

                    {{-- No HP --}}
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="no_hp" id="NoHP"
                            value="{{ old('no_hp', $dataWarga->no_hp) }}" placeholder="Nomor HP">
                        <label for="NoHP">Nomor HP</label>
                    </div>

                    {{-- Email --}}
                    <div class="form-floating mb-4">
                        <input type="email" class="form-control" name="email" id="Email"
                            value="{{ old('email', $dataWarga->email) }}" placeholder="Email">
                        <label for="Email">Alamat Email</label>
                    </div>

                    <button type="submit" class="btn btn-primary py-3 w-100 mb-4">Update Data</button>
                </form>
                {{-- form end --}}
            </div>
        </div>
    </div>
</div>
@endsection
