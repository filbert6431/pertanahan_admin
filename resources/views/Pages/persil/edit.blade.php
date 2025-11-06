
@extends('Layout-admin.app')

@section('content')
<!-- Form Edit Persil Start -->
<div class="container-fluid">
    <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
        <div class="col-12 col-md-10 col-lg-8 col-xl-9">
            <div class="bg-secondary rounded p-4 p-sm-5 my-4 mx-3 shadow-lg">

                <!-- Header -->
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <a href="{{ route('persil.index') }}" class="text-decoration-none">
                        <h3 class="text-primary">< Kembali</h3>
                    </a>
                    <h3 class="mb-0">Edit Data Persil</h3>
                </div>

                // {{-- Form Start --}}
                <form action="{{ route('persil.update', $persil->persil_id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    // {{-- Kode Persil --}}
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control bg-dark" id="kode_persil"
                               name="kode_persil" value="{{ $persil->kode_persil }}" required>
                        <label for="kode_persil">Kode Persil</label>
                    </div>

                    // {{-- Pemilik Warga --}}
                    <div class="form-floating mb-3">
                        <select class="form-select bg-dark" id="pemilik_warga_id" name="pemilik_warga_id" required>
                            <option value="">Pilih Pemilik</option>
                            @foreach($wargas as $warga)
                                <option value="{{ $warga->warga_id }}"
                                    {{ $persil->pemilik_warga_id == $warga->warga_id ? 'selected' : '' }}>
                                    {{ $warga->nama }}
                                </option>
                            @endforeach
                        </select>
                        <label for="pemilik_warga_id">Pemilik Lahan</label>
                    </div>

                    // {{-- Luas m2 --}}
                    <div class="form-floating mb-3">
                        <input type="number" step="0.01" class="form-control bg-dark" id="luas_m2"
                               name="luas_m2" value="{{ $persil->luas_m2 }}" required>
                        <label for="luas_m2">Luas (m²)</label>
                    </div>

                    // {{-- Penggunaan --}}
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control bg-dark" id="penggunaan"
                               name="penggunaan" value="{{ $persil->penggunaan }}" required>
                        <label for="penggunaan">Penggunaan Lahan</label>
                    </div>

                    // {{-- Alamat Lahan --}}
                    <div class="form-floating mb-3">
                        <textarea class="form-control bg-dark" id="alamat_lahan"
                                  name="alamat_lahan" style="height: 100px" required>{{ $persil->alamat_lahan }}</textarea>
                        <label for="alamat_lahan">Alamat Lahan</label>
                    </div>

                    // {{-- RT --}}
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control bg-dark" id="rt"
                               name="rt" value="{{ $persil->rt }}" required>
                        <label for="rt">RT</label>
                    </div>

                    // {{-- RW --}}
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control bg-dark" id="rw"
                               name="rw" value="{{ $persil->rw }}" required>
                        <label for="rw">RW</label>
                    </div>

                    // {{-- Submit Button --}}
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary py-3 w-100 mb-4">Update Data Persil</button>
                    </div>
                </form>
                // {{-- Form End --}}
            </div>
        </div>
    </div>
</div>
<!-- Form Edit Persil End -->
@endsection
