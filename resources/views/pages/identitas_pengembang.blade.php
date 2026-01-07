@extends('layouts.admin.app')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

@section('content')
    <div class="container-fluid px-4">
        {{-- Header Section --}}
        <div class="d-flex align-items-center py-4 mb-4">
            <div
                style="
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, #ff0000 0%, #990000 100%);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
            box-shadow: 0 4px 15px rgba(255, 0, 0, 0.2);
        ">
                <i class="fas fa-code text-white" style="font-size: 1.3rem;"></i>
            </div>
            <div class="flex-grow-1">
                <h1 class="h3 mb-1"
                    style="
                background: linear-gradient(135deg, #ff4d4d 0%, #ff0000 100%);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
                background-clip: text;
                font-weight: 700;
            ">
                    Developer Profile
                </h1>
                <p class="mb-0 text-light opacity-75">
                    <i class="fas fa-user-tie me-1"></i> Get to know the developer behind this application
                </p>
            </div>
        </div>

        {{-- Main Card --}}
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12">
                <div class="card border-0 shadow-lg"
                    style="
                background: rgba(255, 255, 255, 0.03);
                border-radius: 20px;
                border: 1px solid rgba(255, 0, 0, 0.1);
                backdrop-filter: blur(10px);
                overflow: hidden;
            ">
                    {{-- Card Header --}}
                    <div class="card-header border-0"
                        style="
                    background: linear-gradient(90deg, rgba(255,0,0,0.1) 0%, rgba(255,0,0,0.05) 100%);
                    border-bottom: 1px solid rgba(255, 0, 0, 0.1);
                    padding: 25px 30px;
                ">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <h4 class="mb-1 text-light">
                                    <i class="fas fa-user-circle me-2 text-danger"></i>
                                    Developer Identity
                                </h4>
                                <p class="mb-0 text-light opacity-75" style="font-size: 0.9rem;">
                                    Information about the creator of this application
                                </p>
                            </div>
                            <div class="badge rounded-pill"
                                style="
                            background: linear-gradient(135deg, #ff3333 0%, #cc0000 100%);
                            color: white;
                            padding: 8px 16px;
                            font-size: 0.85rem;
                        ">
                                <i class="fas fa-laptop-code me-1"></i>
                                Full Stack Developer
                            </div>
                        </div>
                    </div>

                    <div class="card-body p-4 p-md-5">
                        {{-- Profile Section --}}
                        <div class="row align-items-center mb-5 pb-4 border-bottom border-secondary">
                            <div class="col-md-4 col-lg-3 text-center">
                                {{-- Profile Photo --}}
                                <div class="position-relative d-inline-block">
                                    <img src="{{ asset('asset-admin/img/pengembang1.JPG') }}"
                                        class="rounded-circle border border-danger shadow-lg" width="180" height="180"
                                        style="object-fit: cover; border-width: 4px !important;" alt="Developer Photo">
                                    <div
                                        class="position-absolute bottom-0 end-0 bg-danger rounded-circle p-2 border border-3 border-dark">
                                        <i class="fas fa-check text-white"></i>
                                    </div>
                                </div>

                                {{-- Quick Stats --}}
                                <div class="mt-4">
                                    <div class="d-flex justify-content-center gap-3">
                                        <div class="text-center">
                                            <div class="text-danger fw-bold">Laravel</div>
                                            <small class="text-light opacity-75">Expert</small>
                                        </div>
                                        <div class="text-center">
                                            <div class="text-danger fw-bold">Vue.js</div>
                                            <small class="text-light opacity-75">Advanced</small>
                                        </div>
                                        <div class="text-center">
                                            <div class="text-danger fw-bold">MySQL</div>
                                            <small class="text-light opacity-75">Expert</small>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-8 col-lg-9">
                                <div class="ps-md-4">
                                    {{-- Name --}}
                                    <h2 class="text-light mb-2" style="font-weight: 700;">
                                        Filbert Anggriawan
                                    </h2>

                                    {{-- Title --}}
                                    <p class="text-light opacity-75 mb-4" style="font-size: 1.1rem;">
                                        <i class="fas fa-graduation-cap text-danger me-2"></i>
                                        Information Systems Student & Web Developer
                                    </p>

                                    {{-- Info Grid --}}
                                    <div class="row g-3 mb-4">
                                        <div class="col-md-6">
                                            <div class="d-flex align-items-center gap-3 p-3 rounded"
                                                style="
                                            background: rgba(255, 0, 0, 0.05);
                                            border: 1px solid rgba(255, 0, 0, 0.1);
                                        ">
                                                <div
                                                    style="
                                                width: 40px;
                                                height: 40px;
                                                background: rgba(255, 0, 0, 0.15);
                                                border-radius: 10px;
                                                display: flex;
                                                align-items: center;
                                                justify-content: center;
                                            ">
                                                    <i class="fas fa-id-card text-danger"></i>
                                                </div>
                                                <div>
                                                    <div class="text-light opacity-75" style="font-size: 0.85rem;">Student
                                                        ID</div>
                                                    <div class="text-light fw-semibold">2457301056</div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="d-flex align-items-center gap-3 p-3 rounded"
                                                style="
                                            background: rgba(255, 0, 0, 0.05);
                                            border: 1px solid rgba(255, 0, 0, 0.1);
                                        ">
                                                <div
                                                    style="
                                                width: 40px;
                                                height: 40px;
                                                background: rgba(255, 0, 0, 0.15);
                                                border-radius: 10px;
                                                display: flex;
                                                align-items: center;
                                                justify-content: center;
                                            ">
                                                    <i class="fas fa-university text-danger"></i>
                                                </div>
                                                <div>
                                                    <div class="text-light opacity-75" style="font-size: 0.85rem;">Study
                                                        Program</div>
                                                    <div class="text-light fw-semibold">Information Systems</div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="d-flex align-items-center gap-3 p-3 rounded"
                                                style="
                                            background: rgba(255, 0, 0, 0.05);
                                            border: 1px solid rgba(255, 0, 0, 0.1);
                                        ">
                                                <div
                                                    style="
                                                width: 40px;
                                                height: 40px;
                                                background: rgba(255, 0, 0, 0.15);
                                                border-radius: 10px;
                                                display: flex;
                                                align-items: center;
                                                justify-content: center;
                                            ">
                                                    <i class="fas fa-school text-danger"></i>
                                                </div>
                                                <div>
                                                    <div class="text-light opacity-75" style="font-size: 0.85rem;">
                                                        Institution</div>
                                                    <div class="text-light fw-semibold">Politeknik Caltex Riau</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- About Section --}}
                        <div class="mb-5">
                            <div class="d-flex align-items-center mb-4">
                                <div
                                    style="
                                width: 40px;
                                height: 40px;
                                background: linear-gradient(135deg, #ff0000 0%, #990000 100%);
                                border-radius: 10px;
                                display: flex;
                                align-items: center;
                                justify-content: center;
                                margin-right: 15px;
                            ">
                                    <i class="fas fa-user text-white"></i>
                                </div>
                                <h4 class="mb-0 text-light">About the Developer</h4>
                            </div>

                            <div class="ps-5">
                                <p class="text-light mb-3" style="line-height: 1.8; font-size: 1.05rem;">
                                    Filbert Anggriawan adalah seorang mahasiswa Sistem Informasi di Politeknik Caltex Riau.
                                    Ia memiliki minat yang besar dalam pengembangan aplikasi web dan bersemangat untuk
                                    belajar
                                    teknologi terbaru di bidang ini. Selain akademik,
                                    Filbert juga aktif dalam berbagai kegiatan kampus dan sangat suka membaca novel fiktif.
                                </p>

                            </div>
                        </div>

                        {{-- Contact & Social Media --}}
                        <div class="mb-5">
                            <div class="d-flex align-items-center mb-4">
                                <div
                                    style="
                                width: 40px;
                                height: 40px;
                                background: linear-gradient(135deg, #ff0000 0%, #990000 100%);
                                border-radius: 10px;
                                display: flex;
                                align-items: center;
                                justify-content: center;
                                margin-right: 15px;
                            ">
                                    <i class="fas fa-share-alt text-white"></i>
                                </div>
                                <h4 class="mb-0 text-light">Contact & Social Media</h4>
                            </div>

                            <div class="row g-3">
                                {{-- Email --}}
                                <div class="col-md-6 col-lg-3">
                                    <a href="https://mail.google.com/mail/u/0/#inbox?compose=DmwnWrRpdmBTSBpTDFpmrpppBCPVkXrmfSKXrldKSNmqbGRzMZmFNqWvcvSJsZvStMhPXxGXFmNG"
                                        target="_blank" class="text-decoration-none">
                                        <div class="contact-card p-3 rounded h-100"
                                            style="
                                        background: rgba(220, 53, 69, 0.1);
                                        border: 1px solid rgba(220, 53, 69, 0.2);
                                        transition: all 0.3s ease;
                                    ">
                                            <div class="d-flex align-items-center gap-3">
                                                <div
                                                    style="
                                                width: 45px;
                                                height: 45px;
                                                background: rgba(220, 53, 69, 0.2);
                                                border-radius: 10px;
                                                display: flex;
                                                align-items: center;
                                                justify-content: center;
                                            ">
                                                    <i class="fas fa-envelope text-danger" style="font-size: 1.2rem;"></i>
                                                </div>
                                                <div>
                                                    <div class="text-light opacity-75" style="font-size: 0.85rem;">Email
                                                    </div>
                                                    <div class="text-light fw-semibold">filbert7788@gmail.com</div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>

                                {{-- GitHub --}}
                                <div class="col-md-6 col-lg-3">
                                    <a href="https://github.com/filbert6431" target="_blank"
                                        class="text-decoration-none">
                                        <div class="contact-card p-3 rounded h-100"
                                            style="
                                        background: rgba(33, 37, 41, 0.1);
                                        border: 1px solid rgba(255, 255, 255, 0.1);
                                        transition: all 0.3s ease;
                                    ">
                                            <div class="d-flex align-items-center gap-3">
                                                <div
                                                    style="
                                                width: 45px;
                                                height: 45px;
                                                background: rgba(33, 37, 41, 0.2);
                                                border-radius: 10px;
                                                display: flex;
                                                align-items: center;
                                                justify-content: center;
                                            ">
                                                    <i class="fab fa-github text-light" style="font-size: 1.2rem;"></i>
                                                </div>
                                                <div>
                                                    <div class="text-light opacity-75" style="font-size: 0.85rem;">GitHub
                                                    </div>
                                                    <div class="text-light fw-semibold">@filbert6431</div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>

                                {{-- Instagram --}}
                                <div class="col-md-6 col-lg-3">
                                    <a href="https://www.instagram.com/filbert6431/" target="_blank"
                                        class="text-decoration-none">
                                        <div class="contact-card p-3 rounded h-100"
                                            style="
                                        background: rgba(193, 53, 132, 0.1);
                                        border: 1px solid rgba(193, 53, 132, 0.2);
                                        transition: all 0.3s ease;
                                    ">
                                            <div class="d-flex align-items-center gap-3">
                                                <div
                                                    style="
                                                width: 45px;
                                                height: 45px;
                                                background: rgba(193, 53, 132, 0.2);
                                                border-radius: 10px;
                                                display: flex;
                                                align-items: center;
                                                justify-content: center;
                                            ">
                                                    <i class="fab fa-instagram text-warning"
                                                        style="font-size: 1.2rem;"></i>
                                                </div>
                                                <div>
                                                    <div class="text-light opacity-75" style="font-size: 0.85rem;">
                                                        Instagram</div>
                                                    <div class="text-light fw-semibold">@filbert6431</div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>

                                {{-- WhatsApp --}}
                                <div class="col-md-6 col-lg-3">
                                    <a href="https://wa.me/6281226181479" target="_blank" class="text-decoration-none">
                                        <div class="contact-card p-3 rounded h-100"
                                            style="
                                        background: rgba(37, 211, 102, 0.1);
                                        border: 1px solid rgba(37, 211, 102, 0.2);
                                        transition: all 0.3s ease;
                                    ">
                                            <div class="d-flex align-items-center gap-3">
                                                <div
                                                    style="
                                                width: 45px;
                                                height: 45px;
                                                background: rgba(37, 211, 102, 0.2);
                                                border-radius: 10px;
                                                display: flex;
                                                align-items: center;
                                                justify-content: center;
                                            ">
                                                    <i class="fab fa-whatsapp text-success"
                                                        style="font-size: 1.2rem;"></i>
                                                </div>
                                                <div>
                                                    <div class="text-light opacity-75" style="font-size: 0.85rem;">
                                                        WhatsApp</div>
                                                    <div class="text-light fw-semibold">0812-2618-1479</div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>

                        {{-- Project Information --}}
                        <div>
                            <div class="d-flex align-items-center mb-4">
                                <div
                                    style="
                                width: 40px;
                                height: 40px;
                                background: linear-gradient(135deg, #ff0000 0%, #990000 100%);
                                border-radius: 10px;
                                display: flex;
                                align-items: center;
                                justify-content: center;
                                margin-right: 15px;
                            ">
                                    <i class="fas fa-project-diagram text-white"></i>
                                </div>
                                <h4 class="mb-0 text-light">Project Information</h4>
                            </div>

                            <div class="ps-5">
                                <p class="text-light mb-4" style="line-height: 1.8; font-size: 1.05rem;">
                                    Aplikasi Admin Persil ini dikembangkan sebagai bagian dari tugas akhir
                                    untuk memenuhi


                                    kebutuhan administrasi data persil di lingkungan pertanahan. Aplikasi ini
                                    dibangun menggunakan
                                    framework Laravel dan dirancang untuk memberikan kemudahan dalam pengelolaan
                                    data persil secara
                                    efisien dan aman.
                                </p>

                                <div class="row g-3">
                                    <div class="col-md-4">
                                        <div class="p-3 rounded"
                                            style="
                                        background: rgba(255, 0, 0, 0.05);
                                        border: 1px solid rgba(255, 0, 0, 0.1);
                                    ">
                                            <div class="text-center">
                                                <i class="fas fa-shield-alt fa-2x text-danger mb-3"></i>
                                                <h6 class="text-light mb-2">Secure & Reliable</h6>
                                                <p class="text-light opacity-75 mb-0" style="font-size: 0.9rem;">
                                                    Built with industry-standard security practices
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="p-3 rounded"
                                            style="
                                        background: rgba(255, 0, 0, 0.05);
                                        border: 1px solid rgba(255, 0, 0, 0.1);
                                    ">
                                            <div class="text-center">
                                                <i class="fas fa-bolt fa-2x text-danger mb-3"></i>
                                                <h6 class="text-light mb-2">Fast Performance</h6>
                                                <p class="text-light opacity-75 mb-0" style="font-size: 0.9rem;">
                                                    Optimized for speed and efficiency
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="p-3 rounded"
                                            style="
                                        background: rgba(255, 0, 0, 0.05);
                                        border: 1px solid rgba(255, 0, 0, 0.1);
                                    ">
                                            <div class="text-center">
                                                <i class="fas fa-mobile-alt fa-2x text-danger mb-3"></i>
                                                <h6 class="text-light mb-2">Responsive Design</h6>
                                                <p class="text-light opacity-75 mb-0" style="font-size: 0.9rem;">
                                                    Works perfectly on all devices
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Card Footer --}}
                    <div class="card-footer border-0 text-center py-4"
                        style="
                    background: rgba(0, 0, 0, 0.3);
                    border-top: 1px solid rgba(255, 0, 0, 0.1);
                ">
                        <p class="text-light opacity-75 mb-0">
                            <i class="fas fa-heart text-danger"></i> Developed with passion •
                            <i class="fas fa-code text-danger ms-2"></i> Powered by Laravel •
                            <i class="fas fa-calendar-alt text-danger ms-2"></i> © 2024
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        /* Contact card hover effects */
        .contact-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(255, 0, 0, 0.15) !important;
            border-color: rgba(255, 0, 0, 0.3) !important;
        }

        /* Link styling */
        a:hover {
            text-decoration: none !important;
        }

        /* Smooth transitions */
        * {
            transition: background-color 0.3s ease,
                border-color 0.3s ease,
                box-shadow 0.3s ease,
                transform 0.3s ease;
        }

        /* Profile image hover effect */
        .rounded-circle {
            transition: transform 0.3s ease;
        }

        .rounded-circle:hover {
            transform: scale(1.05);
        }

        /* Custom scrollbar for card */
        .card-body {
            scrollbar-width: thin;
            scrollbar-color: rgba(255, 0, 0, 0.3) rgba(255, 255, 255, 0.05);
        }

        .card-body::-webkit-scrollbar {
            width: 6px;
        }

        .card-body::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.05);
            border-radius: 10px;
        }

        .card-body::-webkit-scrollbar-thumb {
            background: rgba(255, 0, 0, 0.3);
            border-radius: 10px;
        }

        .card-body::-webkit-scrollbar-thumb:hover {
            background: rgba(255, 0, 0, 0.5);
        }
    </style>
@endsection
