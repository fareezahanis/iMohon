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
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .page-title {
            font-size: 28px;
            font-weight: bold;
            color: #111;
        }
    .page-subtitle {
            font-size: 13px;
            color: #64748b;
        }
        

        /* 3 card */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-bottom: 25px;
            max-width: 700px;
        }

        .stat-card {
            background: white;
            border-radius: 16px;
            padding: 18px 24px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.03);
            display: flex;
            align-items: center;
            gap: 18px;
        }

        .stat-icon {
            width: 45px;
            height: 45px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
        }

        .bg-purple { background-color: #e0e7ff; color: #4338ca; }
        .bg-green { background-color: #dcfce7; color: #15803d; }
        .bg-orange { background-color: #fef3c7; color: #d97706; }

        .stat-info .title {
            font-size: 12px;
            color: #64748b;
            font-weight: 600;
            display: block;
            margin-bottom: 4px;
        }

        .stat-info .value {
            font-size: 24px;
            font-weight: bold;
            color: #1e293b;
        }

        /* search bar & button add */
       
        .action-bar {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 25px;
        }

        .search-box {
            background: white;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            padding: 2px 12px;
            width: 100%;
            max-width: 400px;
            display: flex;
            align-items: center;
            gap: 14px;
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
            text-decoration: none;
            font-weight: 600;
            font-size: 13px;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            border: none;
            cursor: pointer;
            transition: background 0.2s;
            height: 37px; 
            white-space: nowrap;
        }

        .btn-add:hover {
            background-color: #2b12a3;
        }

        /* inventori table */
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

        .action-icons i {
            cursor: pointer;
            margin: 0 6px;
            font-size: 16px;
            color: #475569;
            transition: color 0.2s;
        }

        .action-icons i:hover {
            color: #1e0b75;
        }

        .action-icons i.delete-btn:hover {
            color: #ef4444;
        }

        /* popup tambah alatan */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            align-items: center;
            justify-content: center;
        }

        .modal-content {
            background-color: white;
            border-radius: 16px;
            padding: 30px;
            width: 100%;
            max-width: 500px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
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

        .form-group input, .form-group select {
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
    </style>
</head>
<body>

    <!-- sidebar -->
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

    <!-- content right -->
    <div class="main-wrapper">

        <!-- TOP HEADER -->
        <header class="top-header">
            <div class="user-profile">
                <span>{{ Auth::user()->name ?? 'Admin' }}</span>
                <div class="user-avatar">
                    <i class="fa-solid fa-user"></i>
                </div>
            </div>
        </header>

        <!-- CONTENT BODY -->
        <main class="content-body">

          
                <h1 style="font-size: 28px; font-weight: bold; color: #0f172a; margin-bottom: 25px;">
    Inventori Peralatan
</h1>
               
            
            

         <!-- SEARCH BAR & BUTTON ADD (GAYA SERVER-SIDE SEARCH) -->
<div class="action-bar" style="display: flex; justify-content: flex-start; align-items: center; gap: 12px; margin-top: 20px; margin-bottom: 25px;">
    
    <!-- Form Search -->
    <form action="{{ route('admin.inventori') }}" method="GET" style="width: 350px; display: flex; align-items: center; margin: 0;">
        <div class="search-box" style="width: 100%;">
            <i class="fa-solid fa-magnifying-glass" style="color: #94a3b8;"></i>
            <!-- Nilai carian dikekalkan menggunakan value="{{ request('search') }}" -->
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari peralatan.." style="width: 100%; border: none; outline: none;">
        </div>

        <!-- Butang tersembunyi supaya tekan Enter boleh hantar form -->
        <button type="submit" style="display: none;"></button>
    </form>

    <!-- Butang Tambah Peralatan -->
    <button type="button" class="btn-add" id="openModalBtn">
        <i class="fa-solid fa-plus"></i> Tambah Peralatan
    </button>

</div>

 <div class="table-card" style="background: white; border-radius: 16px; padding: 25px; box-shadow: 0 4px 20px rgba(0, 0, 0, 0.04);">
    <table class="custom-table" style="width: 100%; border-collapse: collapse; font-size: 13px;">
        <thead>
            <tr style="background-color: #e0e7ff; color: #3730a3;">
                <th style="padding: 12px 14px; text-align: center; font-weight: 600; width: 50px;">No.</th>
                <th style="padding: 12px 14px; text-align: left; font-weight: 600;">Nama peralatan</th>
                <th style="padding: 12px 14px; text-align: center; font-weight: 600;">Kategori</th>
                <th style="padding: 12px 14px; text-align: center; font-weight: 600;">Jumlah</th>
                <th style="padding: 12px 14px; text-align: center; font-weight: 600;">Tersedia</th>
                <th style="padding: 12px 14px; text-align: center; font-weight: 600;">Diagih</th>
                <th style="padding: 12px 14px; text-align: center; font-weight: 600; width: 100px;">Butiran</th>
            </tr>
        </thead>
        <tbody>
            @forelse($inventori as $index => $item)
                <tr style="border-bottom: 1px solid #f1f5f9;">
                    <td style="padding: 14px; text-align: center; color: #334155;">{{ $loop->iteration }}</td>
                    <td style="padding: 14px; font-weight: 600; color: #0f172a;">{{ $item->nama_peralatan }}</td>
                    <td style="padding: 14px; text-align: center; color: #475569;">{{ $item->kategori }}</td>
                    <td style="padding: 14px; text-align: center; font-weight: bold; color: #0f172a;">{{ $item->jumlah }}</td>
                    <td style="padding: 14px; text-align: center; font-weight: bold; color: #262d29;">{{ $item->tersedia }}</td>
                    <td style="padding: 14px; text-align: center; font-weight: bold; color: #322f2b;">{{ $item->diagih }}</td>
                    <td style="padding: 14px; text-align: center;" class="action-icons">
                        <!-- Icon Mata / View -->
                        <i class="fa-solid fa-eye btn-view-kontrak" 
   style="cursor: pointer; font-size: 16px; color: #0f172a; margin-right: 10px;" 
   title="Lihat Kontrak & Vendor"
   data-kontrak="{{ json_encode($item->vendors->map(function($v) {
       return [
           'no_kontrak'  => $v->no_kontrak ?? '-',
           'vendor'      => $v->nama_vendor ?? '-',
           'tarikh'      => $v->created_at ? $v->created_at->format('d/m/Y') : '-',
           'jumlah_unit' => $v->pivot->jumlah_unit ?? 0
       ];
   })) }}">
</i>

                        <!-- Form Padam -->
                        <form action="{{ route('admin.inventori.destroy', $item->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Adakah anda pasti ingin memadam peralatan ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="background: none; border: none; padding: 0; cursor: pointer;">
                                <i class="fa-solid fa-trash-can" style="font-size: 16px; color: #131111;" title="Padam"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" style="padding: 20px; text-align: center; color: #64748b;">
                        Tiada rekod peralatan dijumpai.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

</main>
</div>

<!-- popup kontrak & vendor -->
<div class="modal" id="modalKontrakVendor" style="display: none; position: fixed; top: 0; left: 0; right: 0; bottom: 0; width: 100vw; height: 100vh; background: rgba(0, 0, 0, 0.5); justify-content: center; align-items: center; z-index: 99999;">
    
    <div style="background: white; border-radius: 16px; width: 90%; max-width: 750px; padding: 30px; position: relative; margin: auto; box-shadow: 0 20px 25px -5px rgba(0,0,0,0.1);">
        
       
        <span id="closeKontrakModalBtn" style="position: absolute; right: 25px; top: 20px; cursor: pointer; font-size: 22px; color: #94a3b8;"><i class="fa-solid fa-xmark"></i></span>

        <!-- Tajuk Utama & Subtajuk -->
        <div style="display: flex; align-items: flex-start; gap: 12px; margin-bottom: 20px;">
            <div style="background: #1e0b75; color: white; padding: 10px 12px; border-radius: 10px; font-size: 18px; display: flex; align-items: center; justify-content: center;">
                <i class="fa-solid fa-clipboard-list"></i>
            </div>
            <div>
                <h2 style="font-size: 20px; font-weight: bold; color: #0f172a; margin: 0;">Kontrak & vendor</h2>
                <p style="font-size: 13px; color: #94a3b8; margin: 3px 0 0 0;">Jumlah unit bagi setiap kontrak</p>
            </div>
        </div>

        <!-- jadual kontrak & vendor -->
        <div style="overflow-x: auto; margin-top: 15px;">
            <table style="width: 100%; border-collapse: collapse; font-size: 13px; text-align: left;">
                <thead>
                    <tr style="background: #eef2ff; color: #334155;">
                        <th style="padding: 12px 15px; width: 50px;">No.</th>
                        <th style="padding: 12px 15px;">No. Kontrak</th>
                        <th style="padding: 12px 15px;">Vendor</th>
                        <th style="padding: 12px 15px; text-align: center;">Jumlah unit</th>
                    </tr>
                </thead>
                <tbody id="tblBodyKontrak">
                    <!-- Baris rekod kontrak dipaparkan secara dinamik -->
                </tbody>
            </table>
        </div>

    </div>
</div>



  <!-- Popup Tambah Peralatan -->
<div class="modal" id="addModal" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.5); justify-content: center; align-items: center; z-index: 9999; box-sizing: border-box;">
    <div style="background: white; border-radius: 16px; width: 100%; max-width: 600px; padding: 25px; position: relative; max-height: 90vh; overflow-y: auto; box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1); box-sizing: border-box; margin: 20px;">
        
        <!-- Header Modal -->
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
            <h2 style="font-size: 18px; font-weight: bold; color: #1e0b75; margin: 0;">
                <i class="fa-solid fa-boxes-packing" style="margin-right: 8px;"></i> Tambah Peralatan
            </h2>
            <span id="closeModalBtn" style="cursor: pointer; font-size: 24px; color: #94a3b8; font-weight: bold; line-height: 1;">&times;</span>
        </div>

        <!-- Borang Tambah Peralatan -->
        <form action="{{ route('admin.inventori.store') }}" method="POST">
            @csrf

            <!-- 1. Nama Peralatan -->
            <div style="margin-bottom: 15px;">
                <label style="display: block; font-size: 12px; font-weight: 600; color: #475569; margin-bottom: 5px;">Nama Peralatan</label>
                <input type="text" name="nama_peralatan" required 
                       style="width: 100%; padding: 10px 12px; border: 1px solid #cbd5e1; border-radius: 8px; font-size: 13px; box-sizing: border-box;">
            </div>

            <!-- 2. Kategori -->
            <div style="margin-bottom: 15px;">
                <label style="display: block; font-size: 12px; font-weight: 600; color: #475569; margin-bottom: 5px;">Kategori</label>
                <select name="kategori" required style="width: 100%; padding: 10px 12px; border: 1px solid #cbd5e1; border-radius: 8px; font-size: 13px; background: white; box-sizing: border-box; outline: none;">
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

            <!-- 3. Kontrak & Vendor (Dynamic Dynamic Inputs) -->
            <div style="margin-bottom: 15px; background: #f8fafc; padding: 12px; border-radius: 8px; border: 1px solid #e2e8f0; box-sizing: border-box;">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 10px;">
                    <label style="font-size: 12px; font-weight: 600; color: #475569;">No. Kontrak, Vendor, Unit & Tarikh</label>
                    <button type="button" id="btn-tambah-vendor" style="background: #3730a3; color: white; border: none; padding: 5px 10px; border-radius: 6px; font-size: 11px; cursor: pointer; display: flex; align-items: center; gap: 4px;">
                        <i class="fa-solid fa-plus"></i> Tambah Vendor
                    </button>
                </div>

                <div id="vendor-wrapper">
                    <div class="vendor-row" style="display: flex; gap: 6px; margin-bottom: 8px; align-items: center;">
                        <select name="vendors[0][id]" required style="flex: 2; padding: 8px 10px; border: 1px solid #cbd5e1; border-radius: 8px; font-size: 12px; background: white; box-sizing: border-box;">
                            <option value="">-- Pilih Vendor --</option>
                            @foreach($vendors as $vendor)
                                <option value="{{ $vendor->id }}">{{ $vendor->no_kontrak }} - {{ $vendor->nama_vendor }}</option>
                            @endforeach
                        </select>
                        
                        <input type="number" name="vendors[0][jumlah_unit]" placeholder="Unit" min="1" required style="width: 65px; padding: 8px; border: 1px solid #cbd5e1; border-radius: 8px; font-size: 12px; box-sizing: border-box;">

                        <button type="button" class="btn-remove-vendor" style="background: #ef4444; color: white; border: none; width: 32px; height: 32px; border-radius: 8px; cursor: pointer; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                            <i class="fa-solid fa-xmark"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- 4. Kuantiti Keseluruhan -->
            <div style="margin-bottom: 15px;">
                <label style="display: block; font-size: 12px; font-weight: 600; color: #475569; margin-bottom: 5px;">Jumlah Kuantiti</label>
                <input type="number" name="jumlah" min="1" required 
                       style="width: 100%; padding: 10px 12px; border: 1px solid #cbd5e1; border-radius: 8px; font-size: 13px; box-sizing: border-box;">
            </div>

            <!-- 5. Status Agihan -->
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 12px; margin-bottom: 20px;">
                <div>
                    <label style="display: block; font-size: 12px; font-weight: 600; color: #475569; margin-bottom: 5px;">Kuantiti Tersedia</label>
                    <input type="number" name="tersedia" min="0" required
                           style="width: 100%; padding: 10px 12px; border: 1px solid #cbd5e1; border-radius: 8px; font-size: 13px; box-sizing: border-box;">
                </div>
                <div>
                    <label style="display: block; font-size: 12px; font-weight: 600; color: #475569; margin-bottom: 5px;">Kuantiti Diagih</label>
                    <input type="number" name="diagih" min="0" required
                           style="width: 100%; padding: 10px 12px; border: 1px solid #cbd5e1; border-radius: 8px; font-size: 13px; box-sizing: border-box;">
                </div>
            </div>

            <!-- Butang Hantar -->
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
                if (sidebar.classList.contains('collapsed')) {
                    toggleBtn.style.transform = 'rotate(180deg)';
                } else {
                    toggleBtn.style.transform = 'rotate(0deg)';
                }
            });
        }

        
        const modal = document.getElementById('addModal');
        const openBtn = document.getElementById('openModalBtn');
        const closeBtn = document.getElementById('closeModalBtn');

        if (openBtn && modal) {
            openBtn.onclick = () => modal.style.display = 'flex';
        }
        if (closeBtn && modal) {
            closeBtn.onclick = () => modal.style.display = 'none';
        }

        
        const modalKontrak = document.getElementById('modalKontrakVendor');
        const closeKontrakBtn = document.getElementById('closeKontrakModalBtn');
        const btnsViewKontrak = document.querySelectorAll('.btn-view-kontrak');

        btnsViewKontrak.forEach(button => {
            button.addEventListener('click', function () {
                const tbody = document.getElementById('tblBodyKontrak');
                if (tbody) {
                    tbody.innerHTML = ''; // Kosongkan jadual lama

                    try {
                        const rawKontrak = this.getAttribute('data-kontrak');
                        const senaraiKontrak = rawKontrak ? JSON.parse(rawKontrak) : [];

                        if (senaraiKontrak.length > 0) {
                            senaraiKontrak.forEach((k, index) => {
                                const row = `
                                    <tr style="border-bottom: 1px solid #f1f5f9;">
                                        <td style="padding: 12px 15px; color: #0f172a;">${index + 1}</td>
                                        <td style="padding: 12px 15px; font-weight: 600; color: #0f172a;">${k.no_kontrak || '-'}</td>
                                        <td style="padding: 12px 15px; color: #334155;">${k.vendor || '-'}</td>
                                        <td style="padding: 12px 15px; text-align: center; font-weight: 600; color: #0f172a;">${k.jumlah_unit || 0}</td>
                                    </tr>
                                `;
                                tbody.insertAdjacentHTML('beforeend', row);
                            });
                        } else {
                            tbody.innerHTML = `
                                <tr>
                                    <td colspan="5" style="padding: 20px; text-align: center; color: #94a3b8; font-style: italic;">
                                        Tiada rekod kontrak & vendor dijumpai.
                                    </td>
                                </tr>
                            `;
                        }
                    } catch (e) {
                        console.error("Ralat ", e);
                    }
                }

                if (modalKontrak) modalKontrak.style.display = 'flex';
            });
        });

        if (closeKontrakBtn && modalKontrak) {
            closeKontrakBtn.onclick = () => modalKontrak.style.display = 'none';
        }

       
        window.addEventListener('click', function (e) {
            if (modal && e.target === modal) modal.style.display = 'none';
            if (modalKontrak && e.target === modalKontrak) modalKontrak.style.display = 'none';
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

        const vendorWrapper = document.getElementById('vendor-wrapper');
        const btnTambahVendor = document.getElementById('btn-tambah-vendor');

        if (btnTambahVendor && vendorWrapper) {
            // Aksi Klik Butang "+ Tambah Vendor"
            btnTambahVendor.addEventListener('click', function () {
                const firstRow = vendorWrapper.querySelector('.vendor-row');
                if (firstRow) {
                    const newRow = firstRow.cloneNode(true);
                    
                    // Reset pilihan dropdown pada baris baharu
                    const selectElem = newRow.querySelector('select');
                    if (selectElem) selectElem.value = "";

                    vendorWrapper.appendChild(newRow);
                }
            });

            
            vendorWrapper.addEventListener('click', function (e) {
                if (e.target.closest('.btn-remove-vendor')) {
                    const rows = vendorWrapper.querySelectorAll('.vendor-row');
                    if (rows.length > 1) {
                        e.target.closest('.vendor-row').remove();
                    } else {
                        alert('Sekurang-kurangnya satu pilihan vendor diperlukan.');
                    }
                }
            });
        }
    });
</script>
</body>
</html>