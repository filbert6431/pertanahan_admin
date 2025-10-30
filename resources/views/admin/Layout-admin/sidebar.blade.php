<div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-secondary navbar-dark">
                <a href="{{ url('/index') }}" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>DarkPan</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src= "{{ asset('asset-admin/img/user.jpg') }}" alt="profile user"
                            style="width: 40px; height: 40px;">
                        <div
                            class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1">
                        </div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0">Jhon Doe</h6>
                        <span>Admin</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="{{ route('dashboard')}}"class="nav-item nav-link active"><i
                            class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                                class="fa fa-laptop me-2"></i>Elements</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="{{ url('/button') }}" class="dropdown-item">Buttons</a>
                            <a href="{{ url('/typography') }}" class="dropdown-item">Typography</a>
                            <a href="{{ url('/element') }}" class="dropdown-item">Other Elements</a>
                        </div>
                    </div>
                    <a href="{{ url('/widget') }}" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Widgets</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                                class="far fa-file-alt me-2"></i>Form</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="{{ route('admin.index') }}" class="dropdown-item">Login</a>
                            <a href="{{ route('warga.index') }}" class="dropdown-item">Tambah Warga</a>
                            <a href="{{ route('persil.index') }}" class="dropdown-item">Tambah persil</a>
                        </div>
                    </div>

                    <a href="{{ url('/table') }}" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Tables</a>
                    <a href="{{ url('/chart') }}" class="nav-item nav-link"><i
                            class="fa fa-chart-bar me-2"></i>Charts</a>
                                                <a href="javascript:void(0)" onclick="document.getElementById('logout-form').submit();" class="nav-link">
    <i class="fa fa-sign-out-alt me-2"></i>Logout
</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                                class="far fa-file-alt me-2"></i>Pages</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="{{ url('/404') }}" class="dropdown-item">404 Error</a>
                            <a href="{{ url('/blank') }}" class="dropdown-item">Blank Page</a>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
