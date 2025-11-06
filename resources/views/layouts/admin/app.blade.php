<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.admin.css')
</head>
<body>
    <div class="d-flex">
        {{-- Sidebar kiri --}}
        @include('layouts.admin.sidebar')

        {{-- Konten utama --}}
        <div class="content flex-grow-1 ">
            <main class="p-4">
                @yield('content')
            </main>

            {{-- Footer --}}
            @include('layouts.admin.footer')
        </div>
    </div>

    @include('layouts.admin.js')
</body>
</html>
