<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Login</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    {{-- start css --}}
    @include('layouts.admin.css')
    {{-- end css --}}

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            height: 100vh;
            margin: 0;
            background-color: #121212;
            display: flex;
            overflow: hidden;
            font-family: 'Poppins', sans-serif;
        }

        /* Kiri */
        .welcome-section {
            flex: 1;
            background: linear-gradient(135deg, #2c3e50, #d91010);
            color: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            padding: 3rem;
        }

        .welcome-section h4 {
            font-size: 2.2rem;
            margin-bottom: 1rem;
        }

        .welcome-section p {
            max-width: 420px;
            font-size: 1.05rem;
            color: #e0e0e0;
        }

        /* Kanan */
        .login-section {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #1a1a1a;
            padding: 3rem;
        }

        .login-form {
            width: 100%;
            max-width: 500px;
            color: white;
        }

        .login-form h3 {
            color: #ff0a0a;
            font-weight: 600;
            margin-bottom: 1rem;
        }

        .login-form h5 {
            color: #ccc;
            margin-bottom: 2rem;
        }

        .form-control {
            background-color: #2a2a2a;
            border: 1px solid #444;
            color: white;
            font-size: 1.1rem;
            height: 60px;
        }

        .form-control:focus {
            background-color: #333;
            border-color: #ff2a2a;
            box-shadow: 0 0 10px #ff2a2a50;
        }

        .btn-primary {
            background-color: #fc0202;
            border: none;
            font-size: 1.2rem;
            padding: 0.9rem;
        }

        .btn-primary:hover {
            background-color: #a30808;
        }

        .alert {
            background-color: #ff2a2a20;
            border-left: 5px solid #ff2a2a;
            padding: 15px;
            color: #ffbaba;
            margin-bottom: 20px;
            border-radius: 6px;
            font-size: 0.95rem;
        }

        .text-info {
            color: #ff2a2a !important;
        }

        .text-info:hover {
            text-decoration: underline;
        }

        @media (max-width: 900px) {
            body {
                flex-direction: column;
            }

            .welcome-section {
                flex: 0.7;
                padding: 2rem;
            }

            .login-section {
                flex: 1.3;
                padding: 2rem;
            }
        }
    </style>
</head>

<body>

    <div class="welcome-section">
        <i class="fa fa-leaf fa-3x text-success mb-3"></i>
        <h4>Welcome to Admin Panel</h4>
        <p>Manage your system efficiently with our secure login. Access your dashboard and explore the features designed for administrators.</p>
        <p class="text-muted">Tip: Use a strong password for better security.</p>
    </div>

    <div class="login-section">
        <form action="{{ url('/auth/proses-login') }}" method="POST" class="login-form">
            @csrf

            <div class="d-flex align-items-center justify-content-between mb-4">
                <h3><i class="fa fa-user-edit me-2"></i>Admin</h3>
                <h5>Sign In</h5>
            </div>

            {{-- ✅ tampilkan error dari session --}}
            @if (session('error'))
                <div class="alert">
                    <i class="fa fa-exclamation-triangle me-2"></i>{{ session('error') }}
                </div>
            @endif

            {{-- ✅ tampilkan error validasi --}}
            @if ($errors->any())
                <div class="alert">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="form-floating mb-4">
                <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com" value="{{ old('email') }}">
                <label for="email">Email address</label>
            </div>

            <div class="form-floating mb-5">
                <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                <label for="password">Password</label>
            </div>

            <button type="submit" class="btn btn-primary w-100 mb-3">Sign In</button>
            <p class="text-center mb-0 text-white">Don't have an Account? <a href="{{url('/auth/register-akun')}}" class="text-info">Sign Up</a></p>
        </form>
    </div>

    @include('layouts.admin.js')

</body>
</html>
