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

        .bg-purple-light {
            background-color: #e9d5ff;
            color: #7e22ce;
        }

        .bg-pink-light {
            background-color: #fbcfe8;
            color: #be185d;
        }

        .bg-green-light {
            background-color: #bbf7d0;
            color: #15803d;
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

       

        .action-bar {
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
            max-width: 300px;
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
            padding: 9px 18px;
            border-radius: 10px;
            font-weight: 600;
            font-size: 13px;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            border: none;
            cursor: pointer;
            height: 37px;
        }

        .btn-add:hover {
            background-color: #2b12a3;
        }

    
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

        .custom-table th.center,
        .custom-table td.center {
            text-align: center;
        }

        .custom-table td {
            padding: 14px;
            color: #334155;
            border-bottom: 1px solid #f1f5f9;
        }

        .action-icons i {
            cursor: pointer;
            font-size: 18px;
            color: #111827;
            transition: color 0.2s;
        }

        .action-icons i:hover {
            color: #1e0b75;
        }

       

        .modal {
            display: none;
            position: fixed;
            inset: 0;
            width: 100vw;
            height: 100vh;
            background-color: rgba(0, 0, 0, 0.5);
            align-items: center;
            justify-content: center;
            z-index: 99999;
        }

        .modal-content {
            background-color: white;
            border-radius: 16px;
            padding: 30px;
            width: 90%;
            max-width: 500px;
            max-height: 90vh;
            overflow-y: auto;
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
            position: relative;
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .modal-header h3 {
            font-size: 20px;
            color: #1e0b75;
        }

        .close-btn {
            font-size: 24px;
            cursor: pointer;
            color: #888;
        }

        .close-btn:hover {
            color: #1e0b75;
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

   
       

        .modal-vendor-detail {
            max-width: 750px;
            padding: 35px;
        }

        .vendor-title {
            font-size: 18px;
            font-weight: bold;
            color: #000;
            margin-bottom: 20px;
        }

        .contract-box {
            background-color: #f8fafc;
            border: 1px solid #f1f5f9;
            border-radius: 16px;
            padding: 22px 25px;
            margin-bottom: 25px;
            display: grid;
            grid-template-columns: 1.2fr 1fr;
            row-gap: 14px;
            column-gap: 20px;
            font-size: 13px;
        }

        .contract-item {
            display: flex;
            align-items: center;
        }

        .contract-label {
            color: #7c7e81;
            width: 120px;
            flex-shrink: 0;
        }

        .contract-colon {
            color: #000;
            margin-right: 12px;
            font-weight: bold;
        }

        .contract-value {
            color: #191a1a;
            font-weight: 600;
        }

        .equipment-box {
            background-color: #f8fafc;
            border: 1px solid #f1f5f9;
            border-radius: 16px;
            padding: 20px;
        }

        .detail-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 13px;
        }

        .detail-table th {
            background-color: #e0e7ff;
            color: #373642;
            padding: 10px 16px;
            text-align: left;
            font-weight: 600;
        }

        .detail-table td {
            padding: 12px 16px;
            color: #334155;
            border-bottom: 1px solid #cbd5e1;
        }

        .detail-table td.center {
            text-align: center;
            font-weight: 600;
        }

    </style>
</head>

<body>


    <aside class="sidebar">

        <div class="sidebar-header">

            <div class="brand-logo">
                <img src="{{ asset('images/rtmlogo.png') }}" alt="RTM Logo">
                <span class="brand-name">iMohon</span>
            </div>

            <i class="fa-solid fa-angles-left"
               id="toggleSidebar"
               style="cursor:pointer; opacity:.8; font-size:18px;">
            </i>

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


    <div class="main-wrapper">
        <header class="top-header">
            <div class="user-profile">
                <span>
                    Admin
                </span>
                <div class="user-avatar">
                    <i class="fa-solid fa-user"></i>
                </div>
</div>
        </header>
        <main class="content-body">
            <h1 class="page-title">
                Rekod vendor
            </h1>

            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-icon bg-purple-light">
                        <i class="fa-solid fa-store"></i>
                    </div>
                    <div class="stat-info">

                        <span class="title">
                            Jumlah vendor
                        </span>
                        <span class="value">
                            {{ $jumlahVendor }}
                        </span>
                    </div>
                </div>

                <div class="stat-card">
                    <div class="stat-icon bg-pink-light">
                        <i class="fa-solid fa-file-signature"></i>
                    </div>
                    <div class="stat-info">
                        <span class="title">
                            Jumlah kontrak
                        </span>
                        <span class="value">
                            {{ $jumlahKontrak }}
                        </span>
                    </div>
                </div>

                <div class="stat-card">
                    <div class="stat-icon bg-green-light">
                        <i class="fa-solid fa-box-archive"></i>
                    </div>
                    <div class="stat-info">
                        <span class="title">
                            Jumlah item
                        </span>
                        <span class="value">
                             {{ number_format($jumlahItem ?? 0) }}
                        </span>
                    </div>
                </div>
            </div>

            <div class="action-bar">
                <form action="{{ route('admin.vendor') }}"  method="GET"  style="margin:0;">
                    <div class="search-box">
                        <i class="fa-solid fa-magnifying-glass" style="color:#94a3b8;">
                        </i>
                        <input
                            type="text"  name="search"  value="{{ request('search') }}" placeholder="Cari vendor..">
                    </div>
                </form>

                <button
                    type="button" class="btn-add" id="openAddModalBtn">
                    <i class="fa-solid fa-plus"></i>
                    Tambah Vendor
                </button>
            </div>

            <div class="table-card">
                <table class="custom-table">
                    <thead>
                        <tr>
                            <th
                                class="center"
                                style="width:60px;"
                            >    No
                            </th>
                            <th style="width:30%;">
                                Vendor
                            </th>

                            <th>
                                No. Kontrak
                            </th>
                            <th class="center">
                                Jumlah Peralatan
                            </th>
                            <th
                                class="center"
                                style="width:100px;"
                            >  Butiran
                            </th>
                        </tr>
                    </thead>
                    <tbody>   

                        @forelse($vendors as $vendor)
                            <tr>
                                <td class="center">
                                    {{ $loop->iteration }}
                                </td>
                                <td style="font-weight:600;">
                                    {{ $vendor->nama_vendor }}
                                </td>
                                <td>
                                    {{ $vendor->no_kontrak }}
                                </td>
                                <td
                                    class="center"
                                    style="font-weight:bold;"
                                >
                                    {{ $vendor->jumlah_peralatan }}
                                </td>

                                <td class="action-icons center">
            <i class="fa-solid fa-file-lines open-detail-btn" title="Lihat Rekod" data-vendor="{{ json_encode($vendor) }}" ></i>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td
                                    colspan="5" class="center"  style=" padding:30px; color:#94a3b8; font-style:italic;  " >
                                    <i
                                        class="fa-solid fa-folder-open" style=" font-size:24px; margin-bottom:8px; display:block; "
                                    ></i>
                                    Tiada rekod vendor.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </main>
    </div>


    
    <div class="modal" id="detailModal">
    <div class="modal-content modal-vendor-detail">
        <span class="close-btn" id="closeDetailModalBtn" style="position:absolute; right:25px; top:20px;">&times;</span>

        <!-- Nama Vendor -->
        <h2 class="vendor-title" id="detailNamaVendor">-</h2>

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
                        <th style="width:50px;">Bil.</th>
                        <th>Keterangan</th>
                        <th style="text-align:center;">Jumlah Unit Peralatan</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Jumlah Peralatan Di bawah Kontrak Ini</td>
                        <td class="center" id="detailJumlahPeralatan">0</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>




    <div
        class="modal"
        id="addModal"
    >

        <div class="modal-content">
            <div class="modal-header">
                <h3>
                    <i class="fa-solid fa-clipboard-list"></i>
                    Tambah Vendor & Kontrak
                </h3>
            <span
                    class="close-btn"
                    id="closeAddModalBtn"  > &times;
                </span>
            </div>


            <form
                action="{{ route('admin.vendor.store') }}"
                method="POST"  >
                @csrf
                <div class="form-group">

                    <label>
                        Nama Vendor
                    </label>

                    <input
                        type="text" name="nama_vendor" required >
                </div>

                <div
                    style="  display:grid; grid-template-columns:1fr 1fr;  gap:12px;  "  >
                    <div class="form-group">
                        <label>
                            No. Kontrak
                        </label>
                        <input  type="text"  name="no_kontrak"  required  >
                    </div>
                    <div class="form-group">
                        <label>
                            PIC Kontrak
                        </label>

                        <input  type="text" name="pic_kontrak"   >
                    </div>
                </div>

                <div
                    style=" display:grid; grid-template-columns:1fr 1fr; gap:12px; ">
                    <div class="form-group">
                        <label>
                            Pemilik Kontrak
                        </label>
                        <input type="text" name="pemilik_kontrak"   >
                    </div>

                    <div class="form-group">
                        <label>
                            Nilai Kontrak (RM)
                        </label>
                        <input type="number"  step="0.01" name="nilai_kontrak"   >
                    </div>
                </div>

                <div
                    style=" display:grid; grid-template-columns:1fr 1fr; gap:12px; ">
                    <div class="form-group">
                        <label>
                            Tarikh Mula
                        </label>
                        <input  type="date"  name="tarikh_mula" required >
                    </div>

                    <div class="form-group">
                        <label> Tarikh Tamat</label>
                        <input type="date"  name="tarikh_tamat"    required   >
                    </div>
                </div>

                <div class="form-group">
                 <label>   Jumlah Peralatan / Unit </label>
                    <input   type="number"  name="jumlah_peralatan" required   min="0"    >
                </div>

                <button
                    type="submit" class="form-submit" >  Simpan Vendor & Kontrak
                </button>
            </form>
        </div>
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

        // 2. Modal Detail (YANG PERLU DIBETULKAN)
        const detailModal = document.getElementById('detailModal');
        const detailBtns = document.querySelectorAll('.open-detail-btn');
        const closeDetailBtn = document.getElementById('closeDetailModalBtn');

        detailBtns.forEach(function (btn) {
            btn.addEventListener('click', function () {
                // Read data vendor daripada attribute data-vendor pada ikon/butang
                const vendorAttr = this.getAttribute('data-vendor');
                
                if (vendorAttr) {
                    const vendor = JSON.parse(vendorAttr);

                    // Suntik data dari database ke dalam HTML Modal Detail
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

                    // Format Nilai Kontrak RM
                    if (document.getElementById('detailNilaiKontrak')) {
                        const nilaiFormatted = parseFloat(vendor.nilai_kontrak || 0).toLocaleString('ms-MY', { minimumFractionDigits: 2 });
                        document.getElementById('detailNilaiKontrak').innerText = 'RM ' + nilaiFormatted;
                    }

                    // Ambil jumlah peralatan dari borang
                    if (document.getElementById('detailJumlahPeralatan')) 
                        document.getElementById('detailJumlahPeralatan').innerText = vendor.jumlah_peralatan || 0;
                }

                // Paparkan modal
                if (detailModal) detailModal.style.display = 'flex';
            });
        });

        if (closeDetailBtn) {
            closeDetailBtn.addEventListener('click', function () {
                detailModal.style.display = 'none';
            });
        }

        // 3. Modal Tambah Vendor
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

        // 4. Tutup Modal Apabila Klik Di Luar
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