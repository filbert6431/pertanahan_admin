<!--

=========================================================
* Volt Pro - Premium Bootstrap 5 Dashboard
=========================================================

* Product Page: https://themesberg.com/product/admin-dashboard/volt-bootstrap-5-dashboard
* Copyright 2021 Themesberg (https://www.themesberg.com)
* License (https://themesberg.com/licensing)

* Designed and coded by https://themesberg.com

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. Please contact us to request a removal.

-->
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- start css -->
    @include('admin.Layout-admin.css')
    <!-- end css -->
</head>

<body>
    {{-- start sidebar --}}
    @include('admin.layout-admin.sidebar')
    {{-- end sidebar --}}


    <main class="content">
        {{-- start header --}}
        @include('admin.layout-admin.header')
        {{-- end header --}}


        {{-- start main content --}}
        @yield('content')
        {{-- end main content --}}
        {{-- start js --}}
        <!-- Core -->

        {{-- start footer  --}}
        @include('admin.layout-admin.footer')
    </main>
    <!-- end footer -->

    @include('admin.layout-admin.js')
    {{-- end js --}}
</body>

</html>
