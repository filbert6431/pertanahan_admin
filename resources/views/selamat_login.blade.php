<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Terima Kasih</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    /* 🌼 Warna creamy & soft brown agar konsisten dengan halaman login */
    body {
      background-color: #f8f5f0;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      color: #4a3f35;
    }

    .thankyou-container {
      max-width: 700px;
      margin: 80px auto;
      padding: 40px;
      background-color: #fffdf9;
      border-radius: 16px;
      box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08);
      text-align: center;
      animation: fadeIn 0.6s ease-in-out;
    }

    h2 {
      color: #a9834f; /* warm brown accent */
      font-weight: 700;
    }

    .lead {
      color: #5c5246;
      font-size: 1.1rem;
    }

    .btn-primary {
      background-color: #b7935f;
      border: none;
      border-radius: 10px;
      padding: 10px 24px;
      font-weight: 600;
      transition: all 0.2s ease;
    }

    .btn-primary:hover {
      background-color: #a9834f;
      transform: translateY(-1px);
    }

    blockquote {
      font-size: 1.05rem;
      margin-top: 25px;
      background-color: #f5efe7;
      border-left: 5px solid #b7935f;
      padding: 16px 20px;
      border-radius: 8px;
      color: #4a3f35;
      font-style: italic;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(10px); }
      to { opacity: 1; transform: translateY(0); }
    }
  </style>
</head>
<body>

  <div class="thankyou-container">
    <h2>Terima Kasih, {{ $nama }} 🎉</h2>
    <p class="lead">Anda telah berhasil melakukan login.</p>

    <blockquote>
      "Selamat datang kembali! Semoga harimu menyenangkan dan penuh semangat 🌿"
    </blockquote>

    <a href="{{ url('/') }}" class="btn btn-primary mt-4">Kembali ke Beranda</a>
  </div>

</body>
</html>
