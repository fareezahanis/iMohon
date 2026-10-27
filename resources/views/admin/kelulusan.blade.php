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

        .logout-btn {
            background: none;
            border: none;
            width: 100%;
            cursor: pointer;
            text-align: left;
            font-family: inherit;
        }

        .sidebar.collapsed {
            width: 80px;
            padding: 25px 10px;
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
            margin-bottom: 30px;
        }

        /* content right */
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
            margin-bottom: 25px;
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

        /* filter search */
        .filter-bar {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 25px;
        }

        .search-box {
            background: white;
            border: 1px solid #cbd5e1;
            border-radius: 10px;
            padding: 5px 11px;
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

        .status-select {
            background: white;
            border: 1px solid #cbd5e1;
            border-radius: 10px;
            padding: 5px 14px;
            font-size: 13px;
            color: #334155;
            outline: none;
            cursor: pointer;
            height: 37px;
        }

        /* table*/
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

        .btn-action-group {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .btn-lulus {
            background-color: #86efac;
            color: #14532d;
            border: none;
            padding: 6px 12px;
            border-radius: 6px;
            font-size: 11px;
            font-weight: bold;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 4px;
            transition: 0.2s;
        }

        .btn-lulus:hover {
            background-color: #4ade80;
        }

        .btn-tolak {
            background-color: #fca5a5;
            color: #7f1d1d;
            border: none;
            padding: 6px 12px;
            border-radius: 6px;
            font-size: 11px;
            font-weight: bold;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 4px;
            transition: 0.2s;
        }

        .btn-tolak:hover {
            background-color: #f87171;
        }

        .action-icons i {
            cursor: pointer;
            font-size: 20px;
            color: #000;
            transition: color 0.2s;
        }

        .action-icons i:hover {
            color: #1e0b75;
        }

        /* popup modal detail */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.4);
            align-items: center;
            justify-content: center;
        }

        .close-btn {
            font-size: 24px;
            cursor: pointer;
            color: #888;
            transition: color 0.2s;
        }

        .close-btn:hover {
            color: #000;
        }

        .modal-report-content {
            background-color: white;
            border-radius: 20px;
            padding: 35px 40px;
            width: 100%;
            max-width: 820px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.15);
            position: relative;
        }

        .report-title {
            font-size: 22px;
            font-weight: bold;
            color: #111;
            margin-bottom: 25px;
        }

        .report-grid {
            display: grid;
            grid-template-columns: 1fr 1.1fr;
            gap: 20px;
            margin-bottom: 25px;
        }

        .report-card {
            background-color: #eef2ff;
            border: 1px solid #f1f5f9;
            border-radius: 16px;
            padding: 22px 25px;
        }

        .report-card-header {
            font-size: 14px;
            font-weight: 600;
            color: #334155;
            margin-bottom: 20px;
        }

        .detail-row {
            display: flex;
            align-items: center;
            margin-bottom: 14px;
            font-size: 12px;
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
            color: #000;
            margin-right: 12px;
            font-weight: bold;
        }

        .detail-value {
            color: #0f172a;
            font-weight: 600;
        }

        .justification-section {
            padding-left: 10px;
        }

        .justification-title {
            font-size: 14px;
            font-weight: 600;
            color: #334155;
            margin-bottom: 8px;
        }

        .justification-box {
            background-color: #eef2ff;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            padding: 14px 18px;
            font-size: 12px;
            color: #64748b;
            min-height: 55px;
        }

        /* popup lulus/tolak */
        .modal-content-confirm {
            background-color: white;
            border-radius: 16px;
            padding: 35px 30px;
            width: 100%;
            max-width: 380px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.15);
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .icon-circle-success {
            width: 60px;
            height: 60px;
            background-color: #bbf7d0;
            color: #16a34a;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 26px;
            margin-bottom: 20px;
        }

        .icon-circle-danger {
            width: 60px;
            height: 60px;
            background-color: #fca5a5;
            color: #dc2626;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            margin-bottom: 20px;
        }

        .modal-confirm-title {
            font-size: 15px;
            font-weight: bold;
            color: #1e293b;
            margin-bottom: 20px;
        }

        .modal-btn-confirm-lulus {
            background-color: #48bb78;
            color: white;
            border: none;
            padding: 10px;
            width: 140px;
            border-radius: 8px;
            font-weight: 600;
            font-size: 13px;
            cursor: pointer;
            margin-bottom: 10px;
            transition: 0.2s;
        }

        .modal-btn-confirm-lulus:hover {
            background-color: #38a169;
        }

        .modal-btn-confirm-tolak {
            background-color: #cc0000;
            color: white;
            border: none;
            padding: 10px;
            width: 140px;
            border-radius: 8px;
            font-weight: 600;
            font-size: 13px;
            cursor: pointer;
            margin-top: 15px;
            transition: 0.2s;
        }

        .modal-btn-confirm-tolak:hover {
            background-color: #990000;
        }

        .modal-btn-batal {
            background-color: white;
            color: #718096;
            border: 1px solid #cbd5e1;
            padding: 8px;
            width: 140px;
            border-radius: 8px;
            font-weight: 600;
            font-size: 13px;
            cursor: pointer;
            transition: 0.2s;
        }

        .modal-btn-batal:hover {
            background-color: #f8fafc;
        }

        .reason-box {
            width: 100%;
            display: flex;
            align-items: flex-start;
            gap: 10px;
            margin-bottom: 10px;
            text-align: left;
        }

        .reason-label {
            font-size: 11px;
            color: #000;
            font-weight: 600;
            white-space: nowrap;
            margin-top: 5px;
        }

        .reason-textarea {
            width: 100%;
            height: 70px;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            padding: 8px 10px;
            font-size: 12px;
            outline: none;
            resize: none;
            color: #334155;
        }
        
        /* BADGE STATUS STYLING */
        .badge-status {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 6px 12px;
            font-size: 11px;
            font-weight: 600;
            border-radius: 18px;
        }

        .badge-pelulus-diterima {
            background-color: #f3e8ff;
            color: #6b21a8;
            border: 1px solid #d8b4fe;
        }

        .badge-pelulus-menunggu {
            background-color: #fef08a;
            color: #854d0e;
        }

        .badge-pelulus-ditolak {
            background-color: #fee2e2;
            color: #991b1b;
        }

        .badge-diterima {
            background-color: #d1fae5;
            color: #065f46;
        }

        .badge-ditolak {
            background-color: #fee2e2;
            color: #991b1b;
        }
    </style>
</head>
<body>

    <!-- sidebar left -->
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

    <!-- content right -->
    <div class="main-wrapper">

        <!-- TOP HEADER -->
        <header class="top-header">
            <div class="user-profile">
                <span>Admin</span>
                <div class="user-avatar">
                    <i class="fa-solid fa-user"></i>
                </div>
            </div>
        </header>

        <!-- CONTENT BODY -->
        <main class="content-body">

            <div class="page-header">
                <h1 class="page-title">Permohonan baru</h1>
                <p class="page-subtitle">Senarai permohonan yang memerlukan kelulusan</p>
            </div>

            <!-- search bar & status filter -->
            <div class="filter-bar">
                <div class="search-box">
                    <i class="fa-solid fa-magnifying-glass" style="color: #94a3b8;"></i>
                    <input type="text" placeholder="Cari permohonan..">
                </div>

                <select class="status-select">
                    <option value="">Semua status</option>
                    <option value="Dalam proses">Dalam proses</option>
                    <option value="Diterima">Terima</option>
                    <option value="Ditolak">Ditolak</option>
                </select>
            </div>

            <!-- table lulus permohonan -->
            <div class="table-card">
                <table class="custom-table">
                    <thead>
                        <tr>
                            <th class="center">ID Permohonan</th>
                            <th>Pemohon</th>
                            <th>Item</th>
                            <th>Tarikh mohon</th>
                            <th class="center">Butiran</th>
                            <th class="center">Status Pelulus</th> <!-- DIPINDAHKAN KE SINI -->
                            <th class="center">Tindakan Admin</th> <!-- TINDAKAN DI HUJUNG -->
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($permohonan ?? [] as $item)
                            <tr>
                                <td class="center" style="font-weight: 600;">{{ str_pad($item->id_permohonan ?? $item->id, 3, '0', STR_PAD_LEFT) }}</td>
                                <td>{{ $item->user->name ?? $item->nama_pemohon ?? $item->name }}</td>
                                <td>{{ $item->nama_item ?? $item->peralatan->nama_peralatan }}</td>
                                <td>{{ \Carbon\Carbon::parse($item->created_at)->format('d/m/Y') }}</td>
                                
                                <!-- Details / Lihat Laporan -->
                                <td class="action-icons center">
                                    <i class="fa-solid fa-file-lines btn-open-report" 
                                       title="Lihat Laporan"
                                       data-id="{{ str_pad($item->id_permohonan ?? $item->id, 3, '0', STR_PAD_LEFT) }}"
                                       data-nama="{{ $item->user?->name }}"
                                       data-ic="{{ $item->user?->ic }}"
                                       data-phone="{{ $item->user?->phone }}"
                                       data-email="{{ $item->user?->email }}"
                                       data-tarikh="{{ \Carbon\Carbon::parse($item->created_at)->format('d/m/Y') }}"
                                       data-jenis="{{ $item->jenis_permohonan }}"
                                       data-namapenerima="{{ $item->nama_penerima}}"
                                       data-lokasi="{{ $item->lokasi }}"
                                       data-item="{{ $item->nama_item }}"
                                       data-justifikasi="{{ $item->tujuan }}">
                                    </i>
                                </td>

                                <!-- LAJUR STATUS PELULUS (PURPLE UNTUK DITERIMA) -->
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

                                <!-- LAJUR TINDAKAN ADMIN -->
                                <td class="center">
                                    @if(in_array(strtolower($item->status ?? ''), ['terima', 'lulus', 'diterima']))
                                        {{-- Papar Lencana Diterima jika Admin sudah luluskan --}}
                                        <span class="badge-status badge-diterima">
                                            <i class="fa-solid fa-check"></i> Diterima
                                        </span>

                                    @elseif(strtolower($item->status ?? '') == 'ditolak')
                                        {{-- Papar Lencana Ditolak jika Admin sudah tolak --}}
                                        <span class="badge-status badge-ditolak">
                                            <i class="fa-solid fa-xmark"></i> Ditolak
                                        </span>

                                    @elseif(in_array(strtolower($item->status_pelulus ?? ''), ['disokong', 'terima', 'diterima']))
                                        
                                        <div class="btn-action-group">
                                           <button type="button" class="btn-lulus btn-open-lulus" data-id="{{ $item->id }}">
                                                 <i class="fa-solid fa-check"></i> Terima
                                            </button>
                                            <button type="button" class="btn-tolak btn-open-tolak" data-id="{{ $item->id }}">
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

    <!-- popup details -->
    <div class="modal" id="modalReport">
        <div class="modal-report-content" style="max-width: 800px;">
            <span class="close-btn" id="closeReportBtn" style="position: absolute; right: 25px; top: 20px; cursor: pointer;">&times;</span>

            <h2 class="report-title">Butiran permohonan</h2>

            <div class="report-grid">
                <!-- maklumat pemohon (kiri) -->
                <div class="report-card">
                    <h3 class="report-card-header">Maklumat pemohon</h3>

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

                <!-- maklumat permohonan (kanan) -->
                <div class="report-card">
                    <h3 class="report-card-header">Maklumat permohonan</h3>

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

            <!-- table untuk nama penerima -->
            <div style="margin-top: 15px; background: #eef2ff; border-radius: 12px; padding: 15px;">
                <h3 style="font-size: 14px; font-weight: bold; color: #334155; margin-top: 0; margin-bottom: 12px;">
                    <i style="color: #08070c;"></i> Senarai Penerima Permohonan
                </h3>

                <div style="overflow-x: auto;">
                    <table style="width: 100%; border-collapse: collapse; font-size: 13px; text-align: left; background: white; border-radius: 8px; overflow: hidden; box-shadow: 0 1px 3px rgba(0,0,0,0.05);">
                        <thead>
                            <tr style="background: #e2e8f0; color: #334155;">
                                <th style="padding: 10px 12px; width: 130px;">Penerima</th>
                                <th style="padding: 10px 12px;">Nama Penerima</th>
                                <th style="padding: 10px 12px;"> Alat Dimohon</th>
                                <th style="padding: 10px 12px;">Lokasi</th>
                            </tr>
                        </thead>
                        <tbody id="tblBodyPenerima">
                            <!-- baris dalam table (js) -->
                        </tbody>
                    </table>
                </div>
            </div>

           
            <div class="justification-section" style="margin-top: 15px;">
                <h3 class="justification-title">Justifikasi</h3>
                <div class="justification-box" id="repJustifikasi">-</div>
            </div>
        </div>
    </div>

    <!-- popup lulus -->
    <div class="modal" id="modalLulus">
        <div class="modal-content-confirm">
            <div class="icon-circle-success">
                <i class="fa-solid fa-check"></i>
            </div>
            <p class="modal-confirm-title">Terima permohonan ini ?</p>
            
            <form id="formConfirmLulus" action="" method="POST" style="width: 100%; display: flex; flex-direction: column; align-items: center;">
                @csrf
                <input type="hidden" name="status" value="Lulus">
                <button type="submit" class="modal-btn-confirm-lulus">Terima</button>
            </form>
            <button type="button" class="modal-btn-batal close-lulus-btn">Batal</button>
        </div>
    </div>

    <!-- popup tolak -->
    <div class="modal" id="modalTolak">
        <div class="modal-content-confirm" style="max-width: 400px;">
            <div class="icon-circle-danger">
                <i class="fa-solid fa-xmark"></i>
            </div>
            <p class="modal-confirm-title">Tolak permohonan ini ?</p>

            <form id="formConfirmTolak" action="" method="POST" style="width: 100%; display: flex; flex-direction: column; align-items: center;">
                @csrf
                <input type="hidden" name="status" value="Ditolak">
                
                <div class="reason-box">
                    <span class="reason-label">Sebab penolakan :</span>
                    <textarea name="sebab_penolakan" class="reason-textarea" placeholder="Nyatakan sebab penolakan..."></textarea>
                </div>

                <button type="submit" class="modal-btn-confirm-tolak">Ya, tolak</button>
            </form>
            <button type="button" class="modal-btn-batal close-tolak-btn" style="margin-top: 10px;">Batal</button>
        </div>
    </div>

    <script>
document.addEventListener('DOMContentLoaded', function () {
    // 1. Sidebar Collapsed
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
            // ambil ID permohonan asal (ID Pangkalan Data)
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