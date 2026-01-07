<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.admin.css')
    <style>
        /* RESET COMPLETE */
        body, html {
            margin: 0 !important;
            padding: 0 !important;
            overflow-x: hidden !important;
        }

        /* Sidebar tetap di kiri */
        .sidebar {
            position: fixed !important;
            left: 0 !important;
            top: 0 !important;
            height: 100vh !important;
            width: 280px !important;
            z-index: 1000 !important;
        }

        /* Konten utama - HANYA INI YANG PUNYA MARGIN LEFT */
        .main-content-wrapper {
            margin-left: 280px !important;
            width: calc(100% - 280px) !important;
            min-height: 100vh;
            background: linear-gradient(135deg, #0a0a0a 0%, #1a1a1a 100%);
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    @include('layouts.admin.sidebar')

    <!-- Main Content - HANYA SATU INI -->
    <div class="main-content-wrapper">
        @yield('content')
    </div>

    @include('layouts.admin.js')
</body>
</html>
