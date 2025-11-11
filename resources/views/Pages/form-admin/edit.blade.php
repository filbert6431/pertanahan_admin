@extends('layouts.admin.app')

@section('content')
<div class="container-fluid">
    <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
        <div class="col-12 col-md-10 col-lg-8 col-xl-9">
            <div class="bg-secondary rounded p-4 p-sm-5 my-4 mx-3 shadow-lg">
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <a href="{{ route('admin.index') }}">
                        <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>Data admin</h3>
                    </a>
                    <h3>Update Data admin</h3>
                </div>

                {{-- form start --}}
                <form action="{{ route('admin.update', $dataAdmin->admin_id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    {{-- Nama --}}
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="name" id="Name"
                            value="{{ old('name', $dataAdmin->name) }}" placeholder="Nama Warga" required>
                        <label for="Nama">Nama Lengkap</label>
                    </div>

                    {{-- Email --}}
                    <div class="form-floating mb-4">
                        <input type="email" class="form-control" name="email" id="Email"
                            value="{{ old('email', $dataAdmin->email) }}" placeholder="Email" required>
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
