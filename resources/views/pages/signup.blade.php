<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- start css --}}
    @include('layouts.admin.css')
    {{-- end css --}}

    <style>
        /* Reset dan setup dasar */
        * {
            box-sizing: border-box;
        }

        body {
            height: 100vh;
            margin: 0;
            display: flex;
            overflow: hidden;
            background-color: #121212;
            font-family: 'Poppins', sans-serif;
        }

        /* Container utama: kiri dan kanan */
        .split-container {
            display: flex;
            height: 100vh;
            width: 100%;
        }

        /* Bagian kiri (welcome) */
        .welcome-section {
            flex: 0.9;
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
            font-size: 2rem;
            margin-bottom: 1rem;
        }

        .welcome-section p {
            max-width: 400px;
            font-size: 1rem;
            color: #e0e0e0;
        }

        .welcome-section a {
            color: #fff;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .welcome-section a:hover {
            color: #ffb3b3;
        }

        /* Bagian kanan (form register) */
        .register-section {
            flex: 1.1;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #1a1a1a;
            padding: 3rem;
        }

        .register-card {
            background-color: #1e1e1e;
            border-radius: 15px;
            padding: 3rem;
            width: 100%;
            max-width: 700px;
            height: 90vh;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.5);
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .register-card h3 {
            color: #ff0a0a;
            font-weight: 600;
            margin-bottom: 2rem;
        }

        /* Input */
        .form-control {
            height: 55px;
            font-size: 1rem;
            background-color: #2a2a2a;
            border: 1px solid #444;
            color: white;
        }

        .form-control:focus {
            background-color: #333;
            border-color: #ff2a2a;
            box-shadow: 0 0 8px #ff2a2a50;
        }

        /* Tombol utama */
        .btn-primary {
            background-color: #fc0202;
            border: none;
            font-size: 1.1rem;
            font-weight: 500;
            transition: 0.3s;
            padding: 0.9rem;
        }

        .btn-primary:hover {
            background-color: #a30808;
            transform: translateY(-1px);
        }

        /* Link di bawah form */
        .text-info {
            color: #ff2a2a !important;
        }

        .text-info:hover {
            text-decoration: underline;
        }

        /* Responsif untuk HP */
        @media (max-width: 900px) {
            body {
                flex-direction: column;
            }

            .welcome-section {
                flex: none;
                height: 35vh;
                padding: 2rem;
            }

            .register-section {
                flex: none;
                height: 65vh;
                padding: 2rem;
            }

            .register-card {
                height: auto;
                padding: 2rem;
            }
        }
    </style>
</head>

<body>
    <div class="split-container">
        <!-- Bagian Kiri -->
        <div class="welcome-section">
            <i class="fa fa-seedling fa-3x text-success mb-3"></i>
            <h4>Join the Admin Panel</h4>
            <p>Register to gain access to the administrative dashboard and manage data securely.</p>
            <p class="text-muted">
                Already have an account?
                <a href="{{ url('/auth/form_login') }}" class="text-info">Sign In</a>
            </p>
        </div>

        <!-- Bagian Kanan -->
        <div class="register-section">
            <div class="register-card">
                <div class="text-center mb-4">
                    <h3><i class="fa fa-user-plus me-2"></i> Create Account</h3>
                </div>

                <form action="{{ route('admin.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <div class="form-floating">
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                                <label for="email">Email</label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div class="form-floating">
                                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                                <label for="password">Password</label>
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="form-floating">
                                <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm Password" required>
                                <label for="confirm_password">Confirm Password</label>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary py-3 w-100 mb-3">Register</button>

                    <p class="text-center mb-0 text-white">
                        Already have an account?
                        <a href="{{ url('/auth/form_login') }}" class="text-info">Sign In</a>
                    </p>
                </form>
            </div>
        </div>
    </div>

    {{-- start js --}}
    @include('layouts.admin.js')
    {{-- end js --}}
</body>

</html>
