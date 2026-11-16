<!DOCTYPE html>
<html lang="ms">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventori Peralatan - iMohon</title>

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

        /* SIDEBAR */
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

        /* MAIN WRAPPER */
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
            margin-bottom: 22px;
        }

        
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 18px;
            margin-bottom: 25px;
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

        
        .action-bar {
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

        .filter-select {
            background: white;
            border: 1px solid #cbd5e1;
            border-radius: 10px;
            padding: 0 14px;
            height: 40px;
            font-size: 13px;
            color: #334155;
            outline: none;
            cursor: pointer;
        }

        .btn-add {
            background-color: #29158f;
            color: white;
            padding: 0 18px;
            border-radius: 10px;
            font-weight: 600;
            font-size: 13px;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            border: none;
            cursor: pointer;
            transition: background 0.2s;
            height: 40px;
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

        .custom-table td {
            padding: 14px;
            color: #334155;
            border-bottom: 1px solid #f1f5f9;
        }

        .custom-table tbody tr:hover {
            background-color: #f8fafc;
        }

        
        .badge-kategori {
            background: #f1f5f9;
            color: #334155;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            display: inline-block;
        }

        .pill-tersedia {
            background: #dcfce7;
            color: #166534;
            padding: 4px 12px;
            border-radius: 14px;
            font-weight: 700;
            font-size: 12px;
            display: inline-block;
            min-width: 45px;
        }

        .pill-diagih {
            background: #f3e8ff;
            color: #6b21a8;
            padding: 4px 12px;
            border-radius: 14px;
            font-weight: 700;
            font-size: 12px;
            display: inline-block;
            min-width: 45px;
        }

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

        .btn-icon-delete {
            background: #fef2f2;
            color: #ef4444;
        }

        .btn-icon-delete:hover {
            background: #ef4444;
            color: white;
        }

        
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
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

    <!-- SIDEBAR -->
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
                    <i class="fa-solid fa-house"></i>
                    <span>Laman utama</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.inventori') }}" class="nav-link active">
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

            <h1 class="page-title">Inventori Peralatan</h1>
            <p class="page-subtitle">Pengurusan stok peralatan, kontrak vendor dan nombor siri unit</p>

            
            <div class="stats-grid">
                <div class="stat-card" style="border-left-color: #29158f;">
                    <div class="stat-icon" style="background: #eef2ff; color: #29158f;">
                        <i class="fa-solid fa-boxes-stacked"></i>
                    </div>
                    <div class="stat-info">
                        <span class="title">Model Peralatan</span>
                        <span class="value">{{ $inventori->count() }}</span>
                    </div>
                </div>

                <div class="stat-card" style="border-left-color: #3b82f6;">
                    <div class="stat-icon" style="background: #eff6ff; color: #3b82f6;">
                        <i class="fa-solid fa-layer-group"></i>
                    </div>
                    <div class="stat-info">
                        <span class="title">Jumlah Keseluruhan</span>
                        <span class="value">{{ number_format($inventori->sum('jumlah')) }}</span>
                    </div>
                </div>

                <div class="stat-card" style="border-left-color: #10b981;">
                    <div class="stat-icon" style="background: #ecfdf5; color: #10b981;">
                        <i class="fa-solid fa-circle-check"></i>
                    </div>
                    <div class="stat-info">
                        <span class="title">Unit Tersedia</span>
                        <span class="value" style="color: #10b981;">{{ number_format($inventori->sum('tersedia')) }}</span>
                    </div>
                </div>

                <div class="stat-card" style="border-left-color: #8b5cf6;">
                    <div class="stat-icon" style="background: #f5f3ff; color: #8b5cf6;">
                        <i class="fa-solid fa-hand-holding-hand"></i>
                    </div>
                    <div class="stat-info">
                        <span class="title">Unit Diagih</span>
                        <span class="value" style="color: #8b5cf6;">{{ number_format($inventori->sum('diagih')) }}</span>
                    </div>
                </div>
            </div>

           
            <div class="action-bar">
                <div class="search-box">
                    <i class="fa-solid fa-magnifying-glass" style="color: #94a3b8;"></i>
                    <input type="text" id="liveSearchInput" value="{{ request('search') }}" placeholder="Cari nama peralatan...">
                </div>

                <select id="filterKategoriSelect" class="filter-select">
                    <option value="">Semua Kategori</option>
                    <option value="Notebook Highend">Notebook Highend</option>
                    <option value="Notebook">Notebook</option>
                    <option value="PC Highend">PC Highend</option>
                    <option value="PC">PC</option>
                    <option value="Printer Mono A4">Printer Mono A4</option>
                    <option value="Printer Color A4">Printer Color A4</option>
                    <option value="Printer Color A3">Printer Color A3</option>
                    <option value="Projektor">Projektor</option>
                </select>

                <button type="button" class="btn-add" id="openModalBtn">
                    <i class="fa-solid fa-plus"></i> Tambah Peralatan
                </button>
            </div>

            
            <div class="table-card">
                <table class="custom-table" id="inventoriTable">
                    <thead>
                        <tr>
                            <th style="text-align: center; width: 55px;">No.</th>
                            <th>Nama peralatan</th>
                            <th style="text-align: center;">Kategori</th>
                            <th style="text-align: center;">Jumlah</th>
                            <th style="text-align: center;">Tersedia</th>
                            <th style="text-align: center;">Diagih</th>
                            <th style="text-align: center; width: 110px;">Butiran</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($inventori as $index => $item)
                            <tr data-kategori="{{ strtolower($item->kategori) }}">
                                <td style="text-align: center; color: #64748b; font-weight: 600;">{{ $loop->iteration }}</td>
                                <td style="font-weight: 700; color: #0f172a;">{{ $item->nama_peralatan }}</td>
                                <td style="text-align: center;">
                                    <span class="badge-kategori">{{ $item->kategori }}</span>
                                </td>
                                <td style="text-align: center; font-weight: 700; color: #0f172a; font-size: 14px;">{{ $item->jumlah }}</td>
                                <td style="text-align: center;">
                                    <span class="pill-tersedia">{{ $item->tersedia }}</span>
                                </td>
                                <td style="text-align: center;">
                                    <span class="pill-diagih">{{ $item->diagih }}</span>
                                </td>
                                <td style="text-align: center;">
                                    
                                    <button type="button" class="btn-icon-soft btn-icon-view btn-view-kontrak"
                                        title="Lihat Kontrak, Vendor & No. Siri"
                                        data-nama="{{ $item->nama_peralatan }}"
                                        data-kontrak="{{ json_encode($item->vendors->map(function($v) {
                                            return [
                                                'no_kontrak'  => $v->no_kontrak ?? '-',
                                                'vendor'      => $v->nama_vendor ?? '-',
                                                'tarikh'      => $v->created_at ? $v->created_at->format('d/m/Y') : '-',
                                                'jumlah_unit' => $v->pivot->jumlah_unit ?? 0
                                            ];
                                        })) }}"
                                        data-units="{{ json_encode($item->units ?? []) }}">
                                        <i class="fa-solid fa-eye"></i>
                                    </button>

                                    
                                    <form action="{{ route('admin.inventori.destroy', $item->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Adakah anda pasti ingin memadam peralatan ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-icon-soft btn-icon-delete" title="Padam Peralatan">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" style="padding: 30px; text-align: center; color: #94a3b8; font-style: italic;">
                                    Tiada rekod peralatan dijumpai.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </main>
    </div>

    <!-- popup -->
    <div class="modal" id="modalKontrakVendor">
        <div style="background: white; border-radius: 18px; width: 92%; max-width: 780px; padding: 30px; position: relative; max-height: 90vh; overflow-y: auto; box-shadow: 0 20px 25px -5px rgba(0,0,0,0.15);">
            <span id="closeKontrakModalBtn" style="position: absolute; right: 25px; top: 20px; cursor: pointer; font-size: 22px; color: #94a3b8;">
                <i class="fa-solid fa-xmark"></i>
            </span>

            
            <div style="display: flex; align-items: center; gap: 14px; margin-bottom: 20px;">
                <div style="background: #1e0b75; color: white; width: 46px; height: 46px; border-radius: 12px; font-size: 18px; display: flex; align-items: center; justify-content: center;">
                    <i class="fa-solid fa-clipboard-list"></i>
                </div>
                <div>
                    <h2 id="modalTitlePeralatan" style="font-size: 19px; font-weight: bold; color: #0f172a; margin: 0;">Kontrak & vendor</h2>
                    <p style="font-size: 13px; color: #64748b; margin: 2px 0 0 0;">Maklumat kontrak vendor dan senarai nombor siri unit</p>
                </div>
            </div>

            <!-- table kontrak&vendor -->
            <div style="overflow-x: auto; margin-bottom: 24px;">
                <table style="width: 100%; border-collapse: collapse; font-size: 13px; text-align: left;">
                    <thead>
                        <tr style="background: #eef2ff; color: #3730a3;">
                            <th style="padding: 11px 14px; width: 50px; text-align: center;">No.</th>
                            <th style="padding: 11px 14px;">No. Kontrak</th>
                            <th style="padding: 11px 14px;">Vendor</th>
                            <th style="padding: 11px 14px; text-align: center;">Jumlah unit</th>
                        </tr>
                    </thead>
                    <tbody id="tblBodyKontrak">
                        <!-- js -->
                    </tbody>
                </table>
            </div>

            <!-- nombor siri -->
            <div style="border-top: 1px solid #e2e8f0; padding-top: 18px;">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 12px;">
                    <h4 style="font-size: 14px; font-weight: 700; color: #1e0b75; margin: 0;">
                        <i class="fa-solid fa-barcode" style="margin-right: 6px;"></i> Senarai Nombor Siri Unit
                    </h4>
                    <input type="text" id="searchSerialModalInput" placeholder="Cari no. siri..."
                        style="padding: 6px 12px; border: 1px solid #cbd5e1; border-radius: 8px; font-size: 12px; width: 210px; outline: none;">
                </div>

                <div style="max-height: 230px; overflow-y: auto; border: 1px solid #e2e8f0; border-radius: 10px;">
                    <table style="width: 100%; border-collapse: collapse; font-size: 12px; text-align: left;">
                        <thead style="position: sticky; top: 0; background: #f8fafc; z-index: 2;">
                            <tr style="color: #475569; border-bottom: 1px solid #e2e8f0;">
                                <th style="padding: 10px 12px; width: 50px; text-align: center;">No.</th>
                                <th style="padding: 10px 12px;">No. Siri (Serial Number)</th>
                                <th style="padding: 10px 12px;">No. Kontrak</th>
                                <th style="padding: 10px 12px; text-align: center;">Status</th>
                            </tr>
                        </thead>
                        <tbody id="tblBodySerialUnits">
                            <!-- js -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- popup 2 -->
    <div class="modal" id="addModal">
        <div style="background: white; border-radius: 18px; width: 92%; max-width: 620px; padding: 28px; position: relative; max-height: 92vh; overflow-y: auto; box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.15);">
            
            
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
                <h2 style="font-size: 19px; font-weight: bold; color: #1e0b75; margin: 0;">
                    <i class="fa-solid fa-boxes-packing" style="margin-right: 8px;"></i> Tambah Peralatan
                </h2>
                <span id="closeModalBtn" style="cursor: pointer; font-size: 24px; color: #94a3b8; font-weight: bold; line-height: 1;">&times;</span>
            </div>

            <form action="{{ route('admin.inventori.store') }}" method="POST">
                @csrf

                
                <div style="margin-bottom: 14px;">
                    <label style="display: block; font-size: 12px; font-weight: 600; color: #475569; margin-bottom: 5px;">Nama Peralatan</label>
                    <input type="text" name="nama_peralatan" required placeholder="Contoh: DELL LATITUDE 3440 i5"
                           style="width: 100%; padding: 10px 12px; border: 1px solid #cbd5e1; border-radius: 8px; font-size: 13px;">
                </div>

                
                <div style="margin-bottom: 14px;">
                    <label style="display: block; font-size: 12px; font-weight: 600; color: #475569; margin-bottom: 5px;">Kategori</label>
                    <select name="kategori" required style="width: 100%; padding: 10px 12px; border: 1px solid #cbd5e1; border-radius: 8px; font-size: 13px; background: white; outline: none;">
                        <option value="">-- Pilih Kategori --</option>
                        <option value="Notebook Highend">Notebook Highend</option>
                        <option value="Notebook">Notebook</option>
                        <option value="PC Highend">PC Highend</option>
                        <option value="PC">PC</option>
                        <option value="Printer Mono A4">Printer Mono A4</option>
                        <option value="Printer Color A4">Printer Color A4</option>
                        <option value="Printer Color A3">Printer Color A3</option>
                        <option value="Projektor">Projektor</option>
                    </select>
                </div>

                
                <div style="margin-bottom: 14px; background: #f8fafc; padding: 12px; border-radius: 10px; border: 1px solid #e2e8f0;">
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 10px;">
                        <label style="font-size: 12px; font-weight: 600; color: #475569;">No. Kontrak, Vendor & Unit</label>
                        <button type="button" id="btn-tambah-vendor" style="background: #3730a3; color: white; border: none; padding: 5px 10px; border-radius: 6px; font-size: 11px; cursor: pointer; display: flex; align-items: center; gap: 4px;">
                            <i class="fa-solid fa-plus"></i> Tambah Vendor
                        </button>
                    </div>

                    <div id="vendor-wrapper">
                        <div class="vendor-row" style="display: flex; gap: 8px; margin-bottom: 8px; align-items: center;">
                            <select name="vendors[0][id]" required style="flex: 2; padding: 8px 10px; border: 1px solid #cbd5e1; border-radius: 8px; font-size: 12px; background: white;">
                                <option value="">-- Pilih Vendor --</option>
                                @foreach($vendors as $vendor)
                                    <option value="{{ $vendor->id }}">{{ $vendor->no_kontrak }} - {{ $vendor->nama_vendor }}</option>
                                @endforeach
                            </select>
                            
                            <input type="number" name="vendors[0][jumlah_unit]" placeholder="Unit" min="1" required style="width: 75px; padding: 8px; border: 1px solid #cbd5e1; border-radius: 8px; font-size: 12px;">

                            <button type="button" class="btn-remove-vendor" style="background: #ef4444; color: white; border: none; width: 32px; height: 32px; border-radius: 8px; cursor: pointer; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                                <i class="fa-solid fa-xmark"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- senarai no. siri -->
                <div style="margin-bottom: 14px;">
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 5px;">
                        <label style="font-size: 12px; font-weight: 600; color: #475569;">
                            Senarai No. Siri (Paste dari Excel — 1 baris = 1 unit)
                        </label>
                        <span id="badgeKiraanSN" style="background: #e0e7ff; color: #1e0b75; padding: 2px 10px; border-radius: 12px; font-size: 11px; font-weight: 700;">
                            0 No. Siri
                        </span>
                    </div>
                    <textarea name="senarai_no_siri" id="inputSenaraiNoSiri" rows="4" required
                        placeholder="CND2026001&#10;CND2026002&#10;CND2026003"
                        style="width: 100%; padding: 10px 12px; border: 1px solid #cbd5e1; border-radius: 8px; font-family: monospace; font-size: 13px; outline: none;"></textarea>
                </div>

                
                <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 10px; margin-bottom: 20px;">
                    <div>
                        <label style="display: block; font-size: 12px; font-weight: 600; color: #475569; margin-bottom: 5px;">Jumlah Kuantiti</label>
                        <input type="number" name="jumlah" id="inputJumlahKuantiti" min="1" required 
                               style="width: 100%; padding: 10px 12px; border: 1px solid #cbd5e1; border-radius: 8px; font-size: 13px;">
                    </div>
                    <div>
                        <label style="display: block; font-size: 12px; font-weight: 600; color: #475569; margin-bottom: 5px;">Kuantiti Tersedia</label>
                        <input type="number" name="tersedia" id="inputKuantitiTersedia" min="0" required
                               style="width: 100%; padding: 10px 12px; border: 1px solid #cbd5e1; border-radius: 8px; font-size: 13px;">
                    </div>
                    <div>
                        <label style="display: block; font-size: 12px; font-weight: 600; color: #475569; margin-bottom: 5px;">Kuantiti Diagih</label>
                        <input type="number" name="diagih" value="0" min="0" required
                               style="width: 100%; padding: 10px 12px; border: 1px solid #cbd5e1; border-radius: 8px; font-size: 13px;">
                    </div>
                </div>

                <button type="submit" style="width: 100%; background: #1e0b75; color: white; border: none; padding: 12px; border-radius: 10px; font-weight: bold; font-size: 14px; cursor: pointer;">
                    Simpan Peralatan
                </button>
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

        
        const modal = document.getElementById('addModal');
        const openBtn = document.getElementById('openModalBtn');
        const closeBtn = document.getElementById('closeModalBtn');

        if (openBtn && modal) openBtn.onclick = () => modal.style.display = 'flex';
        if (closeBtn && modal) closeBtn.onclick = () => modal.style.display = 'none';

       
        const textareaSN = document.getElementById('inputSenaraiNoSiri');
        const badgeKiraanSN = document.getElementById('badgeKiraanSN');
        const inputJumlah = document.getElementById('inputJumlahKuantiti');
        const inputTersedia = document.getElementById('inputKuantitiTersedia');

        if (textareaSN) {
            textareaSN.addEventListener('input', function () {
                const lines = this.value.split(/\r?\n/).map(s => s.trim()).filter(s => s !== '');
                const uniqueCount = new Set(lines).size;

                if (badgeKiraanSN) badgeKiraanSN.innerText = `${uniqueCount} No. Siri`;
                if (uniqueCount > 0) {
                    if (inputJumlah) inputJumlah.value = uniqueCount;
                    if (inputTersedia) inputTersedia.value = uniqueCount;
                }
            });
        }

        
        const modalKontrak = document.getElementById('modalKontrakVendor');
        const closeKontrakBtn = document.getElementById('closeKontrakModalBtn');
        let currentModalUnits = [];

        function renderSerialUnitsTable(units) {
            const tbodySerial = document.getElementById('tblBodySerialUnits');
            if (!tbodySerial) return;

            tbodySerial.innerHTML = '';

            if (!units || units.length === 0) {
                tbodySerial.innerHTML = `
                    <tr>
                        <td colspan="4" style="padding: 18px; text-align: center; color: #94a3b8; font-style: italic;">
                            Tiada rekod nombor siri didaftarkan untuk peralatan ini.
                        </td>
                    </tr>`;
                return;
            }

            units.forEach((u, idx) => {
                const isTersedia = (u.status || '').toLowerCase() === 'tersedia';
                const statusBadge = isTersedia
                    ? `<span style="background: #dcfce7; color: #166534; padding: 3px 10px; border-radius: 12px; font-weight: 600;">Tersedia</span>`
                    : `<span style="background: #e0f2fe; color: #0369a1; padding: 3px 10px; border-radius: 12px; font-weight: 600;">${u.status || 'Diagih'}</span>`;

                tbodySerial.insertAdjacentHTML('beforeend', `
                    <tr style="border-bottom: 1px solid #f1f5f9;">
                        <td style="padding: 10px 12px; text-align: center; color: #64748b;">${idx + 1}</td>
                        <td style="padding: 10px 12px; font-family: monospace; font-weight: 700; color: #0f172a;">${u.no_siri}</td>
                        <td style="padding: 10px 12px; color: #475569;">${u.no_kontrak || '-'}</td>
                        <td style="padding: 10px 12px; text-align: center;">${statusBadge}</td>
                    </tr>
                `);
            });
        }

        document.querySelectorAll('.btn-view-kontrak').forEach(button => {
            button.addEventListener('click', function () {
                const namaPeralatan = this.getAttribute('data-nama') || 'Kontrak & vendor';
                const modalTitle = document.getElementById('modalTitlePeralatan');
                if (modalTitle) modalTitle.innerText = namaPeralatan;

                
                const tbody = document.getElementById('tblBodyKontrak');
                if (tbody) {
                    tbody.innerHTML = '';
                    try {
                        const rawKontrak = this.getAttribute('data-kontrak');
                        const senaraiKontrak = rawKontrak ? JSON.parse(rawKontrak) : [];

                        if (senaraiKontrak.length > 0) {
                            senaraiKontrak.forEach((k, index) => {
                                tbody.insertAdjacentHTML('beforeend', `
                                    <tr style="border-bottom: 1px solid #f1f5f9;">
                                        <td style="padding: 12px 14px; text-align: center; color: #0f172a;">${index + 1}</td>
                                        <td style="padding: 12px 14px; font-weight: 600; color: #0f172a;">${k.no_kontrak || '-'}</td>
                                        <td style="padding: 12px 14px; color: #334155;">${k.vendor || '-'}</td>
                                        <td style="padding: 12px 14px; text-align: center; font-weight: 700; color: #1e0b75;">${k.jumlah_unit || 0}</td>
                                    </tr>
                                `);
                            });
                        } else {
                            tbody.innerHTML = `
                                <tr>
                                    <td colspan="4" style="padding: 18px; text-align: center; color: #94a3b8; font-style: italic;">
                                        Tiada rekod kontrak & vendor dijumpai.
                                    </td>
                                </tr>`;
                        }
                    } catch (e) {
                        console.error("Ralat parsing kontrak:", e);
                    }
                }

                
                try {
                    const rawUnits = this.getAttribute('data-units');
                    currentModalUnits = rawUnits ? JSON.parse(rawUnits) : [];
                } catch (e) {
                    currentModalUnits = [];
                }

                const searchSNInput = document.getElementById('searchSerialModalInput');
                if (searchSNInput) searchSNInput.value = '';
                renderSerialUnitsTable(currentModalUnits);

                if (modalKontrak) modalKontrak.style.display = 'flex';
            });
        });

        
        const searchSNModal = document.getElementById('searchSerialModalInput');
        if (searchSNModal) {
            searchSNModal.addEventListener('input', function () {
                const keyword = this.value.toLowerCase().trim();
                const filtered = currentModalUnits.filter(u =>
                    (u.no_siri || '').toLowerCase().includes(keyword) ||
                    (u.no_kontrak || '').toLowerCase().includes(keyword)
                );
                renderSerialUnitsTable(filtered);
            });
        }

        if (closeKontrakBtn && modalKontrak) {
            closeKontrakBtn.onclick = () => modalKontrak.style.display = 'none';
        }

        window.addEventListener('click', function (e) {
            if (modal && e.target === modal) modal.style.display = 'none';
            if (modalKontrak && e.target === modalKontrak) modalKontrak.style.display = 'none';
        });

        
        const searchInput = document.getElementById('liveSearchInput');
        const categorySelect = document.getElementById('filterKategoriSelect');
        const tableRows = document.querySelectorAll('#inventoriTable tbody tr');

        function filterInventoriTable() {
            const query = (searchInput?.value || '').toLowerCase().trim();
            const selectedKat = (categorySelect?.value || '').toLowerCase().trim();

            tableRows.forEach(row => {
                if (row.children.length === 1 && row.children[0].hasAttribute('colspan')) return;

                const textContent = row.textContent.toLowerCase();
                const rowKategori = (row.getAttribute('data-kategori') || '').toLowerCase();

                const matchSearch = textContent.includes(query);
                const matchKategori = selectedKat === '' || rowKategori === selectedKat;

                row.style.display = (matchSearch && matchKategori) ? '' : 'none';
            });
        }

        if (searchInput) searchInput.addEventListener('input', filterInventoriTable);
        if (categorySelect) categorySelect.addEventListener('change', filterInventoriTable);

        
        const vendorWrapper = document.getElementById('vendor-wrapper');
        const btnTambahVendor = document.getElementById('btn-tambah-vendor');

        function reindexVendorRows() {
            const rows = vendorWrapper.querySelectorAll('.vendor-row');
            rows.forEach((row, index) => {
                const select = row.querySelector('select');
                const input = row.querySelector('input[type="number"]');
                if (select) select.name = `vendors[${index}][id]`;
                if (input) input.name = `vendors[${index}][jumlah_unit]`;
            });
        }

        if (btnTambahVendor && vendorWrapper) {
            btnTambahVendor.addEventListener('click', function () {
                const firstRow = vendorWrapper.querySelector('.vendor-row');
                if (firstRow) {
                    const newRow = firstRow.cloneNode(true);
                    const selectElem = newRow.querySelector('select');
                    const inputElem = newRow.querySelector('input[type="number"]');
                    if (selectElem) selectElem.value = "";
                    if (inputElem) inputElem.value = "";
                    vendorWrapper.appendChild(newRow);
                    reindexVendorRows();
                }
            });

            vendorWrapper.addEventListener('click', function (e) {
                if (e.target.closest('.btn-remove-vendor')) {
                    const rows = vendorWrapper.querySelectorAll('.vendor-row');
                    if (rows.length > 1) {
                        e.target.closest('.vendor-row').remove();
                        reindexVendorRows();
                    } else {
                        alert('Sekurang-kurangnya satu vendor diperlukan.');
                    }
                }
            });
        }
    });
    </script>
</body>
</html>