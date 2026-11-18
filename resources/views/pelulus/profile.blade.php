<!DOCTYPE html>
<html lang="ms">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Pelulus - iMohon</title>

    <!-- FontAwesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #f3f4f8;
            display: flex;
            min-height: 100vh;
        }

        /* SIDEBAR (LEFT) */
        .sidebar {
            width: 260px;
            background-color: #29158f;
            color: white;
            display: flex;
            flex-direction: column;
            padding: 25px 20px;
            flex-shrink: 0;
            transition: all 0.3s ease;
        }

        .sidebar.collapsed {
            width: 80px;
            padding: 25px 12px;
        }

        .sidebar.collapsed .brand-name,
        .sidebar.collapsed .nav-link span {
            display: none;
        }

        .sidebar.collapsed .nav-link {
            justify-content: center;
            padding: 12px 0;
        }

        .sidebar.collapsed .sidebar-header {
            justify-content: center;
        }

        .sidebar-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 40px;
        }

        .brand-logo {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .brand-logo img {
            height: 35px;
        }

        .brand-name {
            font-size: 22px;
            font-weight: bold;
        }

        .nav-menu {
            list-style: none;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .nav-link {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 12px 18px;
            color: #dcd7ff;
            text-decoration: none;
            font-size: 15px;
            border-radius: 10px;
            transition: all 0.2s ease;
        }

        .nav-link:hover,
        .nav-link.active {
            background-color: rgba(255, 255, 255, 0.2);
            color: #ffffff;
            font-weight: 600;
        }

        .nav-link i {
            font-size: 18px;
            width: 20px;
            text-align: center;
        }

        .logout-btn {
            background: none;
            border: none;
            width: 100%;
            cursor: pointer;
            text-align: left;
            font-family: inherit;
        }

        /* MAIN CONTENT (RIGHT) */
        .main-wrapper {
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }

        .top-header {
            background-color: #29158f;
            display: flex;
            justify-content: flex-end;
            align-items: center;
            padding: 15px 40px;
            height: 65px;
        }

        .user-profile {
            display: flex;
            align-items: center;
            gap: 12px;
            color: #ffffff;
            font-weight: 600;
            font-size: 15px;
        }

        .user-avatar {
            width: 36px;
            height: 36px;
            background-color: rgba(255, 255, 255, 0.2);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
        }

        .content-body {
            padding: 30px 40px 40px;
            width: 100%;
        }

        .page-title {
            font-size: 28px;
            font-weight: bold;
            color: #0f172a;
            margin-bottom: 4px;
        }

        .page-subtitle {
            font-size: 13px;
            color: #64748b;
            margin-bottom: 24px;
        }

        /* ALERT SUCCESS */
        .alert-success {
            background-color: #dcfce7;
            border: 1px solid #86efac;
            color: #166534;
            padding: 14px 18px;
            border-radius: 12px;
            margin-bottom: 20px;
            font-size: 13.5px;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        /* HERO PROFILE CARD */
        .profile-hero-card {
            background: white;
            border-radius: 18px;
            overflow: hidden;
            margin-bottom: 24px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.04);
        }

        .profile-banner {
            height: 95px;
            background: linear-gradient(135deg, #29158f 0%, #4f46e5 100%);
        }

        .header-card-content {
            display: flex;
            flex-wrap: wrap;
            align-items: flex-end;
            justify-content: space-between;
            gap: 20px;
            padding: 0 35px 30px;
            margin-top: -45px;
        }

        .profile-main-info {
            display: flex;
            flex-wrap: wrap;
            align-items: flex-end;
            gap: 22px;
        }

        .avatar-large {
            width: 96px;
            height: 96px;
            background: #eef2ff;
            color: #29158f;
            border: 4px solid #ffffff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 40px;
            box-shadow: 0 4px 14px rgba(0, 0, 0, 0.08);
            flex-shrink: 0;
        }

        .user-titles {
            padding-bottom: 4px;
        }

        .user-titles h2 {
            font-size: 22px;
            font-weight: 700;
            color: #0f172a;
            margin-bottom: 6px;
        }

        .user-meta-pills {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 8px;
        }

        .meta-pill {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            font-size: 12.5px;
            font-weight: 600;
            padding: 4px 12px;
            border-radius: 20px;
            background-color: #eef2ff;
            color: #29158f;
        }

        .meta-pill-muted {
            background-color: #f1f5f9;
            color: #475569;
            font-weight: 500;
        }

        .edit-btn {
            background-color: #29158f;
            color: white;
            padding: 10px 20px;
            border-radius: 10px;
            font-weight: 600;
            font-size: 13px;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            box-shadow: 0 4px 12px rgba(41, 21, 143, 0.2);
            transition: background 0.2s, transform 0.2s;
        }

        .edit-btn:hover {
            background-color: #1e0b75;
            transform: translateY(-1px);
        }

        /* 2-COLUMN DETAILS GRID */
        .profile-details-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 22px;
        }

        @media (max-width: 900px) {
            .profile-details-grid {
                grid-template-columns: 1fr;
            }
        }

        .profile-card {
            background: white;
            border-radius: 16px;
            padding: 28px 32px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.04);
            border-top: 4px solid #29158f;
        }

        .section-header-box {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 22px;
            padding-bottom: 14px;
            border-bottom: 1px solid #f1f5f9;
        }

        .section-icon {
            width: 38px;
            height: 38px;
            border-radius: 10px;
            background-color: #eef2ff;
            color: #29158f;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
        }

        .section-title {
            font-size: 17px;
            font-weight: 700;
            color: #0f172a;
        }

        .info-list {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .info-item {
            display: grid;
            grid-template-columns: 165px 15px 1fr;
            align-items: baseline;
            font-size: 13.5px;
        }

        .info-label {
            color: #64748b;
            font-weight: 500;
        }

        .info-colon {
            color: #94a3b8;
            font-weight: bold;
        }

        .info-value {
            color: #0f172a;
            font-weight: 600;
            line-height: 1.45;
        }
    </style>
</head>
<body>

    <!-- SIDEBAR LEFT  -->
    <aside class="sidebar">
        <div class="sidebar-header">
            <div class="brand-logo">
                <img src="{{ asset('images/rtmlogo.png') }}" alt="RTM Logo">
                <span class="brand-name">iMohon</span>
            </div>
            <i class="fa-solid fa-angles-left" id="toggleSidebar" style="cursor: pointer; opacity: 0.8; font-size: 18px; transition: transform 0.3s ease;"></i>
        </div>

        <ul class="nav-menu">
            <li>
                <a href="{{ route('pelulus.dashboard') }}" class="nav-link {{ request()->routeIs('pelulus.dashboard') ? 'active' : '' }}">
                    <i class="fa-solid fa-house"></i>
                    <span>Laman utama</span>
                </a>
            </li>
            <li>
                <a href="{{ route('pelulus.kelulusan') }}" class="nav-link {{ request()->routeIs('pelulus.kelulusan*') ? 'active' : '' }}">
                    <i class="fa-solid fa-circle-check"></i>
                    <span>Kelulusan</span>
                </a>
            </li>
            <li>
                <a href="{{ route('pelulus.profile.user') }}" class="nav-link {{ request()->routeIs('pelulus.profile.*') ? 'active' : '' }}">
                    <i class="fa-solid fa-user"></i>
                    <span>Profil</span>
                </a>
            </li>
            <li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="nav-link logout-btn">
                        <i class="fa-solid fa-right-from-bracket"></i>
                        <span>Log keluar</span>
                    </button>
                </form>
            </li>
        </ul>
    </aside>

    <!-- MAIN WRAPPER RIGHT -->
    <div class="main-wrapper">

        @include('partials.top-header')

        <!-- CONTENT BODY -->
        <main class="content-body">

            <h1 class="page-title">Profil Saya</h1>
            <p class="page-subtitle">Maklumat akaun peribadi serta penempatan unit semasa anda</p>

            @if(session('status') === 'profile-updated' || session('success'))
                <div class="alert-success">
                    <i class="fa-solid fa-circle-check"></i>
                    <span>{{ session('success') ?? 'Maklumat profil anda telah berjaya dikemaskini.' }}</span>
                </div>
            @endif

            
            <div class="profile-hero-card">
                <div class="profile-banner"></div>
                <div class="header-card-content">
                    <div class="profile-main-info">
                        <div class="avatar-large">
                            <i class="fa-solid fa-user"></i>
                        </div>
                        <div class="user-titles">
                            <h2>{{ Auth::user()->name }}</h2>
                            <div class="user-meta-pills">
                                <span class="meta-pill">
                                    <i class="fa-solid fa-briefcase"></i>
                                    {{ Auth::user()->jawatan ?? 'Pegawai Pelulus' }} &bull; {{ Auth::user()->unit ?? '-' }}
                                </span>
                                <span class="meta-pill meta-pill-muted">
                                    <i class="fa-solid fa-envelope"></i>
                                    {{ Auth::user()->email }}
                                </span>
                            </div>
                        </div>
                    </div>

                    <a href="{{ route('pelulus.profile.edit') }}" class="edit-btn">
                        <i class="fa-solid fa-pen-to-square"></i> Edit Profil
                    </a>
                </div>
            </div>

            
            <div class="profile-details-grid">

                <!-- CARD 2: MAKLUMAT PERIBADI -->
                <div class="profile-card">
                    <div class="section-header-box">
                        <div class="section-icon">
                            <i class="fa-solid fa-id-card"></i>
                        </div>
                        <h3 class="section-title">Maklumat peribadi</h3>
                    </div>

                    <div class="info-list">
                        <div class="info-item">
                            <span class="info-label">Nama penuh</span>
                            <span class="info-colon">:</span>
                            <span class="info-value">{{ Auth::user()->name }}</span>
                        </div>

                        <div class="info-item">
                            <span class="info-label">No. kad pengenalan</span>
                            <span class="info-colon">:</span>
                            <span class="info-value" style="font-family: monospace; font-size: 14px;">{{ Auth::user()->ic ?? Auth::user()->no_ic ?? '-' }}</span>
                        </div>

                        <div class="info-item">
                            <span class="info-label">No. Telefon</span>
                            <span class="info-colon">:</span>
                            <span class="info-value">{{ Auth::user()->phone ?? Auth::user()->no_tel ?? '-' }}</span>
                        </div>

                        <div class="info-item">
                            <span class="info-label">Emel rasmi</span>
                            <span class="info-colon">:</span>
                            <span class="info-value">{{ Auth::user()->email }}</span>
                        </div>
                    </div>
                </div>

                
                <div class="profile-card" style="border-top-color: #10b981;">
                    <div class="section-header-box">
                        <div class="section-icon" style="background-color: #ecfdf5; color: #10b981;">
                            <i class="fa-solid fa-building"></i>
                        </div>
                        <h3 class="section-title">Maklumat pekerjaan</h3>
                    </div>

                    <div class="info-list">
                        <div class="info-item">
                            <span class="info-label">Jawatan</span>
                            <span class="info-colon">:</span>
                            <span class="info-value">{{ Auth::user()->jawatan ?? 'Pegawai Pelulus' }}</span>
                        </div>

                        <div class="info-item">
                            <span class="info-label">Unit</span>
                            <span class="info-colon">:</span>
                            <span class="info-value">{{ Auth::user()->unit ?? '-' }}</span>
                        </div>

                        <div class="info-item">
                            <span class="info-label">Bahagian</span>
                            <span class="info-colon">:</span>
                            <span class="info-value">{{ Auth::user()->bahagian ?? '-' }}</span>
                        </div>

                        <div class="info-item">
                            <span class="info-label">No. Tel Pejabat</span>
                            <span class="info-colon">:</span>
                            <span class="info-value">{{ Auth::user()->no_tel_pejabat ?? '-' }}</span>
                        </div>

                        <div class="info-item">
                            <span class="info-label">Alamat Pejabat</span>
                            <span class="info-colon">:</span>
                            <span class="info-value">{{ Auth::user()->address ?? '-' }}</span>
                        </div>
                    </div>
                </div>

            </div>

        </main>

    </div>

    
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const sidebar = document.querySelector('.sidebar');
            const toggleBtn = document.getElementById('toggleSidebar');

            if (toggleBtn && sidebar) {
                toggleBtn.addEventListener('click', function () {
                    sidebar.classList.toggle('collapsed');
                    if (sidebar.classList.contains('collapsed')) {
                        toggleBtn.style.transform = 'rotate(180deg)';
                    } else {
                        toggleBtn.style.transform = 'rotate(0deg)';
                    }
                });
            }
        });
    </script>
</body>
</html>