@extends('admin.Layout-admin.app')

@section('content')
<!-- Sign In Start -->
<div class="container-fluid">
    <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
        <!-- Buat kolom lebih lebar -->
        <div class="col-12 col-md-10 col-lg-8 col-xl-9">
            <div class="bg-secondary rounded p-4 p-sm-5 my-4 mx-3 shadow-lg">
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <a href="{{ url('/index') }}">
                        <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>DarkPan</h3>
                    </a>
                    <h3>Buat akun</h3>
                </div>

                {{-- form start --}}
                <form action="{{ route('admin.store') }}" method="POST">
                    @csrf

                    {{-- nama --}}
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="name" id="Name" placeholder="Firman">
                        <label for="Name">Nama</label>
                    </div>

                    {{-- email --}}
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" name="email" id="Email" placeholder="name@example.com">
                        <label for="Email">Email address</label>
                    </div>

                    {{-- password --}}
                    <div class="form-floating mb-4">
                        <input type="password" class="form-control" name="password" id="Password" placeholder="Password">
                        <label for="Password">Password</label>
                    </div>

                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Check me out</label>
                        </div>
                        <a href="#">Forgot Password</a>
                    </div>

                    <button type="submit" class="btn btn-primary py-3 w-100 mb-4">Sign up</button>
                </form>
                {{-- form end --}}
            </div>
        </div>
    </div>
</div>
<!-- Sign In End -->
@endsection
