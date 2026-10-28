<!DOCTYPE html>
<html lang="ms">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rekod Peminjaman - iMohon</title>

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
        .logout-btn {
            background: none;
            border: none;
            width: 100%;
            cursor: pointer;
            text-align: left;
            font-family: inherit;
        }

        
        .sidebar.collapsed {
            width: 80px ;
            padding: 25px 10px;
        }

        .sidebar.collapsed .brand-name,
        .sidebar.collapsed .nav-link span {
            display: none ;
        }

        .sidebar.collapsed .nav-link {
            justify-content: center;
            padding: 12px 0;
        }

        .sidebar.collapsed .sidebar-header {
            justify-content: center;
            margin-bottom: 30px;
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

        /* FILTER BAR & SEARCH */
        .filter-bar {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 20px;
            flex-wrap: wrap;
        }

       .search-box {
            background: white;
            border: 1px solid #cbd5e1;
            border-radius: 10px;
            padding: 2px 12px;
            flex: 1;
            min-width: 400px;
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


        .filter-select {
            background: white;
            border: 1px solid #cbd5e1;
            border-radius: 10px;
            padding: 8px 12px;
            font-size: 13px;
            color: #334155;
            outline: none;
        }

        .date-picker-group {
            display: flex;
            align-items: center;
            gap: 8px;
            background: white;
            border: 1px solid #cbd5e1;
            border-radius: 10px;
            padding: 6px 12px;
            font-size: 12px;
            color: #64748b;
        }

        .date-picker-group input {
            border: none;
            outline: none;
            font-size: 12px;
            color: #334155;
            width: 110px;
        }

        .btn-reset {
            background: white;
            border: 1px solid #cbd5e1;
            color: #475569;
            padding: 8px 14px;
            border-radius: 10px;
            font-size: 12px;
            font-weight: 600;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        /* TABLE CARD */
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
            font-size: 15px;
            color: #1e0b75;
            transition: color 0.2s;
        }

        .action-icons i:hover {
            color: #2e10b3;
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
            <li><a href="{{ route('admin.dashboard') }}" class="nav-link">
                <i class="fa-solid fa-house"></i><span>Laman utama</span></a></li>
            <li><a href="{{ route('admin.inventori') }}" class="nav-link">
                <i class="fa-solid fa-boxes-stacked"></i><span>Inventori</span></a></li>
            <li><a href="{{ route('admin.vendor') }}" class="nav-link">
                <i class="fa-solid fa-clipboard-list"></i><span>Vendor</span></a></li>
            <li><a href="#" class="nav-link active">
                <i class="fa-solid fa-pen-to-square"></i><span>Rekod Penempatan</span></a></li>
                <li><a href="{{ route('admin.pengguna') }}" class="nav-link">
                <i class="fa-solid fa-users"></i><span>Pengguna</span></a></li>
            
            <li><a href="{{ route('admin.kelulusan') }}" class="nav-link">
                <i class="fa-solid fa-circle-check"></i><span>Permohonan Baru</span></a></li>    
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
                <span>Admin</span>
                <div class="user-avatar"><i class="fa-solid fa-user"></i></div>
            </div>
        </header>

        <!-- CONTENT BODY -->
        <main class="content-body">

            <div class="page-header">
                <h1 class="page-title">Rekod Penempatan</h1>
                <p class="page-subtitle">Senarai peralatan yang telah dipinjam atau diagihkan kepada pengguna.</p>
            </div>

            <!-- FILTER BAR & CARIAN -->
           <form action="{{ route('admin.peminjaman') }}" method="GET" class="filter-bar">
        <div class="search-box">
            <i class="fa-solid fa-magnifying-glass" style="color: #94a3b8;"></i>
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama pemohon, peralatan, no. siri...">
        </div>

        <select name="status" class="filter-select" onchange="this.form.submit()">
            <option value="">Semua status</option>
            <option value="Dipinjam" {{ request('status') == 'Dipinjam' ? 'selected' : '' }}>Diagih</option>
            <option value="Telah Dikembalikan" {{ request('status') == 'Telah Dikembalikan' ? 'selected' : '' }}>Telah Dikembalikan</option>
        </select>

        <select name="kategori" class="filter-select" onchange="this.form.submit()">
            <option value="">Semua kategori</option>
            <option value="Laptop" {{ request('kategori') == 'Laptop' ? 'selected' : '' }}>Laptop</option>
            <option value="Monitor" {{ request('kategori') == 'Monitor' ? 'selected' : '' }}>Monitor</option>
            <option value="Projektor" {{ request('kategori') == 'Projektor' ? 'selected' : '' }}>Projektor</option>
        </select>

        <button type="submit" style="display: none;"></button> <!-- Auto submit bila tekan Enter -->

        <a href="{{ route('admin.peminjaman') }}" class="btn-reset" style="text-decoration: none;">
            <i class="fa-solid fa-rotate-left"></i> Set Semula
        </a>
    </form>

            <!-- table record penempatan -->
<div class="table-card" style="background: white; border-radius: 16px; padding: 25px; box-shadow: 0 4px 20px rgba(0, 0, 0, 0.04);">
    <table class="custom-table" style="width: 100%; border-collapse: collapse; font-size: 13px;">
        <thead>
            <tr style="background-color: #e0e7ff; color: #3730a3;">
                <th style="padding: 12px 14px; text-align: center; font-weight: 600; width: 50px;">No.</th>
                <th style="padding: 12px 14px; text-align: left; font-weight: 600;">Nama Pemohon</th>
                <th style="padding: 12px 14px; text-align: left; font-weight: 600;">Peralatan / Jenama</th>
                <th style="padding: 12px 14px; text-align: center; font-weight: 600;">Status</th>
                <th style="padding: 12px 14px; text-align: center; font-weight: 600; width: 80px;">Butiran</th>
            </tr>
        </thead>
        <tbody>
            @forelse($peminjaman ?? [] as $index => $item)
                <tr style="border-bottom: 1px solid #f1f5f9;">
                    <td style="padding: 14px; text-align: center; color: #334155;">{{ $index + 1 }}</td>
                    <td style="padding: 14px; font-weight: 600; color: #0f172a;">{{ $item->user?->name ?? $item->nama_pemohon }}</td>
                    <td style="padding: 14px; color: #334155;">{{ $item->nama_peralatan }}</td>
                    <td style="padding: 14px; text-align: center;">
                        @if(strtolower($item->status ?? 'diagih') == 'dipulangkan')
                            <span style="background: #dcfce7; color: #166534; padding: 4px 10px; border-radius: 20px; font-weight: 600; font-size: 11px;">Dipulangkan</span>
                        @else
                            <span style="background: #e0f2fe; color: #0369a1; padding: 4px 10px; border-radius: 20px; font-weight: 600; font-size: 11px;">Diagih</span>
                        @endif
                    </td>
                    <td style="padding: 14px; text-align: center;">
                        <i class="fa-solid fa-eye btn-view-penempatan" 
                           style="cursor: pointer; font-size: 16px; color: #1e0b75;" 
                           title="Lihat Butiran Penuh"
                           data-pemohon="{{ $item->user?->name ?? $item->nama_pemohon }}"
                           data-jenama="{{ $item->nama_peralatan }}"
                           data-kategori="{{ $item->kategori ?? 'Laptop' }}"
                           data-nosiri="{{ $item->no_siri ?? '-' }}"
                           data-lokasi="{{ $item->lokasi ?? '-' }}"
                           data-agihan="{{ $item->created_at ? \Carbon\Carbon::parse($item->created_at)->format('d/m/Y') : '-' }}"
                           data-pulang="{{ $item->tarikh_pulang ? \Carbon\Carbon::parse($item->tarikh_pulang)->format('d/m/Y') : '-' }}"
                           data-status="{{ $item->status ?? 'Diagih' }}">
                        </i>
                    </td>
                </tr>
            @empty
                <!-- dummy data -->
                <tr style="border-bottom: 1px solid #f1f5f9;">
                    <td style="padding: 14px; text-align: center;">1</td>
                    <td style="padding: 14px; font-weight: 600; color: #0f172a;">Ali bin Rahman</td>
                    <td style="padding: 14px; color: #334155;">Laptop Dell Latitude 5420</td>
                    <td style="padding: 14px; text-align: center;">
                        <span style="background: #e0f2fe; color: #0369a1; padding: 4px 10px; border-radius: 20px; font-weight: 600; font-size: 11px;">Diagih</span>
                    </td>
                    <td style="padding: 14px; text-align: center;">
                        <i class="fa-solid fa-eye btn-view-penempatan" 
                           style="cursor: pointer; font-size: 16px; color: #1e0b75;"
                           data-pemohon="Ali bin Rahman"
                           data-jenama="Laptop Dell Latitude 5420"
                           data-kategori="Laptop"
                           data-nosiri="DL-001"
                           data-lokasi="STM"
                           data-agihan="10/08/2026"
                           data-pulang="-"
                           data-status="Diagih">
                        </i>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

        </main>
    </div>
    <!-- POPUP MODAL BUTIRAN LENGKAP -->
<div class="modal" id="modalButiranPenempatan" style="display: none; position: fixed; top: 0; left: 0; right: 0; bottom: 0; width: 100vw; height: 100vh; background: rgba(0, 0, 0, 0.5); justify-content: center; align-items: center; z-index: 99999;">
    
    <div style="background: white; border-radius: 16px; width: 90%; max-width: 600px; padding: 30px; position: relative; box-shadow: 0 20px 25px -5px rgba(0,0,0,0.1);">
        
        <!-- Butang Tutup (X) -->
        <span id="closePenempatanBtn" style="position: absolute; right: 25px; top: 20px; cursor: pointer; font-size: 22px; color: #94a3b8;"><i class="fa-solid fa-xmark"></i></span>

        <!-- Tajuk -->
        <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 20px;">
            <div style="background: #1e0b75; color: white; padding: 10px 12px; border-radius: 10px; font-size: 18px;">
                <i class="fa-solid fa-circle-info"></i>
            </div>
            <div>
                <h2 style="font-size: 18px; font-weight: bold; color: #0f172a; margin: 0;">Butiran Penempatan Peralatan</h2>
                <p style="font-size: 12px; color: #94a3b8; margin: 2px 0 0 0;">Maklumat penuh penempatan aset pengguna</p>
            </div>
        </div>

        <!-- Grid Butiran (Sini tempat kumpul semua info yang dibuang dari jadual utama) -->
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px; background: #f8fafc; padding: 20px; border-radius: 12px; font-size: 13px;">
            <div>
                <span style="color: #64748b; font-weight: 500; display: block; font-size: 11px; text-transform: uppercase;">Nama Pemohon</span>
                <strong id="detNama" style="color: #0f172a; font-size: 14px;">-</strong>
            </div>
            <div>
                <span style="color: #64748b; font-weight: 500; display: block; font-size: 11px; text-transform: uppercase;">Jenama / Peralatan</span>
                <strong id="detJenama" style="color: #0f172a; font-size: 14px;">-</strong>
            </div>
            <div>
                <span style="color: #64748b; font-weight: 500; display: block; font-size: 11px; text-transform: uppercase;">Kategori</span>
                <strong id="detKategori" style="color: #0f172a; font-size: 14px;">-</strong>
            </div>
            <div>
                <span style="color: #64748b; font-weight: 500; display: block; font-size: 11px; text-transform: uppercase;">No. Siri</span>
                <span id="detNoSiri" style="background: #e2e8f0; padding: 2px 8px; border-radius: 4px; font-weight: 600; font-size: 12px; color: #101010;">-</span>
            </div>
            <div>
                <span style="color: #64748b; font-weight: 500; display: block; font-size: 11px; text-transform: uppercase;">Lokasi Penempatan</span>
                <strong id="detLokasi" style="color: #090909;">-</strong>
            </div>
            <div>
                <span style="color: #64748b; font-weight: 500; display: block; font-size: 11px; text-transform: uppercase;">Status</span>
                <strong id="detStatus" style="font-weight: 600;">-</strong>
            </div>
            <div>
                <span style="color: #64748b; font-weight: 500; display: block; font-size: 11px; text-transform: uppercase;">Tarikh Agihan</span>
                <strong id="detTarikhAgihan" style="color: #334155;">-</strong>
            </div>
            <div>
                <span style="color: #64748b; font-weight: 500; display: block; font-size: 11px; text-transform: uppercase;">Tarikh Pulang</span>
                <strong id="detTarikhPulang" style="color: #334155;">-</strong>
            </div>
        </div>

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

        // 2. Search Bar Filter
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

                    if (textContent.includes(query)) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                });
            });
        }

        // 3. Modal Butiran Penempatan (Ikon Mata)
        const modal = document.getElementById('modalButiranPenempatan');
        const closeBtn = document.getElementById('closePenempatanBtn');
        const btnsView = document.querySelectorAll('.btn-view-penempatan');

        btnsView.forEach(btn => {
            btn.addEventListener('click', function () {
                document.getElementById('detNama').innerText = this.getAttribute('data-pemohon') || '-';
                document.getElementById('detJenama').innerText = this.getAttribute('data-jenama') || '-';
                document.getElementById('detKategori').innerText = this.getAttribute('data-kategori') || '-';
                document.getElementById('detNoSiri').innerText = this.getAttribute('data-nosiri') || '-';
                document.getElementById('detLokasi').innerText = this.getAttribute('data-lokasi') || '-';
                document.getElementById('detTarikhAgihan').innerText = this.getAttribute('data-agihan') || '-';
                document.getElementById('detTarikhPulang').innerText = this.getAttribute('data-pulang') || '-';

                const status = this.getAttribute('data-status') || '-';
                document.getElementById('detStatus').innerText = status;

                if (modal) modal.style.display = 'flex';
            });
        });

        if (closeBtn && modal) {
            closeBtn.onclick = () => modal.style.display = 'none';
        }

        window.addEventListener('click', function (e) {
            if (modal && e.target === modal) {
                modal.style.display = 'none';
            }
        });
    });
</script>

</body>
</html>