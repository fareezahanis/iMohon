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

        /*sidebar left*/
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
        
        .sidebar.collapsed{ 
            width: 80px;
            padding: 25px 12px;
        }

        .sidebar.collapsed .brand-name,
        .sidebar.collapsed .nav-link span {
            display: none;
        }

        .sidebar.collapsed .nav-link{
            justify-content: center;
        }

        .sidebar.collapsed .brand-logo img{
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

        /*menu dalam sidebar*/
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
        }

        /* main content */
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

        /* CONTENT CONTAINER */
        .content-body {
            padding: 30px 40px 40px;
            width: 100%;
        }

        .welcome-title {
            font-size: 28px;
            font-weight: bold;
            color: #111;
        }

        .welcome-sub {
            color: #666;
            font-size: 14px;
            margin-bottom: 25px;
        }

        /* STATS CARDS GRID */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat-card {
            background: white;
            border-radius: 16px;
            padding: 20px;
            display: flex;
            align-items: center;
            gap: 15px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.04);
        }

        .stat-icon {
            width: 50px;
            height: 50px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
        }

        .icon-blue { background-color: #e0f2fe; color: #0284c7; }
        .icon-yellow { background-color: #fef9c3; color: #ca8a04; }
        .icon-green { background-color: #dcfce7; color: #16a34a; }
        .icon-red { background-color: #fee2e2; color: #dc2626; }

        .stat-info .stat-label {
            font-size: 12px;
            color: #777;
        }

        .stat-info .stat-value {
            font-size: 24px;
            font-weight: bold;
            color: #222;
        }

        /* DASHBOARD LOWER LAYOUT */
        .dashboard-grid {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 25px;
        }

        .section-card {
            background: white;
            border-radius: 18px;
            padding: 25px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.04);
        }

        .section-header {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 20px;
            color: #111;
        }

        /* TABLE STYLES */
        .recent-table {
            width: 100%;
            border-collapse: collapse;
        }

        .recent-table th {
            background-color: #e8e5ff;
            color: #29158f;
            text-align: left;
            padding: 12px 15px;
            font-size: 13px;
        }

        .recent-table th:first-child { border-radius: 8px 0 0 8px; }
        .recent-table th:last-child { border-radius: 0 8px 8px 0; }

        .recent-table td {
            padding: 14px 15px;
            font-size: 13px;
            color: #333;
            border-bottom: 1px solid #eee;
        }

        /* STATUS BADGES */
        .badge {
            padding: 5px 12px;
            border-radius: 12px;
            font-size: 11px;
            font-weight: bold;
            display: inline-block;
        }

        .badge-pending { background-color: #fef9c3; color: #854d0e; }
        .badge-approved { background-color: #dcfce7; color: #166534; }
        .badge-rejected { background-color: #fee2e2; color: #991b1b; }

        /* ANNOUNCEMENTS */
        .announcement-item {
            background-color: #f8f9fa;
            border-radius: 12px;
            padding: 15px;
            display: flex;
            gap: 15px;
            margin-bottom: 15px;
        }

        .announcement-icon {
            width: 40px;
            height: 40px;
            background-color: #e2e8f0;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #475569;
            flex-shrink: 0;
        }

        .announcement-title {
            font-size: 13px;
            font-weight: bold;
            color: #1e293b;
            margin-bottom: 4px;
        }

        .announcement-desc {
            font-size: 11px;
            color: #64748b;
            line-height: 1.4;
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
            <i class="fa-solid fa-angles-left" id="toggleSidebar" style="cursor: pointer; font-size: 18px; opacity: 0.7;"></i>
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
                <!-- LOGOUT FORM -->
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
            
            <h1 class="welcome-title">Selamat datang, {{ Auth::user()->name }}</h1>
            <p class="welcome-sub">Sistem Permohonan Peralatan ICT</p>

            <!-- 4 STATS CARDS -->
            <div class="stats-grid">
    <!-- JUMLAH PERMOHONAN -->
    <div class="stat-card">
        <div class="stat-icon icon-blue">
            <i class="fa-solid fa-clipboard-list"></i>
        </div>
        <div class="stat-info">
            <div class="stat-label">Jumlah permohonan</div>
            <div class="stat-value">{{ $jumlahSemua  }}</div>
        </div>
    </div>

    <!-- DALAM PROSES -->
    <div class="stat-card">
        <div class="stat-icon icon-yellow">
            <i class="fa-regular fa-clock"></i>
        </div>
        <div class="stat-info">
            <div class="stat-label">Dalam proses</div>
            <div class="stat-value">{{ $jumlahProses  }}</div>
        </div>
    </div>

    <!-- DILULUSKAN -->
    <div class="stat-card">
        <div class="stat-icon icon-green">
            <i class="fa-solid fa-check"></i>
        </div>
        <div class="stat-info">
            <div class="stat-label">Diterima</div>
            <div class="stat-value">{{ $jumlahTerima }}</div>
        </div>
    </div>

    <!-- DITOLAK -->
    <div class="stat-card">
        <div class="stat-icon icon-red">
            <i class="fa-solid fa-xmark"></i>
        </div>
        <div class="stat-info">
            <div class="stat-label">Ditolak</div>
            <div class="stat-value">{{ $jumlahTolak }}</div>
        </div>
    </div>
</div>

            <!-- DASHBOARD LOWER CONTENT GRID -->
            <div class="dashboard-grid">

                <!-- RECENT APPLICATIONS TABLE -->
                <div class="section-card">
    <h2 class="section-header">Permohonan terkini</h2>

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
                    <td>{{ $item->id_permohonan }}</td>
                    <td>{{ $item->nama_item }}</td>
                    <td>{{ \Carbon\Carbon::parse($item->tarikh_mohon)->translatedFormat('d/m/y') }}</td>
                    <td>
                        @if($item->status == 'Dalam proses')
                            <span class="badge badge-pending">Dalam proses</span>
                        @elseif($item->status == 'Diterima')
                            <span class="badge badge-approved">Diterima</span>
                        @elseif($item->status == 'Ditolak')
                            <span class="badge badge-rejected">Ditolak</span>
                        @else
                            <span class="badge badge-pending">{{ $item->status }}</span>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" style="text-align: center; padding: 20px; color: #64748b;">
                        Tiada rekod permohonan terkini.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

                <!-- ANNOUNCEMENTS SECTION -->
                <div class="section-card">
                    <h2 class="section-header">Pengumuman</h2>

                    <div class="announcement-item">
                        <div class="announcement-icon">
                            <i class="fa-solid fa-bullhorn"></i>
                        </div>
                        <div>
                            <div class="announcement-title">Penyelenggaraan sistem</div>
                            <div class="announcement-desc">Sistem iMohon akan ditutup sementara pada 18 Mei 2026 (Ahad) dari 12.00 pagi hingga 6.00 pagi.</div>
                        </div>
                    </div>

                    <div class="announcement-item">
                        <div class="announcement-icon">
                            <i class="fa-solid fa-bullhorn"></i>
                        </div>
                        <div>
                            <div class="announcement-title">Pertambahan alatan ICT</div>
                            <div class="announcement-desc">Beberapa peralatan ICT telah ditambah. Lihat senarai item.</div>
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
