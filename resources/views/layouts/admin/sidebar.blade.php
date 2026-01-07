<div class="sidebar position-fixed h-100" style="
    width: 280px !important;
    z-index: 1000;
    left: 0;
    top: 0;
    background: linear-gradient(180deg, #0c0c0c 0%, #1a1a1a 100%);
    box-shadow: 5px 0 25px rgba(255, 0, 0, 0.15),
                inset -1px 0 0 rgba(255, 255, 255, 0.05);
    border-right: 1px solid rgba(255, 0, 0, 0.1);
">
    <nav class="navbar navbar-dark h-100 d-flex flex-column" style="
        padding: 20px 0;
        background: transparent !important;
    ">
        <!-- Header Logo -->
        <div class="px-4 mb-4">
            <a href="{{ url('/dashboard') }}" class="navbar-brand d-flex align-items-center gap-3">
                <div class="logo-container" style="
                    width: 50px;
                    height: 50px;
                    background: linear-gradient(135deg, #ff0000 0%, #990000 100%);
                    border-radius: 12px;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    box-shadow: 0 4px 15px rgba(255, 0, 0, 0.3),
                                inset 0 1px 0 rgba(255, 255, 255, 0.2);
                ">
                    <img src="{{ asset('asset-admin/img/logo.png') }}"
                         style="width: 30px; height: 30px; filter: brightness(1.2);"
                         alt="Logo Admin Persil">
                </div>
                <div>
                    <h5 class="mb-0" style="
                        background: linear-gradient(135deg, #ff4d4d 0%, #ff0000 100%);
                        -webkit-background-clip: text;
                        -webkit-text-fill-color: transparent;
                        background-clip: text;
                        font-weight: 700;
                        font-size: 1.3rem;
                        text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
                    ">Admin Persil</h5>
                    <small style="color: #888; font-size: 0.8rem;">Management System</small>
                </div>
            </a>
        </div>

        <!-- User Profile -->
        <div class="px-4 mb-5">
            <div class="user-card p-3 rounded" style="
                background: rgba(255, 255, 255, 0.03);
                border: 1px solid rgba(255, 0, 0, 0.15);
                box-shadow: 0 4px 12px rgba(0, 0, 0, 0.25);
                transition: all 0.3s ease;
            ">
                <div class="d-flex align-items-center">
                    <div class="position-relative">
                        <img class="rounded-circle" src="{{ asset('asset-admin/img/user.jpg') }}"
                             alt="profile user"
                             style="width: 50px; height: 50px;
                                    border: 2px solid rgba(255, 0, 0, 0.3);
                                    box-shadow: 0 4px 12px rgba(255, 0, 0, 0.2);
                                    object-fit: cover;">
                        <div class="position-absolute end-0 bottom-0 p-1 bg-danger rounded-circle"
                             style="
                                border: 2px solid #1a1a1a;
                                box-shadow: 0 0 10px rgba(255, 0, 0, 0.5);
                             ">
                        </div>
                    </div>

                    @if (Auth::check())
                        <div class="ms-3" style="flex: 1; min-width: 0;">
                            <h6 class="mb-0 text-white" style="
                                font-weight: 600;
                                font-size: 0.95rem;
                                white-space: nowrap;
                                overflow: hidden;
                                text-overflow: ellipsis;
                                text-shadow: 0 1px 2px rgba(0, 0, 0, 0.5);
                            ">{{ auth()->user()->name }}</h6>

                            <div class="d-flex align-items-center mt-1">
                                <small style="color: #aaa; font-size: 0.8rem;">
                                    <i class="fas fa-sign-in-alt me-1"></i>
                                    {{ session('last_login') }}
                                </small>
                            </div>

                            <span class="badge mt-2" style="
                                background: linear-gradient(135deg, #ff3333 0%, #cc0000 100%);
                                color: white;
                                font-size: 0.7rem;
                                padding: 3px 10px;
                                border-radius: 20px;
                                font-weight: 600;
                                letter-spacing: 0.5px;
                                box-shadow: 0 2px 8px rgba(255, 0, 0, 0.2);
                            ">
                                <i class="fas fa-user-shield me-1"></i> ADMIN
                            </span>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Navigation Menu -->
        <div class="navbar-nav w-100 flex-grow-1" style="padding: 0 15px;">
            <!-- Dashboard -->
            <a href="{{ route('dashboard') }}" class="nav-item nav-link mb-2 rounded position-relative" style="
                padding: 12px 15px !important;
                background: rgba(255, 0, 0, 0.1);
                border-left: 4px solid #ff0000;
                color: #ff6666;
                transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            ">
                <div class="d-flex align-items-center">
                    <div style="
                        width: 30px;
                        height: 30px;
                        background: rgba(255, 0, 0, 0.2);
                        border-radius: 8px;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        margin-right: 12px;
                    ">
                        <i class="fa fa-tachometer-alt" style="color: #ff4d4d;"></i>
                    </div>
                    <span style="font-weight: 500;">Dashboard</span>
                </div>
                <div class="active-indicator" style="
                    position: absolute;
                    right: 15px;
                    top: 50%;
                    transform: translateY(-50%);
                    width: 8px;
                    height: 8px;
                    background: #ff0000;
                    border-radius: 50%;
                    box-shadow: 0 0 10px #ff0000;
                "></div>
            </a>

            <!-- Form Dropdown -->
            <div class="nav-item dropdown mb-2">
                <a href="#" class="nav-link dropdown-toggle rounded d-flex align-items-center justify-content-between"
                   data-bs-toggle="dropdown" style="
                    padding: 12px 15px !important;
                    color: #ccc;
                    border-left: 4px solid transparent;
                    transition: all 0.3s ease;
                ">
                    <div class="d-flex align-items-center">
                        <div style="
                            width: 30px;
                            height: 30px;
                            background: rgba(255, 255, 255, 0.05);
                            border-radius: 8px;
                            display: flex;
                            align-items: center;
                            justify-content: center;
                            margin-right: 12px;
                        ">
                            <i class="far fa-file-alt" style="color: #ff6666;"></i>
                        </div>
                        <span style="font-weight: 500;">Form Management</span>
                    </div>
                    <i class="fas fa-chevron-down" style="font-size: 0.8rem; color: #666;"></i>
                </a>
                <div class="dropdown-menu bg-dark border-0 rounded mt-2 p-2" style="
                    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
                    border: 1px solid rgba(255, 0, 0, 0.2);
                    min-width: 220px;
                    margin-left: 46px;
                ">
                    <a href="{{ route('user.index') }}" class="dropdown-item d-flex align-items-center py-3 px-3 rounded mb-1" style="
                        color: #ddd;
                        transition: all 0.2s ease;
                        border-left: 3px solid transparent;
                    ">
                        <i class="fas fa-user-cog me-3" style="color: #ff6666;"></i>
                        <div>
                            <div style="font-weight: 500;">Admin</div>
                            <small style="color: #888; font-size: 0.8rem;">Manage administrators</small>
                        </div>
                    </a>
                    <a href="{{ route('warga.index') }}" class="dropdown-item d-flex align-items-center py-3 px-3 rounded mb-1" style="
                        color: #ddd;
                        transition: all 0.2s ease;
                        border-left: 3px solid transparent;
                    ">
                        <i class="fas fa-users me-3" style="color: #ff6666;"></i>
                        <div>
                            <div style="font-weight: 500;">Warga</div>
                            <small style="color: #888; font-size: 0.8rem;">Manage residents</small>
                        </div>
                    </a>
                    <a href="{{ route('persil.index') }}" class="dropdown-item d-flex align-items-center py-3 px-3 rounded" style="
                        color: #ddd;
                        transition: all 0.2s ease;
                        border-left: 3px solid transparent;
                    ">
                        <i class="fas fa-map me-3" style="color: #ff6666;"></i>
                        <div>
                            <div style="font-weight: 500;">Persil</div>
                            <small style="color: #888; font-size: 0.8rem;">Land management</small>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Pencipta -->
            <a href="{{ route('identitas') }}" class="nav-item nav-link mb-2 rounded" style="
                padding: 12px 15px !important;
                color: #ccc;
                border-left: 4px solid transparent;
                transition: all 0.3s ease;
            ">
                <div class="d-flex align-items-center">
                    <div style="
                        width: 30px;
                        height: 30px;
                        background: rgba(255, 255, 255, 0.05);
                        border-radius: 8px;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        margin-right: 12px;
                    ">
                        <i class="fa fa-user" style="color: #ff6666;"></i>
                    </div>
                    <span style="font-weight: 500;">Pencipta</span>
                </div>
            </a>

            <!-- Logout -->
            <div class="mt-auto px-3">
                <a href="{{ route('auth.logout') }}" class="nav-link rounded d-flex align-items-center" style="
                    padding: 12px 15px !important;
                    background: rgba(255, 0, 0, 0.15);
                    border: 1px solid rgba(255, 0, 0, 0.3);
                    color: #ff6666;
                    transition: all 0.3s ease;
                ">
                    <div style="
                        width: 30px;
                        height: 30px;
                        background: rgba(255, 0, 0, 0.2);
                        border-radius: 8px;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        margin-right: 12px;
                    ">
                        <i class="fa fa-sign-out-alt"></i>
                    </div>
                    <span style="font-weight: 500;">Logout</span>
                </a>
            </div>
        </div>
    </nav>
</div>

<style>
    /* Reset Bootstrap nav-link padding */
    .navbar-nav .nav-link {
        padding: 0 !important;
    }

    /* Hover Effects */
    .nav-link:not(.active):hover {
        background: rgba(255, 0, 0, 0.08) !important;
        border-left: 4px solid #ff3333 !important;
        color: #ff9999 !important;
        transform: translateX(5px);
        box-shadow: 0 5px 15px rgba(255, 0, 0, 0.1);
    }

    .user-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(255, 0, 0, 0.2) !important;
        border-color: rgba(255, 0, 0, 0.3) !important;
    }

    /* Dropdown Hover Effects */
    .dropdown-item:hover {
        background: rgba(255, 0, 0, 0.1) !important;
        border-left: 3px solid #ff0000 !important;
        color: #ff9999 !important;
        padding-left: 20px !important;
        transform: translateX(3px);
    }

    /* Active State for non-Dashboard items */
    .nav-link.active {
        background: rgba(255, 0, 0, 0.15) !important;
        border-left: 4px solid #ff0000 !important;
        color: #ff9999 !important;
        box-shadow: 0 5px 15px rgba(255, 0, 0, 0.2);
    }

    /* Smooth transitions */
    * {
        transition: background-color 0.3s ease,
                    border-color 0.3s ease,
                    box-shadow 0.3s ease,
                    transform 0.3s ease;
    }

    /* HAPUS INI - tidak perlu padding-left di body */
    /* body {
        padding-left: 280px !important;
    } */

    /* Sebagai gantinya, tambahkan margin atau padding ke konten utama */
    .main-content {
        margin-left: 280px;
        padding: 20px;
        min-height: 100vh;
        background: #f8f9fa;
    }

    /* Responsive adjustment */
    @media (max-width: 768px) {
        .sidebar {
            width: 250px !important;
            transform: translateX(-100%);
        }

        .main-content {
            margin-left: 0;
            padding: 15px;
        }

        .sidebar.active {
            transform: translateX(0);
        }
    }
</style>
