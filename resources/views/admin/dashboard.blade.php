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

        /* SIDEBAR LEFT */
        .sidebar {
            width: 260px;
            background-color: #29158f;
            color: white;
            display: flex;
            flex-direction: column;
            padding: 25px 20px;
            flex-shrink: 0;
            transition: width 0.3s ease;
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
            color: #0f172a;
            margin-bottom: 4px;
        }

        .page-subtitle {
            font-size: 13px;
            color: #64748b;
            margin-bottom: 24px;
        }

        
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 18px;
            margin-bottom: 28px;
        }

        .stat-card {
            background: white;
            border-radius: 14px;
            padding: 18px 20px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.03);
            display: flex;
            align-items: center;
            gap: 15px;
            border-left: 4px solid #29158f;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .stat-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 18px rgba(0, 0, 0, 0.06);
        }

        .stat-icon {
            width: 45px;
            height: 45px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 19px;
            flex-shrink: 0;
        }

        .stat-info .title {
            font-size: 12px;
            color: #64748b;
            font-weight: 600;
            display: block;
            margin-bottom: 3px;
        }

        .stat-info .value {
            font-size: 22px;
            font-weight: 700;
            color: #0f172a;
        }

       
        .tables-grid {
            display: grid;
            grid-template-columns: 1fr 1.65fr;
            gap: 24px;
        }

        .card-box {
            background: white;
            border-radius: 16px;
            padding: 24px 25px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.04);
            overflow-x: auto;
        }

        .card-box-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 18px;
        }

        .card-box-title {
            font-size: 18px;
            font-weight: 700;
            color: #0f172a;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .card-box-title i {
            color: #29158f;
            font-size: 17px;
        }

        .custom-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 13px;
        }

        .custom-table th {
            background-color: #e0e7ff;
            color: #3730a3;
            padding: 12px 15px;
            text-align: left;
            font-weight: 600;
        }

        .custom-table td {
            padding: 14px 15px;
            color: #334155;
            border-bottom: 1px solid #f1f5f9;
        }

        .custom-table tbody tr:hover {
            background-color: #f8fafc;
        }

        
        .pill-count {
            background: #eef2ff;
            color: #29158f;
            padding: 4px 12px;
            border-radius: 14px;
            font-weight: 700;
            font-size: 12px;
            display: inline-block;
            min-width: 45px;
            text-align: center;
        }

        .id-badge {
            background: #f1f5f9;
            color: #0f172a;
            padding: 3px 9px;
            border-radius: 6px;
            font-family: monospace;
            font-weight: 700;
            font-size: 12px;
        }

        .badge {
            padding: 4px 12px;
            border-radius: 14px;
            font-size: 11px;
            font-weight: 600;
            display: inline-block;
        }

        .badge-proses { background-color: #fef3c7; color: #b45309; }
        .badge-lulus  { background-color: #dcfce7; color: #166534; }
        .badge-tolak  { background-color: #fee2e2; color: #991b1b; }
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

   
    <div class="main-wrapper">

        
        <header class="top-header">
            <div class="user-profile">
                <span>Admin</span>
                <div class="user-avatar">
                    <i class="fa-solid fa-user"></i>
                </div>
            </div>
        </header>

       
        <main class="content-body">

            <h1 class="page-title">Laman utama</h1>
            <p class="page-subtitle">Ringkasan keseluruhan stok peralatan dan status permohonan semasa</p>

           
            <div class="stats-grid">
                <div class="stat-card" style="border-left-color: #29158f;">
                    <div class="stat-icon" style="background: #eef2ff; color: #29158f;">
                        <i class="fa-solid fa-boxes-stacked"></i>
                    </div>
                    <div class="stat-info">
                        <span class="title">Jumlah inventori</span>
                        <span class="value">{{ number_format($jumlahInventori ?? 0) }}</span>
                    </div>
                </div>

                <div class="stat-card" style="border-left-color: #8b5cf6;">
                    <div class="stat-icon" style="background: #f5f3ff; color: #8b5cf6;">
                        <i class="fa-solid fa-file-invoice"></i>
                    </div>
                    <div class="stat-info">
                        <span class="title">Jumlah permohonan</span>
                        <span class="value" style="color: #8b5cf6;">{{ $permohonanBaru }}</span>
                    </div>
                </div>

                <div class="stat-card" style="border-left-color: #f59e0b;">
                    <div class="stat-icon" style="background: #fef3c7; color: #d97706;">
                        <i class="fa-solid fa-rotate"></i>
                    </div>
                    <div class="stat-info">
                        <span class="title">Dalam proses</span>
                        <span class="value" style="color: #d97706;">{{ $dalamProses }}</span>
                    </div>
                </div>

                <div class="stat-card" style="border-left-color: #10b981;">
                    <div class="stat-icon" style="background: #ecfdf5; color: #10b981;">
                        <i class="fa-solid fa-check"></i>
                    </div>
                    <div class="stat-info">
                        <span class="title">Diterima</span>
                        <span class="value" style="color: #10b981;">{{ $diterima }}</span>
                    </div>
                </div>

                <div class="stat-card" style="border-left-color: #ef4444;">
                    <div class="stat-icon" style="background: #fef2f2; color: #ef4444;">
                        <i class="fa-solid fa-xmark"></i>
                    </div>
                    <div class="stat-info">
                        <span class="title">Ditolak</span>
                        <span class="value" style="color: #ef4444;">{{ $ditolak }}</span>
                    </div>
                </div>
            </div>

            
            <div class="tables-grid">

                <!-- JADUAL INVENTORI MENGIKUT KATEGORI -->
                <div class="card-box">
                    <div class="card-box-header">
                        <h2 class="card-box-title">
                            <i class="fa-solid fa-layer-group"></i> Inventori
                        </h2>
                        <a href="{{ route('admin.inventori') }}" style="font-size: 12px; color: #29158f; text-decoration: none; font-weight: 600;">
                            Lihat semua <i class="fa-solid fa-arrow-right" style="font-size: 10px;"></i>
                        </a>
                    </div>
                    <table class="custom-table">
                        <thead>
                            <tr>
                                <th>Kategori</th>
                                <th style="text-align: right;">Jumlah</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($inventoriKuantiti as $kategori => $total)
                                <tr>
                                    <td style="font-weight: 600; color: #0f172a;">{{ $kategori }}</td>
                                    <td style="text-align: right;">
                                        <span class="pill-count">{{ number_format($total) }}</span>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="2" style="text-align: center; color: #94a3b8; padding: 25px; font-style: italic;">
                                        Tiada rekod peralatan dijumpai.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                
                <div class="card-box">
                    <div class="card-box-header">
                        <h2 class="card-box-title">
                            <i class="fa-solid fa-clock-rotate-left"></i> Permohonan terkini
                        </h2>
                        <a href="{{ route('admin.kelulusan') }}" style="font-size: 12px; color: #29158f; text-decoration: none; font-weight: 600;">
                            Lihat semua <i class="fa-solid fa-arrow-right" style="font-size: 10px;"></i>
                        </a>
                    </div>
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
                                    <td>
                                        <span class="id-badge">{{ str_pad($item->id_permohonan, 3, '0', STR_PAD_LEFT) }}</span>
                                    </td>
                                    <td style="font-weight: 600; color: #0f172a;">{{ $item->nama_penerima }}</td>
                                    <td>{{ $item->nama_item }}</td>
                                    <td style="color: #64748b;">{{ \Carbon\Carbon::parse($item->created_at)->format('d M Y') }}</td>
                                    <td>
                                        @php
                                            $statusUtama = strtolower($item->status ?? '');
                                        @endphp

                                        @if(in_array($statusUtama, ['diterima', 'lulus', 'terima']))
                                            <span class="badge badge-lulus">Diterima</span>
                                        @elseif($statusUtama == 'ditolak')
                                            <span class="badge badge-tolak">Ditolak</span>
                                        @else
                                            <span class="badge badge-proses">{{ $item->status ?? 'Dalam proses' }}</span>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" style="text-align: center; color: #94a3b8; padding: 25px; font-style: italic;">
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