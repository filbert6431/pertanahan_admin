<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Admin</title>
    <style>
        /* Reset dasar */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background: linear-gradient(135deg, #74ABE2, #5563DE);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-container {
            background: #fff;
            padding: 40px 35px;
            border-radius: 12px;
            box-shadow: 0px 8px 25px rgba(0, 0, 0, 0.2);
            width: 360px;
            text-align: center;
        }

        h1 {
            margin-bottom: 25px;
            color: #333;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        label {
            text-align: left;
            font-weight: 600;
            color: #444;
        }

        input {
            padding: 10px 12px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 14px;
            transition: all 0.3s;
        }

        input:focus {
            border-color: #5563DE;
            outline: none;
            box-shadow: 0 0 5px rgba(85, 99, 222, 0.5);
        }

        button {
            background: #5563DE;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 8px;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s;
        }

        button:hover {
            background: #3f4ac9;
        }

        ul {
            color: #b00020;
            text-align: left;
            margin-bottom: 10px;
            list-style: disc;
            padding-left: 20px;
        }

        .footer {
            margin-top: 20px;
            font-size: 13px;
            color: #777;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h1>Admin Login</h1>

        {{-- Tampilkan error jika ada --}}
        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <form method="POST" action="{{ url('/auth/proses-login') }}">
            @csrf

            <div>
                <label for="email">Email</label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    value="{{ old('email') }}"
                    required
                    autofocus
                >
            </div>

            <div>
                <label for="password">Password</label>
                <input
                    type="password"
                    id="password"
                    name="password"
                    required
                >
            </div>

            <button type="submit">Login</button>
        </form>

        <div class="footer">
            &copy; {{ date('Y') }} Admin Panel
        </div>
    </div>
</body>
</html>
