<!DOCTYPE html>
<html lang="ms">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rekod Vendor - iMohon</title>

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

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
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-bottom: 26px;
            max-width: 920px;
        }

        .stat-card {
            background: white;
            border-radius: 14px;
            padding: 18px 22px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.03);
            display: flex;
            align-items: center;
            gap: 16px;
            border-left: 4px solid #29158f;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .stat-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 18px rgba(0, 0, 0, 0.06);
        }

        .stat-icon {
            width: 46px;
            height: 46px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
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
            font-size: 23px;
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

        
        .kontrak-badge {
            background: #f1f5f9;
            color: #0f172a;
            border: 1px solid #e2e8f0;
            padding: 4px 10px;
            border-radius: 8px;
            font-family: monospace;
            font-weight: 700;
            font-size: 12px;
            display: inline-block;
        }

        .pill-unit {
            background: #eef2ff;
            color: #29158f;
            padding: 4px 12px;
            border-radius: 14px;
            font-weight: 700;
            font-size: 12px;
            display: inline-block;
            min-width: 48px;
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
            inset: 0;
            width: 100vw;
            height: 100vh;
            background: rgba(15, 23, 42, 0.55);
            backdrop-filter: blur(3px);
            align-items: center;
            justify-content: center;
            z-index: 99999;
        }

        .modal-content {
            background-color: white;
            border-radius: 18px;
            padding: 30px;
            width: 92%;
            max-width: 520px;
            max-height: 90vh;
            overflow-y: auto;
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.15);
            position: relative;
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .modal-header h3 {
            font-size: 19px;
            color: #1e0b75;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .close-btn {
            font-size: 24px;
            cursor: pointer;
            color: #94a3b8;
            line-height: 1;
        }

        .close-btn:hover {
            color: #1e0b75;
        }

        .form-group {
            margin-bottom: 14px;
        }

        .form-group label {
            display: block;
            font-size: 12px;
            font-weight: 600;
            color: #475569;
            margin-bottom: 5px;
        }

        .form-group input {
            width: 100%;
            padding: 10px 13px;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            font-size: 13px;
            outline: none;
        }

        .form-group input:focus {
            border-color: #29158f;
        }

        .form-submit {
            width: 100%;
            background-color: #1e0b75;
            color: white;
            border: none;
            padding: 12px;
            border-radius: 10px;
            font-weight: 700;
            font-size: 14px;
            cursor: pointer;
            margin-top: 8px;
            transition: background 0.2s;
        }

        .form-submit:hover {
            background-color: #29158f;
        }

        
        .modal-vendor-detail {
            max-width: 750px;
            padding: 32px;
        }

        .vendor-title {
            font-size: 19px;
            font-weight: bold;
            color: #0f172a;
            margin-bottom: 18px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .contract-box {
            background-color: #eef2ff;
            border: 1px solid #e0e7ff;
            border-radius: 14px;
            padding: 20px 24px;
            margin-bottom: 22px;
            display: grid;
            grid-template-columns: 1.15fr 1fr;
            row-gap: 12px;
            column-gap: 20px;
            font-size: 13px;
        }

        .contract-item {
            display: flex;
            align-items: center;
        }

        .contract-label {
            color: #475569;
            width: 115px;
            flex-shrink: 0;
            font-weight: 500;
        }

        .contract-colon {
            color: #0f172a;
            margin-right: 10px;
            font-weight: bold;
        }

        .contract-value {
            color: #0f172a;
            font-weight: 700;
        }

        .equipment-box {
            background-color: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 14px;
            padding: 18px;
        }

        .detail-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 13px;
        }

        .detail-table th {
            background-color: #e0e7ff;
            color: #3730a3;
            padding: 10px 14px;
            text-align: left;
            font-weight: 600;
        }

        .detail-table td {
            padding: 12px 14px;
            color: #334155;
            border-bottom: 1px solid #e2e8f0;
        }

        .detail-table td.center {
            text-align: center;
            font-weight: 600;
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
                <a href="{{ route('admin.vendor') }}" class="nav-link active">
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
        <header class="top-header">
            <div class="user-profile">
                <span>Admin</span>
                <div class="user-avatar"><i class="fa-solid fa-user"></i></div>
            </div>
        </header>

        <main class="content-body">
            <h1 class="page-title">Rekod vendor</h1>
            <p class="page-subtitle">Senarai pembekal berdaftar, maklumat kontrak dan jumlah peralatan dibekalkan</p>

            
            <div class="stats-grid">
                <div class="stat-card" style="border-left-color: #29158f;">
                    <div class="stat-icon" style="background: #eef2ff; color: #29158f;">
                        <i class="fa-solid fa-store"></i>
                    </div>
                    <div class="stat-info">
                        <span class="title">Jumlah vendor</span>
                        <span class="value">{{ $jumlahVendor }}</span>
                    </div>
                </div>

                <div class="stat-card" style="border-left-color: #ec4899;">
                    <div class="stat-icon" style="background: #fce7f3; color: #db2777;">
                        <i class="fa-solid fa-file-signature"></i>
                    </div>
                    <div class="stat-info">
                        <span class="title">Jumlah kontrak</span>
                        <span class="value" style="color: #db2777;">{{ $jumlahKontrak }}</span>
                    </div>
                </div>

                <div class="stat-card" style="border-left-color: #10b981;">
                    <div class="stat-icon" style="background: #ecfdf5; color: #10b981;">
                        <i class="fa-solid fa-box-archive"></i>
                    </div>
                    <div class="stat-info">
                        <span class="title">Jumlah item</span>
                        <span class="value" style="color: #10b981;">{{ number_format($jumlahItem ?? 0) }}</span>
                    </div>
                </div>
            </div>

            
            <div class="action-bar">
                <div class="search-box">
                    <i class="fa-solid fa-magnifying-glass" style="color: #94a3b8;"></i>
                    <input type="text" id="liveSearchVendor" value="{{ request('search') }}" placeholder="Cari nama vendor atau no. kontrak...">
                </div>

                <button type="button" class="btn-add" id="openAddModalBtn">
                    <i class="fa-solid fa-plus"></i> Tambah Vendor
                </button>
            </div>

            <!-- table vendor -->
            <div class="table-card">
                <table class="custom-table" id="vendorTable">
                    <thead>
                        <tr>
                            <th class="center" style="width: 60px;">No</th>
                            <th style="width: 32%;">Vendor</th>
                            <th>No. Kontrak</th>
                            <th class="center">Jumlah Peralatan</th>
                            <th class="center" style="width: 110px;">Butiran</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($vendors as $vendor)
                            <tr>
                                <td class="center" style="color: #64748b; font-weight: 600;">{{ $loop->iteration }}</td>
                                <td style="font-weight: 700; color: #0f172a;">{{ $vendor->nama_vendor }}</td>
                                <td>
                                    <span class="kontrak-badge">{{ $vendor->no_kontrak }}</span>
                                </td>
                                <td class="center">
                                    <span class="pill-unit">{{ number_format($vendor->jumlah_peralatan) }}</span>
                                </td>
                                <td class="center">
                                    <button type="button" class="btn-icon-soft btn-icon-view open-detail-btn"
                                        title="Lihat Rekod Kontrak"
                                        data-vendor='@json($vendor->loadMissing("peralatans"))'>
                                        <i class="fa-solid fa-file-lines"></i>
                                    </button>

                                    <form action="{{ route('admin.vendor.destroy', $vendor->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Adakah anda pasti ingin memadam vendor ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-icon-soft btn-icon-delete" title="Padam Vendor">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="center" style="padding: 35px; color: #94a3b8; font-style: italic;">
                                    <i class="fa-solid fa-folder-open" style="font-size: 24px; margin-bottom: 8px; display: block;"></i>
                                    Tiada rekod vendor dijumpai.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </main>
    </div>

    <!-- popup details vendor & kontrak -->
    <div class="modal" id="detailModal">
        <div class="modal-content modal-vendor-detail">
            <span class="close-btn" id="closeDetailModalBtn" style="position: absolute; right: 25px; top: 20px;">&times;</span>

            <h2 class="vendor-title">
                <span style="background: #1e0b75; color: white; width: 38px; height: 38px; border-radius: 10px; display: inline-flex; align-items: center; justify-content: center; font-size: 16px;">
                    <i class="fa-solid fa-store"></i>
                </span>
                <span id="detailNamaVendor">-</span>
            </h2>

            <div class="contract-box">
                <div class="contract-item">
                    <span class="contract-label">No. kontrak</span>
                    <span class="contract-colon">:</span>
                    <span class="contract-value" id="detailNoKontrak">-</span>
                </div>

                <div class="contract-item">
                    <span class="contract-label">Tarikh mula</span>
                    <span class="contract-colon">:</span>
                    <span class="contract-value" id="detailTarikhMula">-</span>
                </div>

                <div class="contract-item">
                    <span class="contract-label">PIC kontrak</span>
                    <span class="contract-colon">:</span>
                    <span class="contract-value" id="detailPicKontrak">-</span>
                </div>

                <div class="contract-item">
                    <span class="contract-label">Tarikh tamat</span>
                    <span class="contract-colon">:</span>
                    <span class="contract-value" id="detailTarikhTamat">-</span>
                </div>

                <div class="contract-item">
                    <span class="contract-label">Pemilik kontrak</span>
                    <span class="contract-colon">:</span>
                    <span class="contract-value" id="detailPemilikKontrak">-</span>
                </div>

                <div class="contract-item">
                    <span class="contract-label">Nilai kontrak</span>
                    <span class="contract-colon">:</span>
                    <span class="contract-value" id="detailNilaiKontrak">RM 0.00</span>
                </div>
            </div>

            <div class="equipment-box">
                <table class="detail-table">
                    <thead>
                        <tr>
                            <th style="width: 55px; text-align: center;">Bil.</th>
                            <th>Kategori / Nama Peralatan</th>
                            <th style="text-align: center;">Jumlah Unit Peralatan</th>
                        </tr>
                    </thead>
                    <tbody id="detailPeralatanList">
                        <!-- Data diisi melalui JavaScript -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!--tambah vendor & kontrak -->
    <div class="modal" id="addModal">
        <div class="modal-content">
            <div class="modal-header">
                <h3>
                    <i class="fa-solid fa-clipboard-list"></i> Tambah Vendor & Kontrak
                </h3>
                <span class="close-btn" id="closeAddModalBtn">&times;</span>
            </div>

            <form action="{{ route('admin.vendor.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label>Nama Vendor</label>
                    <input type="text" name="nama_vendor" required placeholder="Contoh: BUMI OPTIMUS SDN BHD">
                </div>

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 12px;">
                    <div class="form-group">
                        <label>No. Kontrak</label>
                        <input type="text" name="no_kontrak" required placeholder="Contoh: QT240000000029890">
                    </div>
                    <div class="form-group">
                        <label>PIC Kontrak</label>
                        <input type="text" name="pic_kontrak" placeholder="Nama pegawai bertanggungjawab">
                    </div>
                </div>

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 12px;">
                    <div class="form-group">
                        <label>Pemilik Kontrak</label>
                        <input type="text" name="pemilik_kontrak" placeholder="Bahagian / Unit">
                    </div>
                    <div class="form-group">
                        <label>Nilai Kontrak (RM)</label>
                        <input type="number" step="0.01" name="nilai_kontrak" placeholder="0.00">
                    </div>
                </div>

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 12px;">
                    <div class="form-group">
                        <label>Tarikh Mula</label>
                        <input type="date" name="tarikh_mula" required>
                    </div>
                    <div class="form-group">
                        <label>Tarikh Tamat</label>
                        <input type="date" name="tarikh_tamat" required>
                    </div>
                </div>

                <div class="form-group">
                    <label>Jumlah Peralatan / Unit</label>
                    <input type="number" name="jumlah_peralatan" required min="0" placeholder="0">
                </div>

                <button type="submit" class="form-submit">Simpan Vendor & Kontrak</button>
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
                if (sidebar.classList.contains('collapsed')) {
                    toggleBtn.style.transform = 'rotate(180deg)';
                } else {
                    toggleBtn.style.transform = 'rotate(0deg)';
                }
            });
        }

        
        const detailModal = document.getElementById('detailModal');
        const detailBtns = document.querySelectorAll('.open-detail-btn');
        const closeDetailBtn = document.getElementById('closeDetailModalBtn');

        detailBtns.forEach(function (btn) {
            btn.addEventListener('click', function () {
                const vendorAttr = this.getAttribute('data-vendor');
                
                if (vendorAttr) {
                    const vendor = JSON.parse(vendorAttr);

                    
                    if (document.getElementById('detailNamaVendor')) 
                        document.getElementById('detailNamaVendor').innerText = vendor.nama_vendor || '-';
                    
                    if (document.getElementById('detailNoKontrak')) 
                        document.getElementById('detailNoKontrak').innerText = vendor.no_kontrak || '-';
                    
                    if (document.getElementById('detailPicKontrak')) 
                        document.getElementById('detailPicKontrak').innerText = vendor.pic_kontrak || 'Akan dikemaskini';
                    
                    if (document.getElementById('detailPemilikKontrak')) 
                        document.getElementById('detailPemilikKontrak').innerText = vendor.pemilik_kontrak || 'Kementerian Komunikasi';
                    
                    if (document.getElementById('detailTarikhMula')) 
                        document.getElementById('detailTarikhMula').innerText = vendor.tarikh_mula || '-';
                    
                    if (document.getElementById('detailTarikhTamat')) 
                        document.getElementById('detailTarikhTamat').innerText = vendor.tarikh_tamat || '-';

                    if (document.getElementById('detailNilaiKontrak')) {
                        const nilaiFormatted = parseFloat(vendor.nilai_kontrak || 0).toLocaleString('ms-MY', { minimumFractionDigits: 2 });
                        document.getElementById('detailNilaiKontrak').innerText = 'RM ' + nilaiFormatted;
                    }

                    // list alatan
                    const tbody = document.getElementById('detailPeralatanList');
                    if (tbody) {
                        tbody.innerHTML = ''; // Kosongkan paparan lama

                        if (vendor.peralatans && vendor.peralatans.length > 0) {
                            vendor.peralatans.forEach((item, index) => {
                                // Dibetulkan: Dapatkan nama & jumlah_unit dari pivot/model
                                const namaBarang = item.nama_peralatan || item.kategori || item.nama || '-';
                                const unitBarang = (item.pivot && item.pivot.jumlah_unit) ? item.pivot.jumlah_unit : (item.jumlah || 0);

                                const row = `
                                    <tr>
                                        <td style="text-align:center;">${index + 1}</td>
                                        <td>${namaBarang}</td>
                                        <td style="text-align:center; font-weight:bold;">${unitBarang}</td>
                                    </tr>
                                `;
                                tbody.innerHTML += row;
                            });
                        } else {
                            tbody.innerHTML = `
                                <tr>
                                    <td colspan="3" style="text-align:center; color:#94a3b8; padding:15px; font-style:italic;">
                                        Tiada rekod peralatan dari inventori didaftarkan di bawah vendor ini.
                                    </td>
                                </tr>
                            `;
                        }
                    }
                }

                if (detailModal) detailModal.style.display = 'flex';
            });
        });

        if (closeDetailBtn) {
            closeDetailBtn.addEventListener('click', function () {
                detailModal.style.display = 'none';
            });
        }

        const addModal = document.getElementById('addModal');
        const openAddBtn = document.getElementById('openAddModalBtn');
        const closeAddBtn = document.getElementById('closeAddModalBtn');

        if (openAddBtn && addModal && closeAddBtn) {
            openAddBtn.addEventListener('click', function () {
                addModal.style.display = 'flex';
            });

            closeAddBtn.addEventListener('click', function () {
                addModal.style.display = 'none';
            });
        }

        
        window.addEventListener('click', function (e) {
            if (e.target === detailModal) {
                detailModal.style.display = 'none';
            }
            if (e.target === addModal) {
                addModal.style.display = 'none';
            }
        });
    });
</script>
</body>
</html>