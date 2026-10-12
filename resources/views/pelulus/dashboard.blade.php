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



        .stats-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-bottom: 25px;
            max-width: 900px;
        }

        .stat-card {
            background: white;
            border-radius: 16px;
            padding: 20px 24px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.03);
            display: flex;
            align-items: center;
            gap: 20px;
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

        .bg-yellow-light {
            background-color: #fef08a;
            color: #a16207;
        }

        .bg-green-light {
            background-color: #bbf7d0;
            color: #15803d;
        }

        .bg-red-light {
            background-color: #fecaca;
            color: #b91c1c;
        }

        .stat-info .title {
            font-size: 13px;
            color: #64748b;
            font-weight: 600;
            display: block;
            margin-bottom: 6px;
        }

        .stat-info .value {
            font-size: 28px;
            font-weight: bold;
            color: #1e293b;
        }

      
        .card-box {
            background: white;
            border-radius: 16px;
            padding: 25px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.03);
        }

        .table-top-link {
            display: flex;
            justify-content: flex-end;
            margin-bottom: 15px;
        }

        .btn-lihat-semua {
            color: #29158f;
            text-decoration: none;
            font-size: 13px;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 6px;
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
            text-align: center;
            font-weight: 600;
        }

        .custom-table td {
            padding: 14px 16px;
            color: #334155;
            text-align: center;
            border-bottom: 1px solid #f1f5f9;
        }

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

        .btn-action-edit {
            color: #111;
            text-decoration: none;
            font-size: 15px;
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

    <div class="main-wrapper">

        <!-- TOP HEADER -->
        <header class="top-header">
            <div class="user-profile">
                <span>Pelulus</span>
                <div class="user-avatar">
                    <i class="fa-solid fa-user"></i>
                </div>
            </div>
        </header>

        <!-- CONTENT BODY -->
        <main class="content-body">

            
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-icon bg-yellow-light">
                <i class="fa-solid fa-hourglass-start"></i>
            </div>
        <div class="stat-info">
                <span class="title">Menunggu kelulusan</span>
                <span class="value">{{ $menungguCount ?? 0 }}</span>
        </div>
    </div>

        <div class="stat-card">
            <div class="stat-icon bg-green-light">
                <i class="fa-solid fa-check"></i>
        </div>
        <div class="stat-info">
            <span class="title">Lulus</span>
            <span class="value">{{ $lulusCount ?? 0 }}</span>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon bg-red-light">
                <i class="fa-solid fa-xmark"></i>
        </div>
        <div class="stat-info">
                <span class="title">Ditolak</span>
                <span class="value">{{ $ditolakCount ?? 0 }}</span>
        </div>
    </div>
</div>

            <!-- JADUAL PERMOHONAN -->
            <div class="card-box">
                <div class="table-top-link">
                    <a href="{{ route('pelulus.kelulusan') }}" class="btn-lihat-semua">
                        Lihat semua <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </div>

                <table class="custom-table">
                    <thead>
                        <tr>
                            <th>ID Permohonan</th>
                            <th>Tarikh mohon</th>
                            <th>Pemohon</th>
                            <th>Jabatan/Unit</th>
                            <th>Item</th>
                            <th>Jenis</th>
                            <th>Status</th>
                            <th>Tindakan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($permohonanTerkini ?? [] as $item)
                            <tr>
                                <td>{{ $item->id_permohonan ?? 'REQ'.str_pad($item->id, 3, '0', STR_PAD_LEFT) }}</td>
                                <td>{{ \Carbon\Carbon::parse($item->created_at)->format('j M Y') }}</td>
                                <td>{{ $item->user->name ?? $item->nama_pemohon ?? '-' }}</td>
                                <td>{{ $item->jabatan ?? $item->unit ?? 'STM' }}</td>
                                <td>{{ $item->nama_item ?? '-' }}</td>
                                <td>{{ $item->jenis_permohonan ?? 'Baru' }}</td>
                                <td>
                                    @if(in_array(strtolower($item->status ?? ''), ['lulus', 'terima', 'diterima']))
                                        <span class="badge badge-lulus">Lulus</span>
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
                                <td colspan="8" style="text-align: center; color: #888; padding: 20px;">
                                    Tiada rekod permohonan ditemui.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </main>

    </div>

    <!-- SCRIPT SIDEBAR TOGGLE -->
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