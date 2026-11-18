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

        .page-subtitle {
            font-size: 13px;
            color: #64748b;
            margin-bottom: 24px;
        }

        
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 18px;
            margin-bottom: 26px;
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

        
        .filter-bar {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 12px;
            margin-bottom: 22px;
        }

        .search-box {
            background: #ffffff;
            border: 1px solid #cbd5e1;
            border-radius: 10px;
            padding: 0 14px;
            height: 40px;
            width: 100%;
            max-width: 360px;
            display: flex;
            align-items: center;
            gap: 10px;
            transition: border-color 0.2s, box-shadow 0.2s;
        }

        .search-box:focus-within {
            border-color: #29158f;
            box-shadow: 0 0 0 3px rgba(41, 21, 143, 0.12);
        }

        .search-box input {
            border: none !important;
            outline: none !important;
            box-shadow: none !important;
            background: transparent !important;
            padding: 0 !important;
            margin: 0 !important;
            width: 100%;
            height: 100%;
            font-size: 13px;
            color: #334155;
        }

        .btn-add {
            background-color: #29158f;
            color: white;
            border: none;
            padding: 0 18px;
            height: 40px;
            border-radius: 10px;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: background 0.2s;
            white-space: nowrap;
        }

        .btn-add:hover {
            background-color: #1e0b75;
        }

        
        .table-card {
            background: white;
            border-radius: 16px;
            padding: 25px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.04);
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
            padding: 13px 14px;
            text-align: left;
            font-weight: 600;
        }

        .custom-table th.center,
        .custom-table td.center {
            text-align: center;
        }

        .custom-table td {
            padding: 14px;
            color: #334155;
            border-bottom: 1px solid #f1f5f9;
        }

        .custom-table tbody tr:hover {
            background-color: #f8fafc;
        }

        
        .role-badge {
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 600;
            display: inline-block;
        }

        .role-admin    { background-color: #f3e8ff; color: #6b21a8; }
        .role-pelulus  { background-color: #dcfce7; color: #166534; }
        .role-pengguna { background-color: #f1f5f9; color: #475569; }

        .btn-icon-soft {
            width: 32px;
            height: 32px;
            border-radius: 8px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border: none;
            cursor: pointer;
            transition: all 0.2s;
            font-size: 14px;
        }

        .btn-icon-view {
            background: #eef2ff;
            color: #29158f;
            margin-right: 4px;
        }

        .btn-icon-view:hover {
            background: #29158f;
            color: white;
        }

        .btn-icon-edit {
            background: #fef3c7;
            color: #d97706;
        }

        .btn-icon-edit:hover {
            background: #d97706;
            color: white;
        }

        /* MODAL OVERLAY */
        .modal-overlay {
            display: none;
            position: fixed;
            inset: 0;
            width: 100vw;
            height: 100vh;
            background: rgba(15, 23, 42, 0.55);
            backdrop-filter: blur(3px);
            justify-content: center;
            align-items: center;
            z-index: 99999;
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
                <a href="{{ route('admin.dashboard') }}" class="nav-link">
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
                <a href="{{ route('admin.pengguna') }}" class="nav-link active">
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

        @include('partials.top-header')

        <!-- CONTENT BODY -->
        <main class="content-body">

            <h1 class="page-title">Pengguna</h1>
            <p class="page-subtitle">Senarai pengguna berdaftar serta pengurusan peranan akses dalam sistem iMohon</p>

            
            <div class="stats-grid">
                <div class="stat-card" style="border-left-color: #29158f;">
                    <div class="stat-icon" style="background: #eef2ff; color: #29158f;">
                        <i class="fa-solid fa-users"></i>
                    </div>
                    <div class="stat-info">
                        <span class="title">Jumlah pengguna</span>
                        <span class="value">{{ $users->count() }}</span>
                    </div>
                </div>

                <div class="stat-card" style="border-left-color: #8b5cf6;">
                    <div class="stat-icon" style="background: #f5f3ff; color: #7c3aed;">
                        <i class="fa-solid fa-user-shield"></i>
                    </div>
                    <div class="stat-info">
                        <span class="title">Admin</span>
                        <span class="value" style="color: #7c3aed;">{{ $users->where('role', 'admin')->count() }}</span>
                    </div>
                </div>

                <div class="stat-card" style="border-left-color: #10b981;">
                    <div class="stat-icon" style="background: #ecfdf5; color: #10b981;">
                        <i class="fa-solid fa-user-check"></i>
                    </div>
                    <div class="stat-info">
                        <span class="title">Pelulus</span>
                        <span class="value" style="color: #10b981;">{{ $users->where('role', 'pelulus')->count() }}</span>
                    </div>
                </div>

                <div class="stat-card" style="border-left-color: #0284c7;">
                    <div class="stat-icon" style="background: #e0f2fe; color: #0284c7;">
                        <i class="fa-solid fa-user"></i>
                    </div>
                    <div class="stat-info">
                        <span class="title">Pemohon</span>
                        <span class="value" style="color: #0284c7;">{{ $users->where('role', 'pengguna')->count() }}</span>
                    </div>
                </div>
            </div>

            
            <div class="filter-bar">
                <div class="search-box">
                    <i class="fa-solid fa-magnifying-glass" style="color: #94a3b8;"></i>
                    <input type="text" id="liveSearchPengguna" value="{{ request('search') }}" placeholder="Cari nama, emel, unit atau peranan...">
                </div>

                <button type="button" class="btn-add" id="openAddModalBtn">
                    <i class="fa-solid fa-user-plus"></i> Tambah Pengguna
                </button>
            </div>

            
            <div class="table-card">
                <table class="custom-table" id="penggunaTable">
                    <thead>
                        <tr>
                            <th class="center" style="width: 55px;">No</th>
                            <th>Nama</th>
                            <th>Emel</th>
                            <th>Unit</th>
                            <th class="center">Peranan</th>
                            <th class="center" style="width: 110px;">Butiran</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($users ?? [] as $index => $u)
                            @php
                                $roleLower = strtolower($u->role ?? 'pengguna');
                            @endphp
                            <tr>
                                <td class="center" style="color: #64748b; font-weight: 600;">{{ $index + 1 }}</td>
                                <td style="font-weight: 700; color: #0f172a;">{{ $u->name }}</td>
                                <td style="color: #475569;">{{ $u->email }}</td>
                                <td>{{ $u->unit ?? 'Seksyen Teknologi Maklumat' }}</td>
                                <td class="center">
                                    <span class="role-badge {{ $roleLower == 'admin' ? 'role-admin' : ($roleLower == 'pelulus' ? 'role-pelulus' : 'role-pengguna') }}">
                                        {{ $roleLower == 'pengguna' ? 'Pemohon' : ucfirst($u->role) }}
                                    </span>
                                </td>
                                <td class="center">
                                    <button type="button" class="btn-icon-soft btn-icon-view btn-view-user"
                                        title="Lihat Profil Pengguna"
                                        data-name="{{ $u->name }}"
                                        data-ic="{{ $u->ic ?? '-' }}"
                                        data-phone="{{ $u->phone ?? '-' }}"
                                        data-email="{{ $u->email }}"
                                        data-jawatan="{{ $u->jawatan ?? '-' }}"
                                        data-unit="{{ $u->unit ?? '-' }}"
                                        data-bahagian="{{ $u->bahagian ?? '-' }}"
                                        data-alamat="{{ $u->address ?? '-' }}">
                                        <i class="fa-solid fa-eye"></i>
                                    </button>

                                    <button type="button" class="btn-icon-soft btn-icon-edit btn-edit-role"
                                        title="Kemaskini Peranan"
                                        data-id="{{ $u->id }}"
                                        data-name="{{ $u->name }}"
                                        data-email="{{ $u->email }}"
                                        data-role="{{ $roleLower }}"
                                        data-update-url="{{ route('admin.pengguna.updateRole', $u->id) }}">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="center" style="padding: 35px; color: #94a3b8; font-style: italic;">
                                    <i class="fa-solid fa-folder-open" style="font-size: 24px; margin-bottom: 8px; display: block;"></i>
                                    Tiada rekod pengguna dijumpai.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </main>
    </div>

    <!-- profile -->
    <div id="viewUserModal" class="modal-overlay">
        <div style="background: white; border-radius: 18px; width: 92%; max-width: 560px; padding: 28px 30px; position: relative; box-shadow: 0 20px 25px -5px rgba(0,0,0,0.15); max-height: 90vh; overflow-y: auto;">

            <span id="closeViewModalBtn" style="position: absolute; right: 22px; top: 20px; cursor: pointer; font-size: 20px; color: #94a3b8;">
                <i class="fa-solid fa-xmark"></i>
            </span>

            <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 20px;">
                <div style="background: #1e0b75; color: white; width: 42px; height: 42px; border-radius: 11px; display: flex; align-items: center; justify-content: center; font-size: 18px;">
                    <i class="fa-solid fa-id-card"></i>
                </div>
                <div>
                    <h2 style="font-size: 18px; font-weight: bold; color: #0f172a; margin: 0;">Profil Lengkap Pengguna</h2>
                    <p style="font-size: 12px; color: #64748b; margin: 2px 0 0 0;">Maklumat peribadi & penempatan tugas semasa</p>
                </div>
            </div>

            <!-- details peribadi -->
            <div style="background: #eef2ff; border-radius: 14px; padding: 18px 20px; margin-bottom: 16px;">
                <h3 style="font-size: 14px; font-weight: 700; color: #1e0b75; margin-bottom: 12px;">
                    <i class="fa-solid fa-user" style="margin-right: 6px;"></i> Maklumat Peribadi
                </h3>

                <div style="display: flex; flex-direction: column; gap: 9px; font-size: 13px;">
                    <div style="display: flex; align-items: center;">
                        <span style="width: 160px; color: #64748b;">Nama penuh</span>
                        <span style="margin-right: 12px; font-weight: bold;">:</span>
                        <span id="viewUserName" style="font-weight: 600; color: #0f172a;">-</span>
                    </div>
                    <div style="display: flex; align-items: center;">
                        <span style="width: 160px; color: #64748b;">No. kad pengenalan</span>
                        <span style="margin-right: 12px; font-weight: bold;">:</span>
                        <span id="viewUserIC" style="font-weight: 600; color: #0f172a; font-family: monospace;">-</span>
                    </div>
                    <div style="display: flex; align-items: center;">
                        <span style="width: 160px; color: #64748b;">No. Telefon</span>
                        <span style="margin-right: 12px; font-weight: bold;">:</span>
                        <span id="viewUserPhone" style="font-weight: 600; color: #0f172a;">-</span>
                    </div>
                    <div style="display: flex; align-items: center;">
                        <span style="width: 160px; color: #64748b;">Emel</span>
                        <span style="margin-right: 12px; font-weight: bold;">:</span>
                        <span id="viewUserEmail" style="font-weight: 600; color: #0f172a;">-</span>
                    </div>
                </div>
            </div>

            <!-- details pekerjaan -->
            <div style="background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 14px; padding: 18px 20px;">
                <h3 style="font-size: 14px; font-weight: 700; color: #1e0b75; margin-bottom: 12px;">
                    <i class="fa-solid fa-briefcase" style="margin-right: 6px;"></i> Maklumat Pekerjaan
                </h3>

                <div style="display: flex; flex-direction: column; gap: 9px; font-size: 13px;">
                    <div style="display: flex; align-items: center;">
                        <span style="width: 160px; color: #64748b;">Jawatan</span>
                        <span style="margin-right: 12px; font-weight: bold;">:</span>
                        <span id="viewUserJawatan" style="font-weight: 600; color: #0f172a;">-</span>
                    </div>
                    <div style="display: flex; align-items: center;">
                        <span style="width: 160px; color: #64748b;">Unit</span>
                        <span style="margin-right: 12px; font-weight: bold;">:</span>
                        <span id="viewUserUnit" style="font-weight: 600; color: #0f172a;">-</span>
                    </div>
                    <div style="display: flex; align-items: center;">
                        <span style="width: 160px; color: #64748b;">Bahagian</span>
                        <span style="margin-right: 12px; font-weight: bold;">:</span>
                        <span id="viewUserBahagian" style="font-weight: 600; color: #0f172a;">-</span>
                    </div>
                    <div style="display: flex; align-items: flex-start;">
                        <span style="width: 160px; color: #64748b; flex-shrink: 0;">Alamat Pejabat</span>
                        <span style="margin-right: 12px; font-weight: bold;">:</span>
                        <span id="viewUserAlamat" style="font-weight: 600; color: #0f172a;">-</span>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- kemaskini -->
    <div id="editRoleModal" class="modal-overlay">
        <div style="background: white; border-radius: 18px; padding: 28px 30px; width: 92%; max-width: 450px; position: relative; box-shadow: 0 20px 25px -5px rgba(0,0,0,0.15);">

            <span id="closeEditRoleModalBtn" style="position: absolute; right: 22px; top: 18px; font-size: 22px; cursor: pointer; color: #94a3b8;">&times;</span>

            <h3 style="color: #1e0b75; margin-bottom: 18px; font-size: 18px; font-weight: bold; display: flex; align-items: center; gap: 8px;">
                <i class="fa-solid fa-user-gear"></i> Kemaskini Peranan Pengguna
            </h3>

            <form id="editRoleForm" action="" method="POST">
                @csrf
                @method('PUT')

                <div style="background: #eef2ff; padding: 14px 16px; border-radius: 12px; margin-bottom: 18px; font-size: 13px;">
                    <p style="margin-bottom: 5px; color: #334155;"><strong>Nama:</strong> <span id="role_user_name" style="color: #0f172a;">-</span></p>
                    <p style="margin: 0; color: #334155;"><strong>Emel:</strong> <span id="role_user_email" style="color: #0f172a;">-</span></p>
                </div>

                <div style="margin-bottom: 20px;">
                    <label style="display: block; font-size: 13px; font-weight: 600; color: #475569; margin-bottom: 7px;">Pilih Peranan Baharu</label>
                    <select name="role" id="role_select" style="width: 100%; padding: 10px 12px; border: 1px solid #cbd5e1; border-radius: 9px; font-size: 13px; outline: none; background: white;" required>
                        <option value="pengguna">Pemohon (Pengguna Biasa)</option>
                        <option value="pelulus">Pelulus</option>
                        <option value="admin">Admin</option>
                    </select>
                </div>

                <button type="submit" style="width: 100%; background: #1e0b75; color: white; border: none; padding: 12px; border-radius: 10px; font-weight: 700; font-size: 14px; cursor: pointer;">
                    Simpan Peranan
                </button>
            </form>
        </div>
    </div>

    <!-- popup tambah user baru -->
    <div id="addModal" class="modal-overlay">
        <div style="background: white; border-radius: 18px; width: 92%; max-width: 600px; padding: 28px 30px; position: relative; box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.15); max-height: 90vh; overflow-y: auto;">

            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; border-bottom: 1px solid #f1f5f9; padding-bottom: 14px;">
                <h2 style="font-size: 18px; font-weight: bold; color: #1e0b75; margin: 0; display: flex; align-items: center; gap: 8px;">
                    <i class="fa-solid fa-user-plus"></i> Tambah Pengguna Baharu
                </h2>
                <span id="closeAddModalBtn" style="cursor: pointer; font-size: 20px; color: #94a3b8;"><i class="fa-solid fa-xmark"></i></span>
            </div>

            <form action="{{ route('admin.pengguna.store') }}" method="POST">
                @csrf

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 12px; margin-bottom: 12px;">
                    <div>
                        <label style="display: block; font-size: 12px; font-weight: 600; color: #334155; margin-bottom: 5px;">Nama Penuh <span style="color: red;">*</span></label>
                        <input type="text" name="name" required placeholder="Nama Penuh" style="width: 100%; padding: 9px 12px; border: 1px solid #cbd5e1; border-radius: 8px; font-size: 13px;">
                    </div>
                    <div>
                        <label style="display: block; font-size: 12px; font-weight: 600; color: #334155; margin-bottom: 5px;">No. Kad Pengenalan <span style="color: red;">*</span></label>
                        <input type="text" name="ic" required placeholder="Contoh: 900101145521" style="width: 100%; padding: 9px 12px; border: 1px solid #cbd5e1; border-radius: 8px; font-size: 13px;">
                    </div>
                </div>

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 12px; margin-bottom: 12px;">
                    <div>
                        <label style="display: block; font-size: 12px; font-weight: 600; color: #334155; margin-bottom: 5px;">Emel <span style="color: red;">*</span></label>
                        <input type="email" name="email" required placeholder="user@rtm.gov.my" style="width: 100%; padding: 9px 12px; border: 1px solid #cbd5e1; border-radius: 8px; font-size: 13px;">
                    </div>
                    <div>
                        <label style="display: block; font-size: 12px; font-weight: 600; color: #334155; margin-bottom: 5px;">No. Telefon <span style="color: red;">*</span></label>
                        <input type="text" name="phone" required placeholder="Contoh: 0123456789" style="width: 100%; padding: 9px 12px; border: 1px solid #cbd5e1; border-radius: 8px; font-size: 13px;">
                    </div>
                </div>

                <div style="display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 10px; margin-bottom: 12px;">
                    <div>
                        <label style="display: block; font-size: 12px; font-weight: 600; color: #334155; margin-bottom: 5px;">Jawatan <span style="color: red;">*</span></label>
                        <input type="text" name="jawatan" required placeholder="Jawatan" style="width: 100%; padding: 9px 12px; border: 1px solid #cbd5e1; border-radius: 8px; font-size: 13px;">
                    </div>
                    <div>
                        <label style="display: block; font-size: 12px; font-weight: 600; color: #334155; margin-bottom: 5px;">Bahagian <span style="color: red;">*</span></label>
                        <input type="text" name="bahagian" required placeholder="Bahagian" style="width: 100%; padding: 9px 12px; border: 1px solid #cbd5e1; border-radius: 8px; font-size: 13px;">
                    </div>
                    <div>
                        <label style="display: block; font-size: 12px; font-weight: 600; color: #334155; margin-bottom: 5px;">Unit <span style="color: red;">*</span></label>
                        <input type="text" name="unit" required placeholder="Unit" style="width: 100%; padding: 9px 12px; border: 1px solid #cbd5e1; border-radius: 8px; font-size: 13px;">
                    </div>
                </div>

                <div style="margin-bottom: 12px;">
                    <label style="display: block; font-size: 12px; font-weight: 600; color: #334155; margin-bottom: 5px;">Alamat Pejabat <span style="color: red;">*</span></label>
                    <textarea name="address" required rows="2" placeholder="Alamat Penuh Pejabat" style="width: 100%; padding: 9px 12px; border: 1px solid #cbd5e1; border-radius: 8px; font-size: 13px;"></textarea>
                </div>

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 12px; margin-bottom: 20px;">
                    <div>
                        <label style="display: block; font-size: 12px; font-weight: 600; color: #334155; margin-bottom: 5px;">Peranan <span style="color: red;">*</span></label>
                        <select name="role" required style="width: 100%; padding: 9px 12px; border: 1px solid #cbd5e1; border-radius: 8px; font-size: 13px; background: white;">
                            <option value="pengguna">Pemohon</option>
                            <option value="pelulus">Pelulus</option>
                            <option value="admin">Admin</option>
                        </select>
                    </div>
                    <div>
                        <label style="display: block; font-size: 12px; font-weight: 600; color: #334155; margin-bottom: 5px;">Kata Laluan <span style="color: red;">*</span></label>
                        <input type="password" name="password" required placeholder="Kata Laluan" style="width: 100%; padding: 9px 12px; border: 1px solid #cbd5e1; border-radius: 8px; font-size: 13px;">
                    </div>
                </div>

                <div style="display: flex; justify-content: flex-end; gap: 10px; border-top: 1px solid #f1f5f9; padding-top: 15px;">
                    <button type="button" id="cancelAddModalBtn" style="padding: 9px 16px; background: #f1f5f9; color: #475569; border: none; border-radius: 9px; font-weight: 600; font-size: 13px; cursor: pointer;">Batal</button>
                    <button type="submit" style="padding: 9px 20px; background: #1e0b75; color: white; border: none; border-radius: 9px; font-weight: 600; font-size: 13px; cursor: pointer;">Simpan Pengguna</button>
                </div>
            </form>

        </div>
    </div>
    
<script>
    document.addEventListener('DOMContentLoaded', function () {

        
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

        const editRoleModal = document.getElementById('editRoleModal');
        const closeEditRoleBtn = document.getElementById('closeEditRoleModalBtn');
        const editRoleForm = document.getElementById('editRoleForm');

        document.querySelectorAll('.btn-edit-role').forEach(button => {
            button.addEventListener('click', function () {
                const userId = this.getAttribute('data-id');
                const userName = this.getAttribute('data-name');
                const userEmail = this.getAttribute('data-email');
                const userRole = this.getAttribute('data-role');

                
                if (document.getElementById('role_user_name')) document.getElementById('role_user_name').innerText = userName;
                if (document.getElementById('role_user_email')) document.getElementById('role_user_email').innerText = userEmail;
                if (document.getElementById('role_select')) document.getElementById('role_select').value = userRole;

                
                if (editRoleForm) {
                    editRoleForm.action = `/admin/pengguna/${userId}/update-role`;
                }

                if (editRoleModal) editRoleModal.style.display = 'flex';
            });
        });

        if (closeEditRoleBtn && editRoleModal) {
            closeEditRoleBtn.addEventListener('click', () => editRoleModal.style.display = 'none');
        }

    
        window.addEventListener('click', (e) => {
            if (e.target === addModal) addModal.style.display = 'none';
            if (e.target === viewUserModal) viewUserModal.style.display = 'none';
            if (e.target === editRoleModal) editRoleModal.style.display = 'none';
        });

       
        const searchInput = document.querySelector('.search-box input');
        const tableRows = document.querySelectorAll('.custom-table tbody tr');

        if (searchInput) {
            searchInput.addEventListener('input', function () {
                const query = this.value.toLowerCase().trim();

                tableRows.forEach(row => {
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