<!DOCTYPE html>
<html lang="ms">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Permohonan Baru - iMohon</title>

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

        /* CONTENT RIGHT */
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

        .status-select {
            background: #ffffff;
            border: 1px solid #cbd5e1;
            border-radius: 10px;
            padding: 0 34px 0 14px;
            height: 40px;
            font-size: 13px;
            color: #334155;
            outline: none !important;
            box-shadow: none !important;
            cursor: pointer;
            transition: border-color 0.2s, box-shadow 0.2s;
        }

        .status-select:focus {
            border-color: #29158f;
            box-shadow: 0 0 0 3px rgba(41, 21, 143, 0.12) !important;
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
            background: #eef2ff;
            color: #29158f;
        }

        .btn-icon-soft:hover {
            background: #29158f;
            color: white;
        }

        .btn-action-group {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .btn-lulus {
            background-color: #dcfce7;
            color: #166534;
            border: 1px solid #86efac;
            padding: 6px 12px;
            border-radius: 8px;
            font-size: 11px;
            font-weight: 700;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 5px;
            transition: 0.2s;
        }

        .btn-lulus:hover {
            background-color: #16a34a;
            color: white;
            border-color: #16a34a;
        }

        .btn-tolak {
            background-color: #fee2e2;
            color: #991b1b;
            border: 1px solid #fca5a5;
            padding: 6px 12px;
            border-radius: 8px;
            font-size: 11px;
            font-weight: 700;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 5px;
            transition: 0.2s;
        }

        .btn-tolak:hover {
            background-color: #dc2626;
            color: white;
            border-color: #dc2626;
        }

       
        .badge-status {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 5px 12px;
            font-size: 11px;
            font-weight: 600;
            border-radius: 20px;
        }

        .badge-pelulus-diterima {
            background-color: #f3e8ff;
            color: #6b21a8;
        }

        .badge-pelulus-menunggu {
            background-color: #fef3c7;
            color: #92400e;
        }

        .badge-pelulus-ditolak {
            background-color: #fee2e2;
            color: #991b1b;
        }

        .badge-diterima {
            background-color: #dcfce7;
            color: #166534;
        }

        .badge-ditolak {
            background-color: #fee2e2;
            color: #991b1b;
        }

        
        .modal {
            display: none;
            position: fixed;
            z-index: 99999;
            inset: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(15, 23, 42, 0.55);
            backdrop-filter: blur(3px);
            align-items: center;
            justify-content: center;
        }

        .close-btn {
            font-size: 22px;
            cursor: pointer;
            color: #94a3b8;
            transition: color 0.2s;
        }

        .close-btn:hover {
            color: #0f172a;
        }

        .modal-report-content {
            background-color: white;
            border-radius: 20px;
            padding: 32px 36px;
            width: 92%;
            max-width: 820px;
            max-height: 90vh;
            overflow-y: auto;
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.15);
            position: relative;
        }

        .report-title {
            font-size: 20px;
            font-weight: bold;
            color: #0f172a;
            margin-bottom: 20px;
        }

        .report-grid {
            display: grid;
            grid-template-columns: 1fr 1.1fr;
            gap: 18px;
            margin-bottom: 18px;
        }

        .report-card {
            background-color: #eef2ff;
            border: 1px solid #e0e7ff;
            border-radius: 14px;
            padding: 20px 22px;
        }

        .report-card-header {
            font-size: 14px;
            font-weight: 700;
            color: #1e0b75;
            margin-bottom: 14px;
        }

        .detail-row {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
            font-size: 12.5px;
        }

        .detail-row:last-child {
            margin-bottom: 0;
        }

        .detail-label {
            color: #64748b;
            width: 130px;
            flex-shrink: 0;
        }

        .detail-colon {
            color: #0f172a;
            margin-right: 10px;
            font-weight: bold;
        }

        .detail-value {
            color: #0f172a;
            font-weight: 600;
        }

        .justification-section {
            margin-top: 16px;
        }

        .justification-title {
            font-size: 13px;
            font-weight: 700;
            color: #334155;
            margin-bottom: 6px;
        }

        .justification-box {
            background-color: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            padding: 12px 16px;
            font-size: 13px;
            color: #334155;
            min-height: 52px;
        }

        
        .modal-content-confirm {
            background-color: white;
            border-radius: 18px;
            padding: 32px 28px;
            width: 92%;
            max-width: 400px;
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.15);
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .icon-circle-success {
            width: 58px;
            height: 58px;
            background-color: #dcfce7;
            color: #16a34a;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            margin-bottom: 16px;
        }

        .icon-circle-danger {
            width: 58px;
            height: 58px;
            background-color: #fee2e2;
            color: #dc2626;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            margin-bottom: 16px;
        }

        .modal-confirm-title {
            font-size: 16px;
            font-weight: bold;
            color: #0f172a;
            margin-bottom: 18px;
        }

        .modal-btn-confirm-lulus {
            background-color: #16a34a;
            color: white;
            border: none;
            padding: 10px;
            width: 100%;
            border-radius: 9px;
            font-weight: 600;
            font-size: 13px;
            cursor: pointer;
            transition: 0.2s;
        }

        .modal-btn-confirm-lulus:hover {
            background-color: #15803d;
        }

        .modal-btn-confirm-tolak {
            background-color: #dc2626;
            color: white;
            border: none;
            padding: 10px;
            width: 100%;
            border-radius: 9px;
            font-weight: 600;
            font-size: 13px;
            cursor: pointer;
            margin-top: 12px;
            transition: 0.2s;
        }

        .modal-btn-confirm-tolak:hover {
            background-color: #b91c1c;
        }

        .modal-btn-batal {
            background-color: #f1f5f9;
            color: #475569;
            border: none;
            padding: 9px;
            width: 100%;
            border-radius: 9px;
            font-weight: 600;
            font-size: 13px;
            cursor: pointer;
            transition: 0.2s;
        }

        .modal-btn-batal:hover {
            background-color: #e2e8f0;
        }

        .reason-box {
            width: 100%;
            display: flex;
            flex-direction: column;
            gap: 6px;
            margin-bottom: 14px;
            text-align: left;
        }

        .reason-label {
            font-size: 12px;
            color: #334155;
            font-weight: 600;
        }

        .reason-textarea {
            width: 100%;
            height: 75px;
            border: 1px solid #cbd5e1;
            border-radius: 9px;
            padding: 8px 10px;
            font-size: 12.5px;
            outline: none;
            resize: none;
            color: #334155;
        }

        /* print */
       /* print */
@media print {
    @page {
        size: A4 portrait;
        margin: 0; /* Buang tarikh, tajuk laman web & URL pelayar di atas dan bawah */
    }

    body * {
        visibility: hidden !important;
    }

    #modalReport,
    #modalReport * {
        visibility: visible !important;
    }

    #modalReport,
    #modalReport .modal-report-content,
    #modalReport .report-card,
    #modalReport .justification-box,
    #modalReport div,
    #modalReport table,
    #modalReport th,
    #modalReport td {
        background: #ffffff !important;
        background-color: #ffffff !important;
        color: #000000 !important;
        box-shadow: none !important;
        -webkit-print-color-adjust: economy !important;
        print-color-adjust: economy !important;
    }

    #modalReport img {
        -webkit-print-color-adjust: exact !important;
        print-color-adjust: exact !important;
    }

    #modalReport .report-card,
    #modalReport .justification-box,
    #modalReport table,
    #modalReport th,
    #modalReport td {
        border: 1px solid #cbd5e1 !important;
    }

    #modalReport {
        position: absolute !important;
        left: 0 !important;
        top: 0 !important;
        width: 100% !important;
        height: auto !important;
        display: block !important;
        background: transparent !important;
    }

    #modalReport .modal-report-content {
        position: absolute !important;
        left: 0 !important;
        top: 0 !important;
        width: 100% !important;
        max-width: 100% !important;
        padding: 15mm 18mm !important; /* Jidar kertas A4 supaya susun atur kekal kemas */
        margin: 0 !important;
        border: none !important;
        box-sizing: border-box !important;
    }

    #modalReport div,
    #modalReport table {
        max-height: none !important;
        overflow: visible !important;
    }

    #modalReport .modal-actions,
    #modalReport .close-btn,
    #modalReport #closeReportBtn {
        display: none !important;
    }

    #modalReport .print-header-logo {
        display: flex !important;
    }
}

/* Sembunyikan logo RTM semasa paparan skrin biasa */
.print-header-logo {
    display: none;
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
                <a href="{{ route('admin.pengguna') }}" class="nav-link">
                    <i class="fa-solid fa-users"></i>
                    <span>Pengguna</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.kelulusan') }}" class="nav-link active">
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

        
        @include('partials.top-header')

        
        <main class="content-body">

            <h1 class="page-title">Permohonan baru</h1>
            <p class="page-subtitle">Senarai permohonan yang memerlukan semakan dan kelulusan Admin</p>

            @php
                $senarai = collect($permohonan ?? []);
                $bilJumlah = $senarai->count();
                $bilProses = $senarai->filter(fn($i) => !in_array(strtolower($i->status ?? ''), ['terima', 'lulus', 'diterima', 'ditolak']))->count();
                $bilDiterima = $senarai->filter(fn($i) => in_array(strtolower($i->status ?? ''), ['terima', 'lulus', 'diterima']))->count();
                $bilDitolak = $senarai->filter(fn($i) => strtolower($i->status ?? '') == 'ditolak')->count();
            @endphp

            
            <div class="stats-grid">
                <div class="stat-card" style="border-left-color: #29158f;">
                    <div class="stat-icon" style="background: #eef2ff; color: #29158f;">
                        <i class="fa-solid fa-file-lines"></i>
                    </div>
                    <div class="stat-info">
                        <span class="title">Jumlah Permohonan</span>
                        <span class="value">{{ $bilJumlah }}</span>
                    </div>
                </div>

                <div class="stat-card" style="border-left-color: #f59e0b;">
                    <div class="stat-icon" style="background: #fef3c7; color: #d97706;">
                        <i class="fa-solid fa-hourglass-half"></i>
                    </div>
                    <div class="stat-info">
                        <span class="title">Dalam Proses</span>
                        <span class="value" style="color: #d97706;">{{ $bilProses }}</span>
                    </div>
                </div>

                <div class="stat-card" style="border-left-color: #10b981;">
                    <div class="stat-icon" style="background: #ecfdf5; color: #10b981;">
                        <i class="fa-solid fa-circle-check"></i>
                    </div>
                    <div class="stat-info">
                        <span class="title">Diterima</span>
                        <span class="value" style="color: #10b981;">{{ $bilDiterima }}</span>
                    </div>
                </div>

                <div class="stat-card" style="border-left-color: #ef4444;">
                    <div class="stat-icon" style="background: #fee2e2; color: #ef4444;">
                        <i class="fa-solid fa-circle-xmark"></i>
                    </div>
                    <div class="stat-info">
                        <span class="title">Ditolak</span>
                        <span class="value" style="color: #ef4444;">{{ $bilDitolak }}</span>
                    </div>
                </div>
            </div>

            
            <div class="filter-bar">
                <div class="search-box">
                    <i class="fa-solid fa-magnifying-glass" style="color: #94a3b8;"></i>
                    <input type="text" id="liveSearchPermohonan" placeholder="Cari ID, nama pemohon atau item...">
                </div>

                <select class="status-select" id="statusFilterPermohonan">
                    <option value="">Semua status</option>
                    <option value="Dalam proses">Dalam proses</option>
                    <option value="Diterima">Diterima</option>
                    <option value="Ditolak">Ditolak</option>
                </select>
            </div>

          
            <div class="table-card">
                <table class="custom-table" id="permohonanTable">
                    <thead>
                        <tr>
                            <th class="center">ID Permohonan</th>
                            <th>Pemohon</th>
                            <th>Item</th>
                            <th>Tarikh mohon</th>
                            <th class="center">Butiran</th>
                            <th class="center">Status Pelulus</th>
                            <th class="center">Tindakan Admin</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($permohonan ?? [] as $item)
                            @php
                                $statusAdminLower = strtolower($item->status ?? '');
                                $kategoriStatus = in_array($statusAdminLower, ['terima', 'lulus', 'diterima'])
                                    ? 'Diterima'
                                    : ($statusAdminLower == 'ditolak' ? 'Ditolak' : 'Dalam proses');
                            @endphp
                            <tr data-status="{{ $kategoriStatus }}">
                                <td class="center" style="font-weight: 700; color: #1e0b75;">
                                    {{ str_pad($item->id_permohonan ?? $item->id, 3, '0', STR_PAD_LEFT) }}
                                </td>
                                <td style="font-weight: 600; color: #0f172a;">
                                    {{ $item->user->name ?? $item->nama_pemohon ?? $item->name }}
                                </td>
                                <td>{{ $item->nama_item ?? $item->peralatan->nama_peralatan ?? '-' }}</td>
                                <td>{{ \Carbon\Carbon::parse($item->created_at)->format('d/m/Y') }}</td>

                                <!-- details report-->
                                <td class="center">
                                    <button type="button" class="btn-icon-soft btn-open-report"
                                        title="Lihat Laporan Permohonan"
                                        data-id="{{ str_pad($item->id_permohonan ?? $item->id, 3, '0', STR_PAD_LEFT) }}"
                                        data-nama="{{ $item->user?->name ?? $item->nama_pemohon ?? '-' }}"
                                        data-ic="{{ $item->user?->ic ?? '-' }}"
                                        data-phone="{{ $item->user?->phone ?? '-' }}"
                                        data-email="{{ $item->user?->email ?? '-' }}"
                                        data-tarikh="{{ \Carbon\Carbon::parse($item->created_at)->format('d/m/Y') }}"
                                        data-jenis="{{ $item->jenis_permohonan ?? '-' }}"
                                        data-namapenerima="{{ $item->nama_penerima ?? '-' }}"
                                        data-lokasi="{{ $item->lokasi ?? '-' }}"
                                        data-item="{{ $item->nama_item ?? $item->peralatan->nama_peralatan ?? '-' }}"
                                        data-justifikasi="{{ $item->tujuan ?? '-' }}">
                                        <i class="fa-solid fa-file-lines"></i>
                                    </button>
                                </td>

                                <!-- status pelulus -->
                                <td class="center">
                                    @if(in_array(strtolower($item->status_pelulus ?? ''), ['disokong', 'terima', 'lulus', 'diterima']))
                                        <span class="badge-status badge-pelulus-diterima">
                                            <i class="fa-solid fa-user-check"></i> Diterima Pelulus
                                        </span>
                                    @elseif(strtolower($item->status_pelulus ?? '') == 'ditolak')
                                        <span class="badge-status badge-pelulus-ditolak">
                                            <i class="fa-solid fa-user-xmark"></i> Ditolak Pelulus
                                        </span>
                                    @else
                                        <span class="badge-status badge-pelulus-menunggu">
                                            <i class="fa-solid fa-clock"></i> Menunggu Pelulus
                                        </span>
                                    @endif
                                </td>

                                <!-- admin punya tindakan -->
                                <td class="center">
                                    @if(in_array($statusAdminLower, ['terima', 'lulus', 'diterima']))
                                        <span class="badge-status badge-diterima">
                                            <i class="fa-solid fa-check"></i> Diterima
                                        </span>
                                    @elseif($statusAdminLower == 'ditolak')
                                        <span class="badge-status badge-ditolak">
                                            <i class="fa-solid fa-xmark"></i> Ditolak
                                        </span>
                                    @elseif(in_array(strtolower($item->status_pelulus ?? ''), ['disokong', 'terima', 'lulus', 'diterima']))
                                        <div class="btn-action-group">
                                            <button type="button" class="btn-lulus btn-open-lulus"
                                                data-id="{{ $item->id }}"
                                                data-action="{{ route('admin.kelulusan.update', $item->id) }}">
                                                <i class="fa-solid fa-check"></i> Terima
                                            </button>
                                            <button type="button" class="btn-tolak btn-open-tolak"
                                                data-id="{{ $item->id }}"
                                                data-action="{{ route('admin.kelulusan.update', $item->id) }}">
                                                <i class="fa-solid fa-xmark"></i> Tolak
                                            </button>
                                        </div>
                                    @else
                                        <span style="color: #94a3b8; font-size: 11px; font-style: italic;">
                                            Menunggu Pelulus
                                        </span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="center" style="padding: 35px; color: #94a3b8; font-style: italic;">
                                    <i class="fa-solid fa-folder-open" style="font-size: 24px; margin-bottom: 8px; display: block;"></i>
                                    Tiada rekod permohonan dijumpai.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </main>
    </div>

    <!-- popup -->
    <div class="modal" id="modalReport">
        <div class="modal-report-content">
            <span class="close-btn" id="closeReportBtn" style="position: absolute; right: 24px; top: 20px;">&times;</span>

            <div class="print-header-logo" style="align-items: center; gap: 14px; border-bottom: 1.5px solid #cbd5e1; padding-bottom: 12px; margin-bottom: 16px;">
        <img src="{{ asset('images/rtmlogo.png') }}" alt="Logo RTM" style="height: 55px; width: auto;">
        <div>
            <div style="font-size: 15px; font-weight: 700; color: #000000;">JABATAN PENYIARAN MALAYSIA (RTM)</div>
            <div style="font-size: 12px; color: #334155;">Sistem Pengurusan Permohonan Peralatan ICT (iMohon)</div>
        </div>
    </div> 
            <h2 class="report-title">Butiran Permohonan</h2>

            <div class="report-grid">
                <!-- Maklumat Pemohon -->
                <div class="report-card">
                    <h3 class="report-card-header">Maklumat Pemohon</h3>

                    <div class="detail-row">
                        <span class="detail-label">Nama penuh</span>
                        <span class="detail-colon">:</span>
                        <span class="detail-value" id="repNama">-</span>
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">No. kad pengenalan</span>
                        <span class="detail-colon">:</span>
                        <span class="detail-value" id="repIC">-</span>
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">No. Tel</span>
                        <span class="detail-colon">:</span>
                        <span class="detail-value" id="repPhone">-</span>
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Email</span>
                        <span class="detail-colon">:</span>
                        <span class="detail-value" id="repEmail">-</span>
                    </div>
                </div>

                <!-- Maklumat Permohonan -->
                <div class="report-card">
                    <h3 class="report-card-header">Maklumat Permohonan</h3>

                    <div class="detail-row">
                        <span class="detail-label">ID permohonan</span>
                        <span class="detail-colon">:</span>
                        <span class="detail-value" id="repID">-</span>
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Tarikh mohon</span>
                        <span class="detail-colon">:</span>
                        <span class="detail-value" id="repTarikh">-</span>
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Jenis permohonan</span>
                        <span class="detail-colon">:</span>
                        <span class="detail-value" id="repJenis">-</span>
                    </div>
                </div>
            </div>

            
            <div style="margin-top: 15px; background: #eef2ff; border-radius: 14px; padding: 18px;">
                <h3 style="font-size: 14px; font-weight: bold; color: #1e0b75; margin-bottom: 12px;">
                    Senarai Penerima Permohonan
                </h3>

                <div style="overflow-x: auto;">
                    <table style="width: 100%; border-collapse: collapse; font-size: 13px; text-align: left; background: white; border-radius: 10px; overflow: hidden;">
                        <thead>
                            <tr style="background: #e0e7ff; color: #3730a3;">
                                <th style="padding: 10px 12px; width: 110px;">Penerima</th>
                                <th style="padding: 10px 12px;">Nama Penerima</th>
                                <th style="padding: 10px 12px;">Alat Dimohon</th>
                                <th style="padding: 10px 12px;">Lokasi</th>
                            </tr>
                        </thead>
                        <tbody id="tblBodyPenerima">
                            <!-- Diisi oleh JavaScript -->
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="justification-section">
                <h3 class="justification-title">Justifikasi</h3>
                <div class="justification-box" id="repJustifikasi">-</div>
            </div>

            <div class="modal-actions" style="margin-top: 20px; display: flex; justify-content: flex-end; gap: 8px;">
                <button type="button" class="btn-print" onclick="printModalContent()" style="background: #29158f; color: white; border: none; padding: 10px 20px; border-radius: 9px; font-weight: 600; font-size: 13px; cursor: pointer; display: inline-flex; align-items: center; gap: 8px;">
                    <i class="fa-solid fa-print"></i> CETAK LAPORAN
                </button>
            </div>
        </div>
    </div>

    <!-- popup terima -->
    <div class="modal" id="modalLulus">
        <div class="modal-content-confirm">
            <div class="icon-circle-success">
                <i class="fa-solid fa-check"></i>
            </div>
            <p class="modal-confirm-title">Terima permohonan ini?</p>

            <form id="formConfirmLulus" action="" method="POST" style="width: 100%; display: flex; flex-direction: column; align-items: center;">
                @csrf
                <input type="hidden" name="status" value="Lulus">

                <div class="reason-box">
                    <span class="reason-label">Catatan kelulusan (Pilihan):</span>
                    <textarea name="catatan_kelulusan" class="reason-textarea" placeholder="Masukkan catatan kelulusan jika ada..."></textarea>
                </div>

                <button type="submit" class="modal-btn-confirm-lulus">Ya, Terima</button>
            </form>
            <button type="button" class="modal-btn-batal close-lulus-btn" style="margin-top: 8px;">Batal</button>
        </div>
    </div>

    <!-- popup tolak -->
    <div class="modal" id="modalTolak">
        <div class="modal-content-confirm">
            <div class="icon-circle-danger">
                <i class="fa-solid fa-xmark"></i>
            </div>
            <p class="modal-confirm-title">Tolak permohonan ini?</p>

            <form id="formConfirmTolak" action="" method="POST" style="width: 100%; display: flex; flex-direction: column; align-items: center;">
                @csrf
                <input type="hidden" name="status" value="Ditolak">

                <div class="reason-box">
                    <span class="reason-label">Sebab penolakan:</span>
                    <textarea name="sebab_penolakan" class="reason-textarea" required placeholder="Nyatakan sebab penolakan..."></textarea>
                </div>

                <button type="submit" class="modal-btn-confirm-tolak">Ya, Tolak</button>
            </form>
            <button type="button" class="modal-btn-batal close-tolak-btn" style="margin-top: 8px;">Batal</button>
        </div>
    </div>

    <script>

    function printModalContent() {
    window.print();
}
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

    // butiran
    const modalReport = document.getElementById('modalReport');
    const btnsReport = document.querySelectorAll('.btn-open-report');
    const closeReportBtn = document.getElementById('closeReportBtn');

    btnsReport.forEach(btn => {
        btn.onclick = function () {
            document.getElementById('repNama').innerText = this.getAttribute('data-nama') || '-';
            document.getElementById('repIC').innerText = this.getAttribute('data-ic') || '-';
            document.getElementById('repPhone').innerText = this.getAttribute('data-phone') || '-';
            document.getElementById('repEmail').innerText = this.getAttribute('data-email') || '-';

            document.getElementById('repID').innerText = this.getAttribute('data-id') || '-';
            document.getElementById('repTarikh').innerText = this.getAttribute('data-tarikh') || '-';
            document.getElementById('repJenis').innerText = this.getAttribute('data-jenis') || '-';
            document.getElementById('repJustifikasi').innerText = this.getAttribute('data-justifikasi') || 'Tiada justifikasi.';

            // ambil nama-nama penerima and lokasi asing
            const strPenerima = this.getAttribute('data-namapenerima') || '';
            const strItem     = this.getAttribute('data-item') || '';
            const strLokasi   = this.getAttribute('data-lokasi') || '';

            const listPenerima = strPenerima ? strPenerima.split(',').map(s => s.trim()) : [];
            const listItem     = strItem ? strItem.split(',').map(s => s.trim()) : [];

            let listLokasi = []; // split kan lokasi

            if (strLokasi.includes('|')) {
            
                listLokasi = strLokasi.split('|').map(s => s.trim());
            } else if (strLokasi.includes(';')) {
            
                listLokasi = strLokasi.split(';').map(s => s.trim());
            } else if (strLokasi.includes(',')) {
            
            const rawParts = strLokasi.split(',').map(s => s.trim());
    
            // gabungkan koma untuk alamat
            for (let i = 0; i < rawParts.length; i += 2) {
                if (rawParts[i + 1]) {
                    listLokasi.push(`${rawParts[i]}, ${rawParts[i + 1]}`);
                } else {
                listLokasi.push(rawParts[i]);
                }
            }
             } else {
                listLokasi = [strLokasi.trim()];
            }

            const tbody = document.getElementById('tblBodyPenerima');
            if (tbody) {
                tbody.innerHTML = '';

            if (listPenerima.length > 0) {
                listPenerima.forEach((nama, index) => {
            const item = listItem[index] || listItem[0] || '-';
            
            const lokasi = listLokasi[index] || listLokasi[0] || '-';

            const row = `
                <tr style="border-bottom: 1px solid #f1f5f9;">
                    <td style="padding: 10px 12px; font-weight: 700; color: #201f25;">Penerima ${index + 1}</td>
                    <td style="padding: 10px 12px; font-weight: 600; color: #0f172a;">${nama}</td>
                    <td style="padding: 10px 12px; color: #334155;">${item}</td>
                    <td style="padding: 10px 12px; color: #64748b;">${lokasi}</td>
                </tr>
            `;
            tbody.insertAdjacentHTML('beforeend', row);
        });
    }
}

            if (modalReport) modalReport.style.display = 'flex';
        };
    });

    if (closeReportBtn) {
        closeReportBtn.onclick = () => modalReport.style.display = 'none';
    }

    // popup terima
    const modalLulus = document.getElementById('modalLulus');
    const btnsLulus = document.querySelectorAll('.btn-open-lulus');
    const closeLulusBtn = document.querySelector('.close-lulus-btn');
    const formConfirmLulus = document.getElementById('formConfirmLulus');

    btnsLulus.forEach(btn => {
        btn.onclick = function () {
            // ambil ID permohonan asal 
            const id = this.getAttribute('data-id');
            if (formConfirmLulus) {
                let actionUrl = "{{ route('admin.kelulusan.update', ':id') }}";
                formConfirmLulus.action = actionUrl.replace(':id', id);
            }
            if (modalLulus) modalLulus.style.display = 'flex';
        };
    });

    if (closeLulusBtn) {
        closeLulusBtn.onclick = () => modalLulus.style.display = 'none';
    }

    

    // popup tolak
    const modalTolak = document.getElementById('modalTolak');
    const btnsTolak = document.querySelectorAll('.btn-open-tolak');
    const closeTolakBtn = document.querySelector('.close-tolak-btn');
    const formConfirmTolak = document.getElementById('formConfirmTolak');

    btnsTolak.forEach(btn => {
        btn.onclick = function () {
            const id = this.getAttribute('data-id');
            if (formConfirmTolak) {
                let actionUrl = "{{ route('admin.kelulusan.update', ':id') }}";
                formConfirmTolak.action = actionUrl.replace(':id', id);
                
                const reasonBox = formConfirmTolak.querySelector('textarea[name="sebab_penolakan"]');
                if (reasonBox) reasonBox.value = '';
            }
            if (modalTolak) modalTolak.style.display = 'flex';
        };
    });

    if (closeTolakBtn) {
        closeTolakBtn.onclick = () => modalTolak.style.display = 'none';
    }

    
    window.onclick = (e) => {
        if (e.target === modalReport) modalReport.style.display = 'none';
        if (e.target === modalLulus) modalLulus.style.display = 'none';
        if (e.target === modalTolak) modalTolak.style.display = 'none';
    };

    
    const searchInput = document.querySelector('.search-box input');
    const tableRows = document.querySelectorAll('.custom-table tbody tr');

    if (searchInput) {
        searchInput.addEventListener('input', function () {
            const query = this.value.toLowerCase().trim();

            tableRows.forEach(row => {
                if (
                    row.children.length === 1 &&
                    row.children[0].hasAttribute('colspan')
                ) {
                    return;
                }

                const textContent = row.textContent.toLowerCase();

                if (textContent.includes(query)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    }
});
</script>
</body>
</html>