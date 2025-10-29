@extends('admin.Layout-admin.app')

@section('content')
    <!-- Form Tambah Persil Start -->
    <div class="container-fluid">
        <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
            <div class="col-12 col-md-10 col-lg-8 col-xl-9">
                <div class="bg-secondary rounded p-4 p-sm-5 my-4 mx-3 shadow-lg">

                    <!-- Header -->
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <a href="{{ url('/index') }}" class="text-decoration-none">
                        </a>
                        <h3 class="mb-0">Buat Data Persil</h3>
                    </div>

                    {{-- Form Start --}}
                    <form action="{{ route('persil.store') }}" method="POST">
                        @csrf

                        {{-- Kode Persil --}}
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control bg-dark" id="kode_persil" name="kode_persil"
                                placeholder="Kode Persil" required>
                            <label for="kode_persil">Kode Persil</label>
                        </div>


                        <div class="mb-3">
                            <label for="pemilik_warga_id" class="form-label">Pemilik</label>
                            <select name="pemilik_warga_id" id="pemilik_warga_id" class="form-select" required>
                                <option value="">-- Pilih Pemilik --</option>
                                @foreach ($wargaList as $warga)
                                    <option value="{{ $warga->warga_id }}">{{ $warga->nama }}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="form-floating mb-3">
                            <input type="number" step="0.01" class="form-control bg-dark" id="luas_m2" name="luas_m2"
                                placeholder="Luas (m²)" required>
                            <label for="luas_m2">Luas (m²)</label>
                        </div>


                        <div class="form-floating mb-3">
                            <input type="text" class="form-control bg-dark" id="penggunaan" name="penggunaan"
                                placeholder="Penggunaan Lahan" required>
                            <label for="penggunaan">Penggunaan Lahan</label>
                        </div>


                        <div class="form-floating mb-3">
                            <textarea class="form-control bg-dark" id="alamat_lahan" name="alamat_lahan" style="height: 100px" required></textarea>
                            <label for="alamat_lahan">Alamat Lahan</label>
                        </div>


                        <div class="form-floating mb-3">
                            <input type="text" class="form-control bg-dark" id="rt" name="rt"
                                placeholder="RT" required>
                            <label for="rt">RT</label>
                        </div>


                        <div class="form-floating mb-3">
                            <input type="text" class="form-control bg-dark" id="rw" name="rw"
                                placeholder="RW" required>
                            <label for="rw">RW</label>
                        </div>


                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary py-3 w-100 mb-4">Simpan Data Persil</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <!-- Form Tambah Persil End -->
@endsection
