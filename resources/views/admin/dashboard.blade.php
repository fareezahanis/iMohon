<!DOCTYPE html>
<html lang="ms">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - iMohon</title>

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

        /* sidebar left */
        .sidebar {
            width: 260px;
            background-color: #29158f;
            color: white;
            display: flex;
            flex-direction: column;
            padding: 25px 20px;
            flex-shrink: 0;
        }

        .sidebar-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 40px;
        }

        .sidebar.collapsed {
            width: 80px;
        }

        .sidebar.collapsed .brand-name,
        .sidebar.collapsed .nav-link span {
            display: none;
        }

        .sidebar.collapsed .nav-link {
         justify-content: center;
         padding: 12px 0;
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

        /* MAIN WRAPPER RIGHT */
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
            color: #111;
            margin-bottom: 25px;
        }

        /* STATS CARDS GRID */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat-card {
            background: white;
            border-radius: 16px;
            padding: 20px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.03);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .stat-title {
            font-size: 13px;
            color: #64748b;
            font-weight: 600;
            margin-bottom: 15px;
        }

        .stat-bottom {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .stat-icon {
            width: 42px;
            height: 42px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
        }

        .stat-value {
            font-size: 28px;
            font-weight: bold;
            color: #1e293b;
        }

        /* COLORS FOR STAT CARDS */
        .bg-purple { background-color: #e0e7ff; color: #4338ca; }
        .bg-blue { background-color: #e0f2fe; color: #0369a1; }
        .bg-yellow { background-color: #fef3c7; color: #d97706; }
        .bg-green { background-color: #dcfce7; color: #15803d; }
        .bg-red { background-color: #fee2e2; color: #b91c1c; }

        /* DASHBOARD TABLES GRID */
        .tables-grid {
            display: grid;
            grid-template-columns: 1fr 1.6fr;
            gap: 25px;
        }

        .card-box {
            background: white;
            border-radius: 16px;
            padding: 25px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.03);
        }

        .card-box-title {
            font-size: 20px;
            font-weight: bold;
            color: #111;
            margin-bottom: 20px;
        }

        .custom-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 13px;
        }

        .custom-table th {
            background-color: #e0e7ff;
            color: #3730a3;
            padding: 12px 16px;
            text-align: left;
            font-weight: 600;
        }

        .custom-table td {
            padding: 14px 16px;
            color: #334155;
            border-bottom: 1px solid #f1f5f9;
        }

        /* STATUS BADGES */
        .badge {
            padding: 4px 12px;
            border-radius: 12px;
            font-size: 11px;
            font-weight: 600;
            display: inline-block;
        }
        .badge-proses { background-color: #fef3c7; color: #b45309; }
        .badge-lulus { background-color: #bbf7d0; color: #15803d; }
        .badge-tolak { background-color: #fecaca; color: #b91c1c; }
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
                <a href="{{ route('admin.dashboard') }}" class="nav-link active">
                    <i class="fa-solid fa-house"></i>
                    <span>Laman utama</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.inventori') }}" class="nav-link">
                    <i class="fa-solid fa-boxes-stacked"></i>
                    <span>Inventori peralatan</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.vendor') }}" class="nav-link">
                    <i class="fa-solid fa-clipboard-list"></i>
                    <span>Vendor</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.peminjaman') }}" class="nav-link">
                    <i class="fa-solid fa-pen-to-square"></i>
                    <span>Rekod Penempatan</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.pengguna') }}" class="nav-link">
                    <i class="fa-solid fa-users"></i>
                    <span>Pengguna</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.kelulusan') }}" class="nav-link">
                    <i class="fa-solid fa-circle-check"></i>
                    <span>Permohonan Baru</span>
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
                <span>{{ Auth::user()->name ?? 'Admin' }}</span>
                <div class="user-avatar">
                    <i class="fa-solid fa-user"></i>
                </div>
            </div>
        </header>

        <!-- CONTENT BODY -->
        <main class="content-body">

            <h1 class="page-title">Laman utama</h1>

            <!-- 5 STAT CARDS -->
            <div class="stats-grid">
                <div class="stat-card">
                    <span class="stat-title">Jumlah inventori</span>
                    <div class="stat-bottom">
                        <div class="stat-icon bg-purple"><i class="fa-solid fa-boxes-stacked"></i></div>
                        <span class="stat-value">289</span>
                    </div>
                </div>

                <div class="stat-card">
                    <span class="stat-title">Jumlah permohonan</span>
                    <div class="stat-bottom">
                        <div class="stat-icon bg-blue"><i class="fa-solid fa-file-invoice"></i></div>
                        <span class="stat-value">{{ $permohonanBaru  }}</span>
                    </div>
                </div>

                <div class="stat-card">
                    <span class="stat-title">Dalam proses</span>
                    <div class="stat-bottom">
                        <div class="stat-icon bg-yellow"><i class="fa-solid fa-rotate"></i></div>
                        <span class="stat-value">{{ $dalamProses  }}</span>
                    </div>
                </div>

                <div class="stat-card">
                    <span class="stat-title">Lulus</span>
                    <div class="stat-bottom">
                        <div class="stat-icon bg-green"><i class="fa-solid fa-check"></i></div>
                        <span class="stat-value">{{ $lulus  }}</span>
                    </div>
                </div>

                <div class="stat-card">
                    <span class="stat-title">Ditolak</span>
                    <div class="stat-bottom">
                        <div class="stat-icon bg-red"><i class="fa-solid fa-xmark"></i></div>
                        <span class="stat-value">{{ $ditolak  }}</span>
                    </div>
                </div>
            </div>

            <!-- JADUAL INVENTORI & PERMOHONAN TERKINI -->
            <div class="tables-grid">

                <!-- JADUAL 1: INVENTORI -->
                <div class="card-box">
                    <h2 class="card-box-title">Inventori</h2>
                    <table class="custom-table">
                        <thead>
                            <tr>
                                <th>Kategori</th>
                                <th style="text-align: right;">Jumlah</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr><td>Komputer riba</td><td style="text-align: right; font-weight: bold;">260</td></tr>
                            <tr><td>Komputer</td><td style="text-align: right; font-weight: bold;">251</td></tr>
                            <tr><td>Skrin layar</td><td style="text-align: right; font-weight: bold;">30</td></tr>
                            <tr><td>Printer</td><td style="text-align: right; font-weight: bold;">27</td></tr>
                            <tr><td>Projektor</td><td style="text-align: right; font-weight: bold;">14</td></tr>
                        </tbody>
                    </table>
                </div>

                <!-- JADUAL 2: PERMOHONAN TERKINI -->
                <div class="card-box">
                    <h2 class="card-box-title">Permohonan terkini</h2>
                    <table class="custom-table">
                        <thead>
                            <tr>
                                <th>ID Permohonan</th>
                                <th>Nama</th>
                                <th>Item</th>
                                <th>Tarikh mohon</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($permohonanTerkini as $item)
                                <tr>
                                    <!-- ID Permohonan Dynamic Dari Database -->
                                    <td>{{ str_pad($item->id_permohonan, 3, '0', STR_PAD_LEFT) }}</td>

                                    <!-- Nama Pemohon -->
                                    <td>{{ $item->nama_penerima }}</td>

                                    <!-- Peralatan/Item yang Dimohon -->
                                    <td>{{ $item->nama_item }}</td>

                                    <!-- Tarikh Mohon -->
                                    <td>{{ \Carbon\Carbon::parse($item->created_at)->format('d M Y') }}</td>

                                    <!-- Status -->
                                    <td>
                                        @if(strtolower($item->status ?? '') == 'lulus')
                                            <span class="badge badge-lulus">Lulus</span>
                                        @elseif(strtolower($item->status ?? '') == 'ditolak')
                                            <span class="badge badge-tolak">Ditolak</span>
                                        @else
                                            <span class="badge badge-proses">{{ $item->status ?? 'Dalam proses' }}</span>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" style="text-align: center; color: #888; padding: 20px;">
                                        Tiada rekod permohonan ditemui dalam pangkalan data.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>

        </main>

    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // 1. Sidebar Toggle
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