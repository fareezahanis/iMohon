<!DOCTYPE html>
<html lang="ms">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Saya - iMohon</title>

    <!-- FontAwesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
         {
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

        .nav-link:hover, .nav-link.active {
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
            font-weight: bold;
            font-size: 15px;
        }

        .user-avatar {
            width: 36px;
            height: 36px;
            background-color: #29158f;
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
            color: #111;
            margin-bottom: 25px;
        }

        /* CARDS */
        .profile-card {
            background: white;
            border-radius: 16px;
            border: 1px solid #d1d5db;
            padding: 35px 40px;
            margin-bottom: 20px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.02);
        }

        .header-card-content {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .profile-main-info {
            display: flex;
            align-items: center;
            gap: 25px;
        }

        .avatar-large {
            width: 100px;
            height: 100px;
            background-color: #9392e2;
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 50px;
        }

        .user-titles h2 {
            font-size: 24px;
            font-weight: bold;
            color: #111;
            margin-bottom: 5px;
        }

        .user-titles p {
            color: #666;
            font-size: 14px;
            margin-bottom: 3px;
        }

        .edit-btn {
            border: 1px solid #29158f;
            background: transparent;
            color: #29158f;
            padding: 10px 24px;
            border-radius: 8px;
            font-weight: 600;
            font-size: 14px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            transition: all 0.2s ease;
        }

        .edit-btn:hover {
            background-color: #29158f;
            color: white;
        }

        .section-title {
            font-size: 18px;
            font-weight: bold;
            color: #111;
            margin-bottom: 20px;
        }

        .info-grid {
            display: grid;
            grid-template-columns: 200px 20px 1fr;
            row-gap: 14px;
            align-items: center;
            font-size: 14px;
        }

        .info-label {
            color: #777;
            font-weight: 500;
        }

        .info-colon {
            color: #777;
        }

        .info-value {
            color: #222;
            font-weight: 600;
        }
    </style>
</head>
<body>

    <!-- SIDEBAR LEFT -->
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
                <a href="{{ route('dashboard') }}" class="nav-link">
                    <i class="fa-solid fa-house"></i>
                    <span>Laman utama</span>
                </a>
            </li>
            <li>
                <a href="{{ route('profile.user') }}" class="nav-link active">
                    <i class="fa-solid fa-user"></i>
                    <span>Profil</span>
                </a>
            </li>
            <li>
                <a href="{{ route('permohonan.create') }}" class="nav-link">
                    <i class="fa-solid fa-pen-to-square"></i>
                    <span>Permohonan</span>
                </a>
            </li>
            <li>
                <a href="{{ route('permohonan.index') }}" class="nav-link">
                    <i class="fa-solid fa-list-check"></i>
                    <span>Senarai Permohonan</span>
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

        <!-- TOP HEADER -->
        <header class="top-header">
            <div class="user-profile">
                <span>{{ Auth::user()->name }}</span>
                <div class="user-avatar">
                    <i class="fa-solid fa-user"></i>
                </div>
            </div>
        </header>

        <!-- CONTENT BODY -->
        <main class="content-body">

            <h1 class="page-title">Profil Saya</h1>

            <!-- CARD 1: USER HEADER -->
            <div class="profile-card">
                <div class="header-card-content">
                    <div class="profile-main-info">
                        <div class="avatar-large">
                            <i class="fa-solid fa-user"></i>
                        </div>
                        <div class="user-titles">
                            <h2>{{ Auth::user()->name }}</h2>
                            <p>{{ Auth::user()->jawatan }} / {{ Auth::user()->unit }}</p>
                            <p>{{ Auth::user()->email }}</p>
                        </div>
                    </div>
                    <a href="{{ route('profile.edit') }}" class="edit-btn">Edit Profil</a>
                </div>
            </div>

            <!-- CARD 2: MAKLUMAT PERIBADI -->
            <div class="profile-card">
                <h3 class="section-title">Maklumat peribadi</h3>
                
                <div class="info-grid">
                    <div class="info-label">Nama penuh</div>
                    <div class="info-colon">:</div>
                    <div class="info-value">{{ Auth::user()->name }}</div>

                    <div class="info-label">No. kad pengenalan</div>
                    <div class="info-colon">:</div>
                    <div class="info-value">{{ Auth::user()->ic }}</div>

                    <div class="info-label">No. Tel</div>
                    <div class="info-colon">:</div>
                    <div class="info-value">{{ Auth::user()->phone }}</div>

                    <div class="info-label">Email</div>
                    <div class="info-colon">:</div>
                    <div class="info-value">{{ Auth::user()->email }}</div>
                </div>
            </div>

            <!-- CARD 3: MAKLUMAT PEKERJAAN -->
            <div class="profile-card">
                <h3 class="section-title">Maklumat pekerjaan</h3>

                <div class="info-grid">
                    <div class="info-label">Jawatan</div>
                    <div class="info-colon">:</div>
                    <div class="info-value">{{ Auth::user()->jawatan }}</div>

                    <div class="info-label">Unit</div>
                    <div class="info-colon">:</div>
                    <div class="info-value">{{ Auth::user()->unit }}</div>

                    <div class="info-label">Bahagian</div>
                    <div class="info-colon">:</div>
                    <div class="info-value">{{ Auth::user()->bahagian }}</div>

                    <div class="info-label">Alamat Pejabat</div>
                    <div class="info-colon">:</div>
                    <div class="info-value">{{ Auth::user()->address }}</div>
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