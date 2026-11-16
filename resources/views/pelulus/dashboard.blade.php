<!DOCTYPE html>
<html lang="ms">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Pelulus - iMohon</title>
    
    <!-- FontAwesome Font -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

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

        .page-sub {
            color: #64748b;
            font-size: 13.5px;
            margin-bottom: 24px;
        }

        /* STATS CARDS */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-bottom: 26px;
        }

        @media (max-width: 900px) {
            .stats-grid {
                grid-template-columns: 1fr;
            }
        }

        .stat-card {
            background: white;
            border-radius: 16px;
            padding: 22px 24px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.04);
            display: flex;
            align-items: center;
            gap: 18px;
            border-left: 5px solid transparent;
            transition: transform 0.2s ease;
        }

        .stat-card:hover {
            transform: translateY(-2px);
        }

        .stat-card.card-yellow { border-left-color: #eab308; }
        .stat-card.card-green  { border-left-color: #16a34a; }
        .stat-card.card-red    { border-left-color: #dc2626; }

        .stat-icon {
            width: 52px;
            height: 52px;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            flex-shrink: 0;
        }

        .bg-yellow-light {
            background-color: #fef9c3;
            color: #ca8a04;
        }

        .bg-green-light {
            background-color: #dcfce7;
            color: #16a34a;
        }

        .bg-red-light {
            background-color: #fee2e2;
            color: #dc2626;
        }

        .stat-info .title {
            font-size: 13px;
            color: #64748b;
            font-weight: 600;
            display: block;
            margin-bottom: 4px;
        }

        .stat-info .value {
            font-size: 30px;
            font-weight: 800;
            color: #0f172a;
            line-height: 1.1;
        }

        /* TABLE CARD */
        .card-box {
            background: white;
            border-radius: 16px;
            padding: 25px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.04);
        }

        .table-header-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 18px;
        }

        .table-heading {
            font-size: 17px;
            font-weight: 700;
            color: #0f172a;
        }

        .btn-lihat-semua {
            color: #29158f;
            background-color: #eef2ff;
            padding: 7px 14px;
            border-radius: 9px;
            text-decoration: none;
            font-size: 12.5px;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            transition: background 0.2s, color 0.2s;
        }

        .btn-lihat-semua:hover {
            background-color: #29158f;
            color: #ffffff;
        }

        .custom-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 13.5px;
        }

        .custom-table th {
            background-color: #e0e7ff;
            color: #3730a3;
            padding: 13px 16px;
            text-align: center;
            font-weight: 600;
        }

        .custom-table th:first-child { border-radius: 10px 0 0 10px; }
        .custom-table th:last-child  { border-radius: 0 10px 10px 0; }

        .custom-table tbody tr {
            border-bottom: 1px solid #f1f5f9;
            transition: background 0.15s;
        }

        .custom-table tbody tr:hover {
            background-color: #f8fafc;
        }

        .custom-table td {
            padding: 14px 16px;
            color: #334155;
            text-align: center;
        }

        .badge {
            padding: 5px 13px;
            border-radius: 50px;
            font-size: 11.5px;
            font-weight: 600;
            display: inline-block;
            min-width: 88px;
        }

        .badge-proses { background-color: #fef3c7; color: #92400e; }
        .badge-lulus  { background-color: #dcfce7; color: #166534; }
        .badge-tolak  { background-color: #fee2e2; color: #991b1b; }

        .btn-action-edit {
            width: 32px;
            height: 32px;
            border-radius: 8px;
            background-color: #eef2ff;
            color: #29158f;
            text-decoration: none;
            font-size: 14px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            transition: all 0.2s;
        }

        .btn-action-edit:hover {
            background-color: #29158f;
            color: #ffffff;
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
                <a href="{{ route('pelulus.dashboard') }}" class="nav-link active">
                    <i class="fa-solid fa-house"></i>
                    <span>Laman utama</span>
                </a>
            </li>
            <li>
                <a href="{{ route('pelulus.kelulusan') }}" class="nav-link">
                    <i class="fa-solid fa-circle-check"></i>
                    <span>Kelulusan</span>
                </a>
            </li>
            <li>
                <a href="{{ route('pelulus.profile.user') }}" class="nav-link">
                    <i class="fa-solid fa-users"></i>
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

        <!-- TOP HEADER -->
        <header class="top-header">
            <div class="user-profile">
                <span>{{ Auth::user()->name ?? 'Pelulus' }}</span>
                <div class="user-avatar">
                    <i class="fa-solid fa-user"></i>
                </div>
            </div>
        </header>

        <!-- CONTENT BODY -->
        <main class="content-body">

            <h1 class="page-title">Laman Utama Pelulus</h1>
            <p class="page-sub">Ringkasan status dan senarai permohonan peralatan ICT yang perlu disemak</p>

           
            <div class="stats-grid">
                <div class="stat-card card-yellow">
                    <div class="stat-icon bg-yellow-light">
                        <i class="fa-solid fa-hourglass-half"></i>
                    </div>
                    <div class="stat-info">
                        <span class="title">Menunggu kelulusan</span>
                        <span class="value">{{ $menungguCount ?? 0 }}</span>
                    </div>
                </div>

                <div class="stat-card card-green">
                    <div class="stat-icon bg-green-light">
                        <i class="fa-solid fa-circle-check"></i>
                    </div>
                    <div class="stat-info">
                        <span class="title">Diterima</span>
                        <span class="value">{{ $diterimaCount ?? 0 }}</span>
                    </div>
                </div>

                <div class="stat-card card-red">
                    <div class="stat-icon bg-red-light">
                        <i class="fa-solid fa-circle-xmark"></i>
                    </div>
                    <div class="stat-info">
                        <span class="title">Ditolak</span>
                        <span class="value">{{ $ditolakCount ?? 0 }}</span>
                    </div>
                </div>
            </div>

            
            <div class="card-box">
                <div class="table-header-bar">
                    <span class="table-heading">Permohonan Terkini</span>
                    <a href="{{ route('pelulus.kelulusan') }}" class="btn-lihat-semua">
                        Lihat semua <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </div>

                <div style="overflow-x: auto;">
                    <table class="custom-table">
                        <thead>
                            <tr>
                                <th style="text-align: left;">ID Permohonan</th>
                                <th>Tarikh mohon</th>
                                <th style="text-align: left;">Pemohon</th>
                                <th>Jabatan / Unit</th>
                                <th style="text-align: left;">Item</th>
                                <th>Jenis</th>
                                <th>Status</th>
                                <th>Tindakan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($permohonanTerkini ?? [] as $item)
                                <tr>
                                    <td style="text-align: left; font-weight: 700; color: #1e0b75;">
                                        {{ $item->id_permohonan ?? 'REQ'.str_pad($item->id, 3, '0', STR_PAD_LEFT) }}
                                    </td>
                                    <td>{{ \Carbon\Carbon::parse($item->created_at)->format('d/m/Y') }}</td>
                                    <td style="text-align: left; font-weight: 600; color: #0f172a;">
                                        {{ $item->user->name ?? $item->nama_pemohon ?? '-' }}
                                    </td>
                                    <td>{{ $item->jabatan ?? $item->unit ?? 'STM' }}</td>
                                    <td style="text-align: left;">{{ $item->nama_item ?? '-' }}</td>
                                    <td>{{ $item->jenis_permohonan ?? 'Baru' }}</td>
                                    <td>
                                        @if(in_array(strtolower($item->status ?? ''), ['diterima', 'terima', 'lulus']))
                                            <span class="badge badge-lulus">Diterima</span>
                                        @elseif(strtolower($item->status ?? '') == 'ditolak')
                                            <span class="badge badge-tolak">Ditolak</span>
                                        @else
                                            <span class="badge badge-proses">Menunggu</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('pelulus.kelulusan') }}" class="btn-action-edit" title="Proses Permohonan">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" style="text-align: center; color: #94a3b8; padding: 35px; font-style: italic;">
                                        Tiada rekod permohonan ditemui.
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