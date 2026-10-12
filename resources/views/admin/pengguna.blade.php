<!DOCTYPE html>
<html lang="ms">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengguna - iMohon</title>

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

        .page-header {
            margin-bottom: 20px;
        }

        .page-title {
            font-size: 28px;
            font-weight: bold;
            color: #111;
            margin-bottom: 4px;
        }

        .page-subtitle {
            font-size: 13px;
            color: #64748b;
        }
         .logout-btn {
            background: none;
            border: none;
            width: 100%;
            cursor: pointer;
            text-align: left;
            font-family: inherit;
        }
        
        .sidebar.collapsed {
            width: 80px !important;
            padding: 25px 10px;
        }

        .sidebar.collapsed .brand-name,
        .sidebar.collapsed .nav-link span {
            display: none !important;
        }

        .sidebar.collapsed .nav-link {
            justify-content: center;
            padding: 12px 0;
        }

        .sidebar.collapsed .sidebar-header {
            justify-content: center;
            margin-bottom: 30px;
        }

        /* STATS CARDS */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-bottom: 25px;
            max-width: 900px;
        }

        .stat-card {
            background: white;
            padding: 20px 24px;
            border-radius: 16px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.03);
            display: flex;
            align-items: center;
            gap: 20px;
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

        .stat-icon {
            width: 50px;
            height: 50px;
            border-radius: 12px;
            background-color: #e0e7ff;
            color: #1e0b75;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
        }

        .bg-purple-light { background-color: #e9d5ff; color: #7e22ce; }
        .bg-pink-light { background-color: #fbcfe8; color: #be185d; }
        .bg-green-light { background-color: #bbf7d0; color: #15803d; }

        /* FILTER & SEARCH BAR */
        .filter-bar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .search-box {
            background: white;
            border: 1px solid #cbd5e1;
            border-radius: 10px;
            padding: 8px 14px;
            width: 100%;
            max-width: 400px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .search-box input {
            border: none;
            outline: none;
            width: 100%;
            font-size: 13px;
            color: #334155;
        }

        .btn-add {
            background-color: #29158f;
            color: white;
            border: none;
            padding: 9px 18px;
            border-radius: 10px;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: 0.2s;
        }

        .btn-addhover {
            background-color: #2e10b3;
        }

        .close-btn {
            font-size: 24px;
            cursor: pointer;
            color: #888;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            font-size: 13px;
            font-weight: 600;
            color: #475569;
            margin-bottom: 6px;
        }

        .form-group input {
            width: 100%;
            padding: 10px 14px;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            font-size: 14px;
            outline: none;
        }

        .form-submit {
            width: 100%;
            background-color: #1e0b75;
            color: white;
            border: none;
            padding: 12px;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            margin-top: 10px;
        }

        /* TABLE PENGGUNA */
        .table-card {
            background: white;
            border-radius: 16px;
            padding: 25px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.03);
            overflow-x: auto;
        }

        .custom-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 13px;
        }

        .custom-table th {
            background-color: #e0e7ff;
            color: #3730a3;
            padding: 12px 14px;
            text-align: left;
            font-weight: 600;
        }

        .custom-table th.center, .custom-table td.center {
            text-align: center;
        }

        .custom-table td {
            padding: 14px;
            color: #334155;
            border-bottom: 1px solid #f1f5f9;
        }

        /* ROLE BADGES */
        .role-badge {
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 600;
            display: inline-block;
        }

        .role-admin { background-color: #f3e8ff; color: #6b21a8; }
        .role-pelulus { background-color: #dcfce7; color: #15803d; }
        .role-pengguna { background-color: #f1f5f9; color: #475569; }

        .action-icons i {
            cursor: pointer;
            font-size: 15px;
            color: #475569;
            margin: 0 4px;
            transition: color 0.2s;
        }

        .action-icons i:hover {
            color: #1e0b75;
        }
       

        /* popup detail */
        .modal-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            width: 100vw;
            height: 100vh;
            background: rgba(15, 23, 42, 0.55); 
            backdrop-filter: blur(4px);
            justify-content: center;
            align-items: center;
            z-index: 99999;
            animation: fadeIn 0.2s ease-in-out;
        }


        .modal-card-view {
            background: #ffffff;
            border-radius: 16px;
            width: 90%;
            max-width: 480px;
            padding: 24px 28px;
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 8px 10px -6px rgba(0, 0, 0, 0.05);
            position: relative;
            margin: auto;
            animation: slideUp 0.25s ease-out;
        }


        .modal-header-view {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            border-bottom: 1px solid #f1f5f9;
            padding-bottom: 14px;
        }

        .modal-title-view {
            font-size: 16px;
            font-weight: 700;
            color: #29158f; 
            margin: 0;
            display: flex;
            align-items: center;
                gap: 10px;
        }

        .modal-close-btn {
            cursor: pointer;
            font-size: 10px;
            color: #94a3b8;
            transition: color 0.2s ease;
        }

        


        .user-details-list {
            display: flex;
            flex-direction: column;
            gap: 12px;
            font-size: 13px;
        }

        .user-detail-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-bottom: 10px;
            border-bottom: 1px dashed #e2e8f0;
        }

        .user-detail-item:last-child {
            border-bottom: none;
            padding-bottom: 0;
        }

        .detail-label {
            color: #64748b;
            font-weight: 500;
        }

        .detail-value {
            font-weight: 600;
            color: #0f172a;
            text-align: right;
        }

/* Footer Modal & Butang Tutup */
        .modal-footer-view {
            display: flex;
            justify-content: flex-end;
            margin-top: 22px;
            padding-top: 14px;
            border-top: 1px solid #f1f5f9;
        }

        .btn-close-modal {
            padding: 9px 14px;
            background: #f1f5f9;
            color: #475569;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            font-size: 13px;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .btn-close-modal:hover {
            background: #e2e8f0;
            color: #1e293b;
        }

/* Animasi Muncul Pop-up */
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @keyframes slideUp {
            from { transform: translateY(15px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
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
            <i class="fa-solid fa-angles-left" id="toggleSidebar" style="cursor: pointer; opacity: 0.8; font-size: 18px;"></i>
        </div>

        <ul class="nav-menu">
            <li>
                <a href="{{ route('admin.dashboard') }}" class="nav-link">
                <i class="fa-solid fa-house"></i><span>Laman utama</span></a>
            </li>
            <li>
                <a href="{{ route('admin.inventori') }}" class="nav-link">
                <i class="fa-solid fa-boxes-stacked"></i><span>Inventori peralatan</span></a>
            </li>
            <li>
                <a href="{{ route('admin.vendor') }}" class="nav-link">
                <i class="fa-solid fa-clipboard-list"></i><span>Vendor</span></a>
            </li>
            <li>
                <a href="{{ route('admin.peminjaman') }}" class="nav-link"><i class="fa-solid fa-pen-to-square">
                </i><span>Rekod Penempatan</span></a>
            </li>
            <li>
                <a href="{{ route('admin.pengguna') }}" class="nav-link active">
                <i class="fa-solid fa-users"></i><span>Pengguna</span></a>
            </li>
            <li>
                <a href="{{ route('admin.kelulusan') }}" class="nav-link">
                <i class="fa-solid fa-circle-check"></i><span>Permohonan Baru</span></a>
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
                <div class="user-avatar"><i class="fa-solid fa-user"></i></div>
            </div>
        </header>

        <!-- CONTENT BODY -->
        <main class="content-body">

            <div class="page-header">
                <h1 class="page-title">Pengguna</h1>
                <p class="page-subtitle">Senarai pengguna yang berdaftar dalam sistem iMohon</p>
            </div>

            <!-- STATS CARDS (RINGKASAN) -->
            <div class="stats-grid">
    <!-- KAD 1: JUMLAH PENGGUNA -->
    <div class="stat-card">
        <div class="stat-icon bg-purple-light">
            <i class="fa-solid fa-users"></i>
        </div>
        <div class="stat-info">
            <span class="title">Jumlah pengguna</span>
            <span class="value">{{ $users->count()  }}</span>
        </div>
    </div>

    <!-- card (admin) -->
    <div class="stat-card">
        <div class="stat-icon bg-pink-light">
            <i class="fa-solid fa-user-shield"></i>
        </div>
        <div class="stat-info">
            <span class="title">Admin</span>
            <span class="value">{{ $users->where('role', 'admin')->count()  }}</span>
        </div>
    </div>

    <!-- card (pelulus) -->
    <div class="stat-card">
        <div class="stat-icon bg-green-light">
            <i class="fa-solid fa-user-check"></i>
        </div>
        <div class="stat-info">
            <span class="title">Pelulus</span>
            <span class="value">{{ $users->where('role', 'Pelulus')->count()  }}</span>
        </div>
    </div>
</div>
    <!-- search bar -->
        <div class="filter-bar" style="display: flex; justify-content: flex-start; align-items: center; gap: 12px; margin-bottom: 20px;">
    
 
    <form action="{{ route('admin.pengguna') }}" method="GET" style="width: 350px; display: flex; align-items: center;">
        <div class="search-box" style="width: 100%;">
            <i class="fa-solid fa-magnifying-glass" style="color: #94a3b8;"></i>
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama, emel, IC atau unit..." style="width: 100%; border: none; outline: none;">
        </div>

        <button type="submit" style="display: none;"></button>
    </form>

    <!--button add -->
    <button type="button" class="btn-add" id="openAddModalBtn">
        <i class="fa-solid fa-user-plus"></i> Tambah Pengguna
    </button>

</div>

            <!-- table -->
            <div class="table-card">
                <table class="custom-table">
                    <thead>
                        <tr>
                            <th class="center" style="width: 50px;">No</th>
                            <th>Nama</th>
                            <th>Emel</th>
                            <th>Unit</th>
                            <th class="center">Peranan</th>
                            <th class="center" style="width: 100px;">Butiran</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($users ?? [] as $index => $u)
                            <tr>
                                <td class="center">{{ $index + 1 }}</td>
                                <td style="font-weight: 600;">{{ $u->name }}</td>
                                <td>{{ $u->email }}</td>
                                <td>{{ $u->unit ?? 'Seksyen Teknologi Maklumat' }}</td>
                                <td class="center">
                                    <span class="role-badge {{ strtolower($u->role ?? '') == 'admin' ? 'role-admin' : (strtolower($u->role ?? '') == 'pelulus' ? 'role-pelulus' : 'role-pengguna') }}">
                                        {{ ucfirst($u->role ?? 'Pengguna') }}
                                    </span>
                                </td>
                                <td class="action-icons center">
                                    <i class="fa-solid fa-eye btn-view-user" 
                                    title="Lihat Profil"
                                    style="cursor: pointer;"
                                    data-name="{{ $u->name }}"
                                    data-ic="{{  $u->ic }}"
                                    data-phone="{{ $u->phone  }}"
                                    data-email="{{ $u->email }}"
                                    data-jawatan="{{ $u->jawatan  }}"
                                    data-unit="{{ $u->unit  }}"
                                    data-bahagian="{{ $u->bahagian  }}"
                                    data-alamat="{{ $u->address }}">
                                    </i>
                                <i class="fa-solid fa-pen-to-square" title="Kemaskini" style="cursor: pointer;"></i>
                                </td>
                                </tr>
                            @empty
                    <tr>
                        <td colspan="7" class="center" style="padding: 30px; color: #94a3b8; font-style: italic;">
                            <i class="fa-solid fa-folder-open" style="font-size: 24px; margin-bottom: 8px; display: block;"></i>
                            Tiada rekod dijumpai.
                        </td>
                     </tr>
                    @endforelse
                </tbody>
                </table>
            </div>

            </main>
            </div>

        <!-- MODAL DETAILS PENGGUNA (GAYA MAKLUMAT PERIBADI & PEKERJAAN) -->
        <div id="viewUserModal" style="display: none; position: fixed; top: 0; left: 0; right: 0; bottom: 0; width: 100vw; height: 100vh; 
        background: rgba(0, 0, 0, 0.5); justify-content: center; align-items: center; z-index: 99999;">
            <div style="background: white; border-radius: 16px; width: 90%; max-width: 600px; padding: 25px 30px; position: relative; margin: auto; box-shadow: 0 20px 25px -5px rgba(0,0,0,0.1); max-height: 90vh; overflow-y: auto;">
        
        <!-- Butang Tutup (X) -->
        <span id="closeViewModalBtn" style="position: absolute; right: 20px; top: 20px; cursor: pointer; font-size: 16px; color: #94a3b8;"><i class="fa-solid fa-xmark"></i></span>

        <!-- 1. KAD MAKLUMAT PERIBADI -->
        <div style="background: #f8fafc; border-radius: 12px; padding: 20px; margin-bottom: 20px;">
            <h3 style="font-size: 16px; font-weight: bold; color: #0f172a; margin-top: 0; margin-bottom: 15px;">Maklumat peribadi</h3>
            
            <div style="display: flex; flex-direction: column; gap: 10px; font-size: 13px;">
                <div style="display: flex; align-items: center;">
                    <span style="width: 170px; color: #64748b;">Nama penuh</span>
                    <span style="margin-right: 12px;">:</span>
                    <span id="viewUserName" style="font-weight: 600; color: #0f172a;">-</span>
                </div>
                <div style="display: flex; align-items: center;">
                    <span style="width: 170px; color: #64748b;">No. kad pengenalan</span>
                    <span style="margin-right: 12px;">:</span>
                    <span id="viewUserIC" style="font-weight: 600; color: #0f172a;">-</span>
                </div>
                <div style="display: flex; align-items: center;">
                    <span style="width: 170px; color: #64748b;">No. Tel</span>
                    <span style="margin-right: 12px;">:</span>
                    <span id="viewUserPhone" style="font-weight: 600; color: #0f172a;">-</span>
                </div>
                <div style="display: flex; align-items: center;">
                    <span style="width: 170px; color: #64748b;">Email</span>
                    <span style="margin-right: 12px;">:</span>
                    <span id="viewUserEmail" style="font-weight: 600; color: #0f172a;">-</span>
                </div>
            </div>
        </div>

        <!-- 2. KAD MAKLUMAT PEKERJAAN -->
        <div style="background: #f8fafc; border-radius: 12px; padding: 20px;">
            <h3 style="font-size: 16px; font-weight: bold; color: #0f172a; margin-top: 0; margin-bottom: 15px;">Maklumat pekerjaan</h3>
            
            <div style="display: flex; flex-direction: column; gap: 10px; font-size: 13px;">
                <div style="display: flex; align-items: center;">
                    <span style="width: 170px; color: #64748b;">Jawatan</span>
                    <span style="margin-right: 12px;">:</span>
                    <span id="viewUserJawatan" style="font-weight: 600; color: #0f172a;">-</span>
                </div>
                <div style="display: flex; align-items: center;">
                    <span style="width: 170px; color: #64748b;">Unit</span>
                    <span style="margin-right: 12px;">:</span>
                    <span id="viewUserUnit" style="font-weight: 600; color: #0f172a;">-</span>
                </div>
                <div style="display: flex; align-items: center;">
                    <span style="width: 170px; color: #64748b;">Bahagian</span>
                    <span style="margin-right: 12px;">:</span>
                    <span id="viewUserBahagian" style="font-weight: 600; color: #0f172a;">-</span>
                </div>
                <div style="display: flex; align-items: center;">
                    <span style="width: 170px; color: #64748b;">Alamat Pejabat</span>
                    <span style="margin-right: 12px;">:</span>
                    <span id="viewUserAlamat" style="font-weight: 600; color: #0f172a;">-</span>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- ADD USER  -->
<div id="addModal" style="display: none; position: fixed; top: 0; left: 0; right: 0; bottom: 0; width: 100vw; height: 100vh; background: rgba(0, 0, 0, 0.5); justify-content: center; align-items: center; z-index: 99999;">
    <div style="background: white; border-radius: 16px; width: 90%; max-width: 600px; padding: 25px 30px; position: relative; margin: auto; box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1); max-height: 90vh; overflow-y: auto;">
        
        <!-- Header Modal -->
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; border-bottom: 1px solid #f1f5f9; padding-bottom: 12px;">
            <h2 style="font-size: 18px; font-weight: bold; color: #1e0b75; margin: 0;">
                <i class="fa-solid fa-user-plus"></i> Tambah Pengguna Baharu
            </h2>
            <span id="closeAddModalBtn" style="cursor: pointer; font-size: 20px; color: #94a3b8;"><i class="fa-solid fa-xmark"></i></span>
        </div>

        <form action="{{ route('admin.pengguna.store') }}" method="POST">
            @csrf

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 12px; margin-bottom: 12px;">
                <div>
                    <label style="display: block; font-size: 12px; font-weight: 600; color: #334155; margin-bottom: 5px;">Nama Penuh <span style="color: red;">*</span></label>
                    <input type="text" name="name" required placeholder="Nama Penuh" style="width: 100%; padding: 8px 12px; border: 1px solid #cbd5e1; border-radius: 8px; font-size: 13px; box-sizing: border-box;">
                </div>
                <div>
                    <label style="display: block; font-size: 12px; font-weight: 600; color: #334155; margin-bottom: 5px;">No. Kad Pengenalan <span style="color: red;">*</span></label>
                    <input type="text" name="ic" required placeholder="Contoh: 900101145521" style="width: 100%; padding: 8px 12px; border: 1px solid #cbd5e1; border-radius: 8px; font-size: 13px; box-sizing: border-box;">
                </div>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 12px; margin-bottom: 12px;">
                <div>
                    <label style="display: block; font-size: 12px; font-weight: 600; color: #334155; margin-bottom: 5px;">Emel <span style="color: red;">*</span></label>
                    <input type="email" name="email" required placeholder="user@rtm.gov.my" style="width: 100%; padding: 8px 12px; border: 1px solid #cbd5e1; border-radius: 8px; font-size: 13px; box-sizing: border-box;">
                </div>
                <div>
                    <label style="display: block; font-size: 12px; font-weight: 600; color: #334155; margin-bottom: 5px;">No. Telefon <span style="color: red;">*</span></label>
                    <input type="text" name="phone" required placeholder="Contoh: 0123456789" style="width: 100%; padding: 8px 12px; border: 1px solid #cbd5e1; border-radius: 8px; font-size: 13px; box-sizing: border-box;">
                </div>
            </div>

  
            <div style="display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 8px; margin-bottom: 12px;">
                <div>
                    <label style="display: block; font-size: 12px; font-weight: 600; color: #334155; margin-bottom: 5px;">Jawatan <span style="color: red;">*</span></label>
                    <input type="text" name="jawatan" required placeholder="Jawatan" style="width: 100%; padding: 8px 12px; border: 1px solid #cbd5e1; border-radius: 8px; font-size: 13px; box-sizing: border-box;">
                </div>
                <div>
                    <label style="display: block; font-size: 12px; font-weight: 600; color: #334155; margin-bottom: 5px;">Bahagian <span style="color: red;">*</span></label>
                    <input type="text" name="bahagian" required placeholder="Bahagian" style="width: 100%; padding: 8px 12px; border: 1px solid #cbd5e1; border-radius: 8px; font-size: 13px; box-sizing: border-box;">
                </div>
                <div>
                    <label style="display: block; font-size: 12px; font-weight: 600; color: #334155; margin-bottom: 5px;">Unit <span style="color: red;">*</span></label>
                    <input type="text" name="unit" required placeholder="Unit" style="width: 100%; padding: 8px 12px; border: 1px solid #cbd5e1; border-radius: 8px; font-size: 13px; box-sizing: border-box;">
                </div>
            </div>

            <div style="margin-bottom: 12px;">
                <label style="display: block; font-size: 12px; font-weight: 600; color: #334155; margin-bottom: 5px;">Alamat Pejabat <span style="color: red;">*</span></label>
                <textarea name="address" required rows="2" placeholder="Alamat Penuh Pejabat" style="width: 100%; padding: 8px 12px; border: 1px solid #cbd5e1; border-radius: 8px; font-size: 13px; box-sizing: border-box;"></textarea>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 12px; margin-bottom: 20px;">
                <div>
                    <label style="display: block; font-size: 12px; font-weight: 600; color: #334155; margin-bottom: 5px;">Peranan <span style="color: red;">*</span></label>
                    <select name="role" required style="width: 100%; padding: 8px 12px; border: 1px solid #cbd5e1; border-radius: 8px; font-size: 13px; background: white; box-sizing: border-box;">
                        <option value="pengguna">Pemohon</option>
                        <option value="pelulus">Pelulus</option>
                        <option value="admin">Admin</option>
                    </select>
                </div>
                <div>
                    <label style="display: block; font-size: 12px; font-weight: 600; color: #334155; margin-bottom: 5px;">Kata Laluan <span style="color: red;">*</span></label>
                    <input type="password" name="password" required placeholder="Kata Laluan" style="width: 100%; padding: 8px 12px; border: 1px solid #cbd5e1; border-radius: 8px; font-size: 13px; box-sizing: border-box;">
                </div>
            </div>

          
            <div style="display: flex; justify-content: flex-end; gap: 10px; border-top: 1px solid #f1f5f9; padding-top: 15px;">
                <button type="button" onclick="document.getElementById('addModal').style.display='none'" style="padding: 9px 16px; background: #f1f5f9; color: #475569; border: none; border-radius: 8px; font-weight: 600; font-size: 13px; cursor: pointer;">Batal</button>
                <button type="submit" style="padding: 9px 18px; background: #1e0b75; color: white; border: none; border-radius: 8px; font-weight: 600; font-size: 13px; cursor: pointer;">Simpan Pengguna</button>
            </div>
        </form>

    </div>
</div>
    
<script>
    document.addEventListener('DOMContentLoaded', function () {

        //  Sidebar Toggle
        const sidebar = document.querySelector('.sidebar');
        const toggleBtn = document.getElementById('toggleSidebar');

        if (toggleBtn && sidebar) {
            toggleBtn.addEventListener('click', function () {
                sidebar.classList.toggle('collapsed');
                toggleBtn.style.transform = sidebar.classList.contains('collapsed') ? 'rotate(180deg)' : 'rotate(0deg)';
            });
        }

        const addModal = document.getElementById('addModal');
        const openAddBtn = document.getElementById('openAddModalBtn');
        const closeAddBtn = document.getElementById('closeAddModalBtn');

        if (openAddBtn && addModal) {
            openAddBtn.addEventListener('click', () => addModal.style.display = 'flex');
        }
        if (closeAddBtn && addModal) {
            closeAddBtn.addEventListener('click', () => addModal.style.display = 'none');
        }

        const viewUserModal = document.getElementById('viewUserModal');
        const closeViewModalBtn = document.getElementById('closeViewModalBtn');

        document.querySelectorAll('.btn-view-user').forEach(button => {
            button.addEventListener('click', function () {
                // Ambil data dari atribut icon
                document.getElementById('viewUserName').textContent = this.getAttribute('data-name') || '-';
                document.getElementById('viewUserIC').textContent = this.getAttribute('data-ic') || '-';
                document.getElementById('viewUserPhone').textContent = this.getAttribute('data-phone') || '-';
                document.getElementById('viewUserEmail').textContent = this.getAttribute('data-email') || '-';

                document.getElementById('viewUserJawatan').textContent = this.getAttribute('data-jawatan') || '-';
                document.getElementById('viewUserUnit').textContent = this.getAttribute('data-unit') || '-';
                document.getElementById('viewUserBahagian').textContent = this.getAttribute('data-bahagian') || '-';
                document.getElementById('viewUserAlamat').textContent = this.getAttribute('data-alamat') || '-';

                if (viewUserModal) viewUserModal.style.display = 'flex';
            });
        });

        if (closeViewModalBtn && viewUserModal) {
            closeViewModalBtn.addEventListener('click', () => viewUserModal.style.display = 'none');
        }

  
        window.addEventListener('click', (e) => {
            if (e.target === addModal) {
                addModal.style.display = 'none';
            }
            if (e.target === viewUserModal) {
                viewUserModal.style.display = 'none';
            }
        });

        const searchInput = document.querySelector('.search-box input');
        const tableRows = document.querySelectorAll('.custom-table tbody tr');

        if (searchInput) {
            searchInput.addEventListener('input', function () {
                const query = this.value.toLowerCase().trim();

                tableRows.forEach(row => {
                    // Abaikan baris "Tiada rekod dijumpai"
                    if (row.children.length === 1 && row.children[0].hasAttribute('colspan')) {
                        return;
                    }

                    const textContent = row.textContent.toLowerCase();
                    row.style.display = textContent.includes(query) ? '' : 'none';
                });
            });
        }

    });
</script>


</body>
</html>