<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Halaman Login</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      background-color: #f9f5f0; /* warna creamy lembut */
      font-family: "Inter", "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .login-container {
      background-color: #fffaf5; /* warna cream lebih terang */
      border: 1px solid #e3dcd5;
      border-radius: 12px;
      padding: 40px;
      width: 380px;
      box-shadow: 0 6px 20px rgba(0, 0, 0, 0.08);
    }

    .login-header {
      text-align: center;
      margin-bottom: 25px;
    }

    .login-header h3 {
      font-weight: 700;
      color: #4b3f35;
    }

    label {
      color: #5c5045;
      font-weight: 500;
    }

    .form-control {
      border-radius: 8px;
      border: 1px solid #d6cfc7;
      background-color: #fffdfb;
    }

    .form-control:focus {
      border-color: #c6a984;
      box-shadow: 0 0 0 0.15rem rgba(198, 169, 132, 0.25);
    }

    .btn-login {
      background-color: #c6a984;
      border: none;
      width: 100%;
      font-weight: 600;
      color: white;
      transition: 0.2s;
    }

    .btn-login:hover {
      background-color: #b28e6c;
    }

    .alert-danger {
      background-color: #fff0ec;
      border-color: #f1c5b2;
      color: #7a3a27;
      border-radius: 8px;
      font-size: 0.9rem;
    }

    .footer-note {
      text-align: center;
      margin-top: 20px;
      font-size: 0.9rem;
      color: #7e7367;
    }

    .footer-note a {
      color: #b28e6c;
      text-decoration: none;
      font-weight: 500;
    }

    .footer-note a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <div class="login-container">
    <div class="login-header">
      <h3>Masuk ke Akun Anda</h3>
      <p style="color:#8b7d6f; font-size:0.95rem;">Selamat datang kembali 👋</p>
    </div>

    {{-- tampilkan daftar error umum --}}


    <form action="{{ route('login-siap') }}" method="POST">
      @csrf

      <div class="mb-3">
        <label for="nama" class="form-label">Nama</label>
        <input type="text" id="nama" name="nama" class="form-control" value="{{ old('nama') }}">
        @error('nama')
          <div class="text-danger small mt-1">{{ $message }}</div>
        @enderror
      </div>

      <div class="mb-3">
        <label for="pass" class="form-label">Password</label>
        <input type="password" id="pass" name="password" class="form-control"value="{{ old('password') }}">
        @error('password')
          <div class="text-danger small mt-1">{{ $message }}</div>
        @enderror
      </div>

      <button type="submit" class="btn btn-login mt-2">Login</button>

        @if ($errors->any())
      <div class="alert alert-danger">
        <ul class="mb-0">
          @foreach ($errors->all() as $err)
            <li>{{ $err }}</li>
          @endforeach
        </ul>
      </div>
    @endif
    </form>

    <div class="footer-note">
      Belum punya akun? <a href="#">Daftar di sini</a>
    </div>
  </div>
</body>
</html>
