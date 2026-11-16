<!DOCTYPE html>
<html lang="ms">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - iMohon</title>

    <!-- FontAwesome / CDN Icon -->
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

        /* SIDEBAR LEFT */
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

        .sidebar.collapsed .brand-logo img {
            height: 28px;
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

        /* MENU DALAM SIDEBAR */
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

        /* MAIN CONTENT */
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

        /* CONTENT CONTAINER */
        .content-body {
            padding: 30px 40px 40px;
            width: 100%;
        }

        .welcome-header {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            margin-bottom: 26px;
        }

        .welcome-title {
            font-size: 28px;
            font-weight: bold;
            color: #0f172a;
            margin-bottom: 4px;
        }

        .welcome-sub {
            color: #64748b;
            font-size: 14px;
        }

        .btn-new-request {
            background-color: #29158f;
            color: white;
            text-decoration: none;
            padding: 10px 18px;
            border-radius: 10px;
            font-size: 13px;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            box-shadow: 0 4px 12px rgba(41, 21, 143, 0.2);
            transition: background 0.2s, transform 0.2s;
        }

        .btn-new-request:hover {
            background-color: #1e0b75;
            transform: translateY(-1px);
        }

        
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 18px;
            margin-bottom: 28px;
        }

        .stat-card {
            background: white;
            border-radius: 14px;
            padding: 18px 20px;
            display: flex;
            align-items: center;
            gap: 15px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.03);
            border-left: 4px solid #29158f;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .stat-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 18px rgba(0, 0, 0, 0.06);
        }

        .stat-icon {
            width: 46px;
            height: 46px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            flex-shrink: 0;
        }

        .icon-blue   { background-color: #eef2ff; color: #29158f; }
        .icon-yellow { background-color: #fef3c7; color: #d97706; }
        .icon-green  { background-color: #ecfdf5; color: #10b981; }
        .icon-red    { background-color: #fee2e2; color: #ef4444; }

        .stat-info .stat-label {
            font-size: 12px;
            color: #64748b;
            font-weight: 600;
            margin-bottom: 3px;
        }

        .stat-info .stat-value {
            font-size: 23px;
            font-weight: 700;
            color: #0f172a;
        }

        .dashboard-grid {
            display: grid;
            grid-template-columns: 2fr 1.1fr;
            gap: 24px;
            align-items: start;
        }

        .section-card {
            background: white;
            border-radius: 16px;
            padding: 25px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.04);
        }

        .section-header-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 18px;
        }

        .section-header {
            font-size: 18px;
            font-weight: 700;
            color: #0f172a;
            display: flex;
            align-items: center;
            gap: 9px;
        }

        .view-all-link {
            font-size: 12.5px;
            font-weight: 600;
            color: #29158f;
            text-decoration: none;
            transition: color 0.2s;
        }

        .view-all-link:hover {
            color: #1e0b75;
            text-decoration: underline;
        }

      
        .recent-table {
            width: 100%;
            border-collapse: collapse;
        }

        .recent-table th {
            background-color: #e0e7ff;
            color: #3730a3;
            text-align: left;
            padding: 12px 14px;
            font-size: 13px;
            font-weight: 600;
        }

        .recent-table th:first-child { border-radius: 8px 0 0 8px; }
        .recent-table th:last-child  { border-radius: 0 8px 8px 0; text-align: center; }

        .recent-table td {
            padding: 14px;
            font-size: 13px;
            color: #334155;
            border-bottom: 1px solid #f1f5f9;
        }

        .recent-table tbody tr:hover {
            background-color: #f8fafc;
        }

        
        .badge {
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 600;
            display: inline-block;
        }

        .badge-proses { background-color: #fef3c7; color: #92400e; }
        .badge-lulus  { background-color: #dcfce7; color: #166534; }
        .badge-tolak  { background-color: #fee2e2; color: #991b1b; }

        
        .announcement-item {
            background-color: #f8fafc;
            border: 1px solid #e2e8f0;
            border-left: 4px solid #29158f;
            border-radius: 12px;
            padding: 15px 16px;
            display: flex;
            gap: 14px;
            margin-bottom: 14px;
            transition: background 0.2s;
        }

        .announcement-item:last-child {
            margin-bottom: 0;
        }

        .announcement-item:hover {
            background-color: #eef2ff;
        }

        .announcement-icon {
            width: 38px;
            height: 38px;
            background-color: #e0e7ff;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #29158f;
            font-size: 15px;
            flex-shrink: 0;
        }

        .announcement-title {
            font-size: 13.5px;
            font-weight: 700;
            color: #0f172a;
            margin-bottom: 4px;
        }

        .announcement-desc {
            font-size: 12px;
            color: #475569;
            line-height: 1.45;
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
            <i class="fa-solid fa-angles-left" id="toggleSidebar" style="cursor: pointer; font-size: 18px; opacity: 0.8;"></i>
        </div>

        <ul class="nav-menu">
            <li>
                <a href="{{ route('dashboard') }}" class="nav-link active">
                    <i class="fa-solid fa-house"></i>
                    <span>Laman utama</span>
                </a>
            </li>
            <li>
                <a href="{{ route('profile.user') }}" class="nav-link">
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

            <div class="welcome-header">
                <div>
                    <h1 class="welcome-title">Selamat datang, {{ Auth::user()->name }}</h1>
                    <p class="welcome-sub">Sistem Permohonan Peralatan ICT — Ringkasan status permohonan anda</p>
                </div>

                <a href="{{ route('permohonan.create') }}" class="btn-new-request">
                    <i class="fa-solid fa-plus"></i> Permohonan Baharu
                </a>
            </div>

            
            <div class="stats-grid">
              
                <div class="stat-card" style="border-left-color: #29158f;">
                    <div class="stat-icon icon-blue">
                        <i class="fa-solid fa-clipboard-list"></i>
                    </div>
                    <div class="stat-info">
                        <div class="stat-label">Jumlah permohonan</div>
                        <div class="stat-value">{{ $jumlahSemua }}</div>
                    </div>
                </div>

                
                <div class="stat-card" style="border-left-color: #f59e0b;">
                    <div class="stat-icon icon-yellow">
                        <i class="fa-regular fa-clock"></i>
                    </div>
                    <div class="stat-info">
                        <div class="stat-label">Dalam proses</div>
                        <div class="stat-value" style="color: #d97706;">{{ $jumlahProses }}</div>
                    </div>
                </div>

                
                <div class="stat-card" style="border-left-color: #10b981;">
                    <div class="stat-icon icon-green">
                        <i class="fa-solid fa-check"></i>
                    </div>
                    <div class="stat-info">
                        <div class="stat-label">Diterima</div>
                        <div class="stat-value" style="color: #10b981;">{{ $jumlahTerima }}</div>
                    </div>
                </div>

               
                <div class="stat-card" style="border-left-color: #ef4444;">
                    <div class="stat-icon icon-red">
                        <i class="fa-solid fa-xmark"></i>
                    </div>
                    <div class="stat-info">
                        <div class="stat-label">Ditolak</div>
                        <div class="stat-value" style="color: #ef4444;">{{ $jumlahTolak }}</div>
                    </div>
                </div>
            </div>

            
            <div class="dashboard-grid">

               
                <div class="section-card">
                    <div class="section-header-row">
                        <h2 class="section-header">
                            <i class="fa-solid fa-clock-rotate-left" style="color: #29158f; font-size: 16px;"></i>
                            Permohonan terkini
                        </h2>
                        <a href="{{ route('permohonan.index') }}" class="view-all-link">
                            Lihat semua <i class="fa-solid fa-arrow-right" style="font-size: 11px; margin-left: 3px;"></i>
                        </a>
                    </div>

                    <div style="overflow-x: auto;">
                        <table class="recent-table">
                            <thead>
                                <tr>
                                    <th>ID Permohonan</th>
                                    <th>Item</th>
                                    <th>Tarikh mohon</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($permohonanTerkini as $item)
                                    <tr>
                                        <td style="font-weight: 700; color: #1e0b75;">{{ $item->id_permohonan }}</td>
                                        <td style="font-weight: 600; color: #0f172a;">{{ $item->nama_item }}</td>
                                        <td>{{ \Carbon\Carbon::parse($item->tarikh_mohon)->translatedFormat('d/m/Y') }}</td>
                                        <td style="text-align: center;">
                                            @php
                                                $statusPemohon = strtolower($item->status ?? '');
                                            @endphp

                                            @if(in_array($statusPemohon, ['diterima', 'lulus', 'terima']))
                                                <span class="badge badge-lulus">Diterima</span>
                                            @elseif($statusPemohon == 'ditolak')
                                                <span class="badge badge-tolak">Ditolak</span>
                                            @else
                                                <span class="badge badge-proses">{{ $item->status ?? 'Dalam proses' }}</span>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" style="text-align: center; padding: 30px; color: #94a3b8; font-style: italic;">
                                            <i class="fa-solid fa-folder-open" style="font-size: 22px; margin-bottom: 6px; display: block;"></i>
                                            Tiada rekod permohonan terkini.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- announcement -->
                <div class="section-card">
                    <div class="section-header-row">
                        <h2 class="section-header">
                            <i class="fa-solid fa-bullhorn" style="color: #29158f; font-size: 16px;"></i>
                            Pengumuman
                        </h2>
                    </div>

                    <div class="announcement-item">
                        <div class="announcement-icon">
                            <i class="fa-solid fa-screwdriver-wrench"></i>
                        </div>
                        <div>
                            <div class="announcement-title">Penyelenggaraan sistem</div>
                            <div class="announcement-desc">Sistem iMohon akan ditutup sementara pada 18 Mei 2026 (Ahad) dari 12.00 pagi hingga 6.00 pagi.</div>
                        </div>
                    </div>

                    <div class="announcement-item" style="border-left-color: #10b981;">
                        <div class="announcement-icon" style="background-color: #ecfdf5; color: #10b981;">
                            <i class="fa-solid fa-laptop"></i>
                        </div>
                        <div>
                            <div class="announcement-title">Pertambahan alatan ICT</div>
                            <div class="announcement-desc">Beberapa peralatan ICT baharu telah ditambah ke dalam inventori. Sila buat permohonan mengikut keperluan unit.</div>
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

        toggleBtn.addEventListener('click', function () {
            
            sidebar.classList.toggle('collapsed');

            //ikon kiri kanan
            if (sidebar.classList.contains('collapsed')) {
                toggleBtn.classList.remove('fa-angles-left');
                toggleBtn.classList.add('fa-angles-right');
            } else {
                toggleBtn.classList.remove('fa-angles-right');
                toggleBtn.classList.add('fa-angles-left');
            }
        });
    });
</script>
</body>
</html>
