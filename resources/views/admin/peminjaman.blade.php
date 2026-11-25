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

        .filter-select {
            background: white;
            border: 1px solid #cbd5e1;
            border-radius: 10px;
            padding: 0 14px;
            height: 40px;
            font-size: 13px;
            color: #334155;
            font-weight: 500;
            outline: none;
            cursor: pointer;
        }

        .filter-select:focus {
            border-color: #29158f;
        }

        .btn-reset {
            background: white;
            border: 1px solid #cbd5e1;
            color: #475569;
            padding: 0 14px;
            height: 40px;
            border-radius: 10px;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            text-decoration: none;
            transition: all 0.2s;
        }

        .btn-reset:hover {
            background: #f8fafc;
            border-color: #94a3b8;
            color: #0f172a;
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

        
        .id-badge {
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

        .status-pill {
            padding: 5px 12px;
            border-radius: 20px;
            font-weight: 600;
            font-size: 11px;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .pill-selesai  { background: #dcfce7; color: #166534; }
        .pill-hantar   { background: #fef3c7; color: #92400e; }
        .pill-diagih   { background: #e0f2fe; color: #0369a1; }
        .pill-terima   { background: #e0e7ff; color: #3730a3; }

        .btn-icon-soft {
            width: 34px;
            height: 34px;
            border-radius: 9px;
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

        
        .modal {
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
                <a href="{{ route('admin.peminjaman') }}" class="nav-link active">
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

        @include('partials.top-header')

        <!-- CONTENT BODY -->
        <main class="content-body">

            <h1 class="page-title">Rekod Penempatan</h1>
            <p class="page-subtitle">Senarai peralatan yang telah dipinjam atau diagihkan kepada pengguna serta status penghantaran</p>

            @php
                $koleksi = collect($peminjaman ?? []);
                $totalPenempatan = $koleksi->count();
                $bilDiagih = $koleksi->filter(fn($r) => in_array(strtolower($r->status_penempatan ?? ''), ['diagih', 'pengagihan']))->count();
                $bilDihantar = $koleksi->filter(fn($r) => in_array(strtolower($r->status_penempatan ?? ''), ['dihantar', 'penghantaran']))->count();
                $bilSelesai = $koleksi->filter(fn($r) => in_array(strtolower($r->status_penempatan ?? ''), ['selesai', 'penerimaan', 'diterima', 'diterima pemohon']))->count();
            @endphp

            
            <div class="stats-grid">
                <div class="stat-card" style="border-left-color: #29158f;">
                    <div class="stat-icon" style="background: #eef2ff; color: #29158f;">
                        <i class="fa-solid fa-clipboard-check"></i>
                    </div>
                    <div class="stat-info">
                        <span class="title">Jumlah Penempatan</span>
                        <span class="value">{{ number_format($totalPenempatan) }}</span>
                    </div>
                </div>

                <div class="stat-card" style="border-left-color: #0284c7;">
                    <div class="stat-icon" style="background: #e0f2fe; color: #0284c7;">
                        <i class="fa-solid fa-boxes-packing"></i>
                    </div>
                    <div class="stat-info">
                        <span class="title">Diagih</span>
                        <span class="value" style="color: #0284c7;">{{ number_format($bilDiagih) }}</span>
                    </div>
                </div>

                <div class="stat-card" style="border-left-color: #f59e0b;">
                    <div class="stat-icon" style="background: #fef3c7; color: #d97706;">
                        <i class="fa-solid fa-truck"></i>
                    </div>
                    <div class="stat-info">
                        <span class="title">Dalam Penghantaran</span>
                        <span class="value" style="color: #d97706;">{{ number_format($bilDihantar) }}</span>
                    </div>
                </div>

                <div class="stat-card" style="border-left-color: #10b981;">
                    <div class="stat-icon" style="background: #ecfdf5; color: #10b981;">
                        <i class="fa-solid fa-circle-check"></i>
                    </div>
                    <div class="stat-info">
                        <span class="title">Penerimaan / Selesai</span>
                        <span class="value" style="color: #10b981;">{{ number_format($bilSelesai) }}</span>
                    </div>
                </div>
            </div>

            
            <form action="{{ route('admin.peminjaman') }}" method="GET" class="filter-bar">
                <div class="search-box">
                    <i class="fa-solid fa-magnifying-glass" style="color: #94a3b8;"></i>
                    <input type="text" id="liveSearchPenempatan" name="search" value="{{ request('search') }}" placeholder="Cari ID, nama pemohon, peralatan, no. siri...">
                </div>

                <select name="status" class="filter-select" onchange="this.form.submit()">
                    <option value="">Semua status</option>
                    <option value="Diagih" {{ request('status') == 'Diagih' ? 'selected' : '' }}>Diagih</option>
                    <option value="Dihantar" {{ request('status') == 'Dihantar' ? 'selected' : '' }}>Dihantar</option>
                    <option value="Diterima" {{ request('status') == 'Diterima' ? 'selected' : '' }}>Diterima</option>
                </select>

                <select name="kategori" class="filter-select" onchange="this.form.submit()">
                    <option value="">Semua kategori</option>
                    <option value="Notebook Highend" {{ request('kategori') == 'Notebook Highend' ? 'selected' : '' }}>Notebook Highend</option>
                    <option value="Notebook" {{ request('kategori') == 'Notebook' ? 'selected' : '' }}>Notebook</option>
                    <option value="PC Highend" {{ request('kategori') == 'PC Highend' ? 'selected' : '' }}>PC Highend</option>
                    <option value="PC" {{ request('kategori') == 'PC' ? 'selected' : '' }}>PC</option>
                    <option value="Printer Mono A4" {{ request('kategori') == 'Printer Mono A4' ? 'selected' : '' }}>Printer Mono A4</option>
                    <option value="Printer Color A4" {{ request('kategori') == 'Printer Color A4' ? 'selected' : '' }}>Printer Color A4</option>
                    <option value="Printer Color A3" {{ request('kategori') == 'Printer Color A3' ? 'selected' : '' }}>Printer Color A3</option>
                    <option value="Projektor" {{ request('kategori') == 'Projektor' ? 'selected' : '' }}>Projektor</option>
                </select>

                @if(request('search') || request('status') || request('kategori'))
                    <a href="{{ route('admin.peminjaman') }}" class="btn-reset">
                        <i class="fa-solid fa-rotate-left"></i> Set Semula
                    </a>
                @endif
            </form>

           
            <div class="table-card">
                <table class="custom-table" id="penempatanTable">
                    <thead>
                        <tr>
                            <th class="center" style="width: 55px;">No.</th>
                            <th class="center" style="width: 130px;">ID Permohonan</th>
                            <th>Nama Pemohon</th>
                            <th>Peralatan / Jenama</th>
                            <th class="center">Status Tracking</th>
                            <th class="center" style="width: 90px;">Tindakan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($peminjaman ?? [] as $index => $item)
                           @php
    $st = strtolower($item->status_penempatan ?? 'permohonan');
    $idPaparan = $item->id_permohonan ?? 'REQ' . str_pad($item->id, 3, '0', STR_PAD_LEFT);
    $namaAlat = $item->nama_peralatan ?? $item->nama_item ?? '-';

    if (!empty($item->kategori)) {
        $kategoriPaparan = $item->kategori;
    } else {
        $senaraiAlat = array_filter(array_map('trim', explode(',', $namaAlat)));
        $senaraiKategori = [];

        foreach ($senaraiAlat as $alat) {
            $n = strtolower($alat);
            if (str_contains($n, 'notebook') || str_contains($n, 'latitude') || str_contains($n, 'precision 5490') || str_contains($n, 'laptop')) {
                $senaraiKategori[] = (str_contains($n, 'highend') || str_contains($n, '5490')) ? 'Notebook Highend' : 'Notebook';
            } elseif (str_contains($n, 'pc') || str_contains($n, 'optiplex') || str_contains($n, 'precision 3680')) {
                $senaraiKategori[] = (str_contains($n, 'highend') || str_contains($n, '3680')) ? 'PC Highend' : 'PC';
            } elseif (str_contains($n, 'a3')) {
                $senaraiKategori[] = 'Printer Color A3';
            } elseif (str_contains($n, 'color') || str_contains($n, 'warna') || str_contains($n, 'c650')) {
                $senaraiKategori[] = 'Printer Color A4';
            } elseif (str_contains($n, 'printer') || str_contains($n, 'pencetak') || str_contains($n, 'b432')) {
                $senaraiKategori[] = 'Printer Mono A4';
            } elseif (str_contains($n, 'projektor') || str_contains($n, 'projector') || str_contains($n, 'epson')) {
                $senaraiKategori[] = 'Projektor';
            } else {
                $senaraiKategori[] = $alat;
            }
        }

        // Gabungkan semula semua kategori yang dikesan (cth: "PC Highend, Printer Mono A4")
        $kategoriPaparan = !empty($senaraiKategori) ? implode(', ', $senaraiKategori) : '-';
    }
@endphp
                            <tr>
                                <td class="center" style="color: #64748b; font-weight: 600;">{{ $index + 1 }}</td>
                                <td class="center">
                                    <span class="id-badge">{{ $idPaparan }}</span>
                                </td>
                                <td style="font-weight: 700; color: #0f172a;">{{ $item->user?->name ?? $item->nama_pemohon ?? '-' }}</td>
                                <td>
                                    <span style="font-weight: 600; color: #334155;">{{ $namaAlat }}</span>
                                    @if(!empty($item->no_siri) && $item->no_siri !== '-')
                                        <span style="display: block; font-size: 11px; color: #64748b; font-family: monospace; margin-top: 2px;">
                                            S/N: {{ $item->no_siri }}
                                        </span>
                                    @endif
                                </td>
                                <td class="center">
                                    @if(in_array($st, ['selesai', 'penerimaan', 'diterima', 'diterima pemohon']))
                                        <span class="status-pill pill-selesai">
                                            <i class="fa-solid fa-circle-check"></i> Penerimaan / Selesai
                                        </span>
                                    @elseif(in_array($st, ['dihantar', 'penghantaran']))
                                        <span class="status-pill pill-hantar">
                                            <i class="fa-solid fa-truck"></i> Dalam Penghantaran
                                        </span>
                                    @elseif(in_array($st, ['diagih', 'pengagihan']))
                                        <span class="status-pill pill-diagih">
                                            <i class="fa-solid fa-boxes-packing"></i> Diagih
                                        </span>
                                    @else
                                        <span class="status-pill pill-terima">
                                            <i class="fa-solid fa-file-invoice"></i> Permohonan Diterima
                                        </span>
                                    @endif
                                </td>
                                <td class="center">
                                    <button type="button" class="btn-icon-soft btn-view-penempatan"
                                        title="Kemaskini Status & Lihat Butiran"
                                        data-id="{{ $item->id }}"
                                        data-id-permohonan="{{ $idPaparan }}"
                                        data-pemohon="{{ $item->user?->name ?? $item->nama_pemohon ?? '-' }}"
                                        data-penerima="{{ $item->nama_penerima ?? $item->user?->name ?? '-' }}"
                                        data-jenama="{{ $namaAlat }}"
                                        data-kategori="{{ $kategoriPaparan }}"
                                        data-nosiri="{{ $item->no_siri ?? '-' }}"
                                        data-lokasi="{{ $item->lokasi ?? '-' }}"
                                        data-agihan="{{ $item->created_at ? \Carbon\Carbon::parse($item->created_at)->format('d/m/Y') : '-' }}"
                                        data-status="{{ $item->status_penempatan ?? 'Diagih' }}"
                                        data-update-url="{{ route('admin.peminjaman.updateStatus', $item->id) }}">
                                        <i class="fa-solid fa-eye"></i>
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="center" style="color: #94a3b8; padding: 35px; font-style: italic;">
                                    <i class="fa-solid fa-folder-open" style="font-size: 24px; margin-bottom: 8px; display: block;"></i>
                                    Tiada rekod penempatan permohonan ditemui.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </main>
    </div>

   <!-- popup details and kemaskini -->
    <div class="modal" id="modalButiranPenempatan">
        <div style="background: white; border-radius: 20px; width: 94%; max-width: 880px; padding: 30px 32px; position: relative; max-height: 92vh; overflow-y: auto; box-shadow: 0 20px 25px -5px rgba(0,0,0,0.15);">

            <span id="closePenempatanBtn" style="position: absolute; right: 26px; top: 22px; cursor: pointer; font-size: 22px; color: #94a3b8;">
                <i class="fa-solid fa-xmark"></i>
            </span>

            <h2 style="font-size: 20px; font-weight: 800; color: #0f172a; margin: 0 0 20px 0;">
                Butiran Penempatan Peralatan
            </h2>

            <!-- 2 KOTAK KAD BERSEBELAHAN -->
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 18px; margin-bottom: 18px;">

                <!-- Kad Kiri: Maklumat Pemohon -->
                <div style="background: #eff2fe; border-radius: 14px; padding: 20px 22px;">
                    <h3 style="font-size: 14px; font-weight: 800; color: #1e0b75; margin: 0 0 14px 0;">
                        Maklumat Pemohon
                    </h3>
                    <table style="width: 100%; border-collapse: collapse; font-size: 13px;">
                        <tr>
                            <td style="padding: 4px 0; color: #64748b; width: 120px;">Nama Pemohon</td>
                            <td style="padding: 4px 6px; color: #0f172a; font-weight: 700; width: 10px;">:</td>
                            <td style="padding: 4px 0; color: #0f172a; font-weight: 700;" id="detNama">-</td>
                        </tr>
                        <tr>
                            <td style="padding: 4px 0; color: #64748b;">Kategori</td>
                            <td style="padding: 4px 6px; color: #0f172a; font-weight: 700;">:</td>
                            <td style="padding: 4px 0; color: #0f172a; font-weight: 700;" id="detKategori">-</td>
                        </tr>
                    </table>
                </div>

                <!-- Kad Kanan: Maklumat Permohonan -->
                <div style="background: #eff2fe; border-radius: 14px; padding: 20px 22px;">
                    <h3 style="font-size: 14px; font-weight: 800; color: #1e0b75; margin: 0 0 14px 0;">
                        Maklumat Permohonan
                    </h3>
                    <table style="width: 100%; border-collapse: collapse; font-size: 13px;">
                        <tr>
                            <td style="padding: 4px 0; color: #64748b; width: 125px;">ID Permohonan</td>
                            <td style="padding: 4px 6px; color: #0f172a; font-weight: 700; width: 10px;">:</td>
                            <td style="padding: 4px 0; color: #0f172a; font-weight: 700; font-family: monospace;" id="detIDPermohonan">-</td>
                        </tr>
                        <tr>
                            <td style="padding: 4px 0; color: #64748b;">Tarikh Mohon</td>
                            <td style="padding: 4px 6px; color: #0f172a; font-weight: 700;">:</td>
                            <td style="padding: 4px 0; color: #0f172a; font-weight: 700;" id="detTarikhAgihan">-</td>
                        </tr>
                        <tr>
                            <td style="padding: 4px 0; color: #64748b; vertical-align: top;">Lokasi Utama</td>
                            <td style="padding: 4px 6px; color: #0f172a; font-weight: 700; vertical-align: top;">:</td>
                            <td style="padding: 4px 0; color: #0f172a; font-weight: 700;" id="detLokasi">-</td>
                        </tr>
                    </table>
                </div>

            </div>

            <!-- BORANG KEMASKINI NO. SIRI & STATUS PENEMPATAN -->
            <form id="formUpdatePenempatanStatus" action="" method="POST">
                @csrf
                @method('PUT')

                <!-- JADUAL SENARAI PENERIMA & DROPDOWN PILIH NO. SIRI -->
                <div style="background: #eff2fe; border-radius: 14px; padding: 18px 20px; margin-bottom: 18px;">
                    <h3 style="font-size: 14px; font-weight: 800; color: #1e0b75; margin: 0 0 12px 0;">
                        Senarai Penerima & Pilihan No. Siri Peralatan
                    </h3>
                    <div style="max-height: 230px; overflow-y: auto; border-radius: 10px; background: white; overflow-x: auto;">
                        <table style="width: 100%; border-collapse: collapse; font-size: 13px; text-align: left;">
                            <thead style="position: sticky; top: 0; z-index: 10;">
                                <tr style="background: #dfe4fb; color: #29158f;">
                                    <th style="padding: 10px 14px; width: 100px;">Penerima</th>
                                    <th style="padding: 10px 14px;">Nama Penerima</th>
                                    <th style="padding: 10px 14px;">Alat Dimohon</th>
                                    <th style="padding: 10px 14px; min-width: 185px;">Pilih No. Siri (S/N)</th>
                                    <th style="padding: 10px 14px;">Lokasi</th>
                                </tr>
                            </thead>
                            <tbody id="tblPenempatanPenerima">
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- BAHAGIAN KEMASKINI STATUS PENEMPATAN -->
                <div style="background: #f8fafc; padding: 16px 20px; border-radius: 14px; border: 1px solid #cbd5e1;">
                    <label style="display: block; font-size: 13px; font-weight: 800; color: #1e0b75; margin-bottom: 8px;">
                        <i class="fa-solid fa-route" style="margin-right: 6px;"></i> Kemaskini Status Penempatan
                    </label>
                    <div style="display: flex; gap: 12px; align-items: center;">
                        <select name="status_penempatan" id="selectPenempatanStatus" style="flex: 1; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 10px; font-size: 13px; font-weight: 600; color: #0f172a; outline: none; background: white;" required>
                            <option value="Diagih">Diagih</option>
                            <option value="Dihantar">Dihantar</option>
                            <option value="Diterima">Diterima</option>
                        </select>
                        <button type="submit" style="background: #1e0b75; color: white; border: none; padding: 10px 26px; border-radius: 10px; font-weight: 700; cursor: pointer; font-size: 13px;">
                            Simpan
                        </button>
                    </div>
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
                if (sidebar.classList.contains('collapsed')) {
                    toggleBtn.style.transform = 'rotate(180deg)';
                } else {
                    toggleBtn.style.transform = 'rotate(0deg)';
                }
            });
        }

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

        // Ambil senarai inventori & no. siri dari AdminController
        const senaraiInventori = @json($senaraiInventori ?? []);

        // Fungsi untuk samakan kategori alat dimohon dengan rekod inventori
        function kesanKategoriAlat(teks) {
            const t = (teks || '').toLowerCase().trim();
            if (t.includes('notebook') || t.includes('laptop') || t.includes('latitude') || t.includes('5490')) {
                return (t.includes('highend') || t.includes('high end') || t.includes('5490')) ? 'notebook highend' : 'notebook';
            }
            if (t.includes('pc') || t.includes('desktop') || t.includes('optiplex') || t.includes('3680')) {
                return (t.includes('highend') || t.includes('high end') || t.includes('3680')) ? 'pc highend' : 'pc';
            }
            if (t.includes('a3')) {
                return 'printer color a3';
            }
            if (t.includes('color') || t.includes('warna') || t.includes('c650')) {
                return 'printer color a4';
            }
            if (t.includes('printer') || t.includes('pencetak') || t.includes('mono') || t.includes('b432')) {
                return 'printer mono a4';
            }
            if (t.includes('projektor') || t.includes('projector') || t.includes('epson')) {
                return 'projektor';
            }
            return t;
        }

        const modal = document.getElementById('modalButiranPenempatan');
        const closeBtn = document.getElementById('closePenempatanBtn');
        const btnsView = document.querySelectorAll('.btn-view-penempatan');
        const formUpdate = document.getElementById('formUpdatePenempatanStatus');

        btnsView.forEach(btn => {
            btn.addEventListener('click', function () {
                const itemId = this.getAttribute('data-id');
                const strJenama = this.getAttribute('data-jenama') || '-';
                const strPenerima = this.getAttribute('data-penerima') || '-';
                const strNoSiri = this.getAttribute('data-nosiri') || '-';
                const strLokasi = this.getAttribute('data-lokasi') || '-';

                document.getElementById('detIDPermohonan').innerText = this.getAttribute('data-id-permohonan') || '-';
                document.getElementById('detNama').innerText = this.getAttribute('data-pemohon') || '-';
                document.getElementById('detKategori').innerText = this.getAttribute('data-kategori') || '-';
                document.getElementById('detLokasi').innerText = strLokasi;
                document.getElementById('detTarikhAgihan').innerText = this.getAttribute('data-agihan') || '-';

                const listPenerima = strPenerima !== '-' ? strPenerima.split(',').map(s => s.trim()).filter(Boolean) : [];
                const listAlat = strJenama !== '-' ? strJenama.split(',').map(s => s.trim()).filter(Boolean) : [];
                const listSiri = (strNoSiri && strNoSiri !== '-')
                    ? strNoSiri.split(/[\s,]+/).map(s => s.trim()).filter(Boolean)
                    : [];

                let listLokasi = [];
                if (strLokasi.includes('|')) {
                    listLokasi = strLokasi.split('|').map(s => s.trim());
                } else if (strLokasi.includes(';')) {
                    listLokasi = strLokasi.split(';').map(s => s.trim());
                } else if (strLokasi.includes(',')) {
                    const rawParts = strLokasi.split(',').map(s => s.trim());
                    for (let i = 0; i < rawParts.length; i += 2) {
                        listLokasi.push(rawParts[i + 1] ? `${rawParts[i]}, ${rawParts[i + 1]}` : rawParts[i]);
                    }
                } else {
                    listLokasi = [strLokasi.trim()];
                }

                const tbody = document.getElementById('tblPenempatanPenerima');
                if (tbody) {
                    tbody.innerHTML = '';
                    const jumlahBaris = Math.max(listPenerima.length, listSiri.length, 1);

                    for (let i = 0; i < jumlahBaris; i++) {
                        const namaPen = listPenerima[i] || listPenerima[0] || '-';
                        const alatNama = listAlat[i] || listAlat[0] || '-';
                        const siriSemasa = listSiri[i] || '';
                        const lokUnit = listLokasi[i] || listLokasi[0] || '-';

                        const katDimohon = kesanKategoriAlat(alatNama);

                        // Tapis HANYA no. siri dari inventori yang sepadan dengan alat penerima ini
                        let pilihanSiri = [];
                        senaraiInventori.forEach(inv => {
                            const katInv = kesanKategoriAlat(inv.kategori || inv.nama_peralatan);
                            const modInv = (inv.nama_peralatan || '').toLowerCase();

                            if (katInv === katDimohon || modInv.includes(alatNama.toLowerCase())) {
                                (inv.no_siri || []).forEach(sn => {
                                    pilihanSiri.push({
                                        sn: sn,
                                        label: `${sn} — ${inv.nama_peralatan}`
                                    });
                                });
                            }
                        });

                        // Buang pendua berdasarkan nombor siri
                        const unikSiri = [];
                        const dilihat = new Set();
                        pilihanSiri.forEach(item => {
                            if (!dilihat.has(item.sn)) {
                                dilihat.add(item.sn);
                                unikSiri.push(item);
                            }
                        });

                        // Bina dropdown <select> khusus untuk alat penerima ini sahaja
                        let optionsHtml = '';
                        if (unikSiri.length === 0) {
                            optionsHtml = `<option value="">-- Tiada stok S/N bagi ${alatNama} --</option>`;
                        } else {
                            optionsHtml = `<option value="">-- Pilih S/N (${alatNama}) --</option>`;
                            unikSiri.forEach(obj => {
                                const isSelected = (obj.sn === siriSemasa) ? 'selected' : '';
                                optionsHtml += `<option value="${obj.sn}" ${isSelected}>${obj.label}</option>`;
                            });
                        }

                        // Kekalkan S/N sedia ada jika sudah tersimpan sebelum ini
                        if (siriSemasa && !dilihat.has(siriSemasa)) {
                            optionsHtml += `<option value="${siriSemasa}" selected>${siriSemasa}</option>`;
                        }

                        const row = `
                            <tr style="border-bottom: 1px solid #f1f5f9;">
                                <td style="padding: 10px 14px; font-weight: 700; color: #0f172a;">Penerima ${i + 1}</td>
                                <td style="padding: 10px 14px; font-weight: 600; color: #0f172a;">${namaPen}</td>
                                <td style="padding: 10px 14px; color: #334155;">${alatNama}</td>
                                <td style="padding: 10px 14px;">
                                    <select name="no_siri_penerima[]" style="width: 100%; padding: 6px 10px; border: 1px solid #cbd5e1; border-radius: 8px; font-family: monospace; font-size: 12px; font-weight: 700; color: #1e0b75; background: #f8fafc; outline: none;">
                                        ${optionsHtml}
                                    </select>
                                </td>
                                <td style="padding: 10px 14px; color: #64748b;">${lokUnit}</td>
                            </tr>
                        `;
                        tbody.insertAdjacentHTML('beforeend', row);
                    }
                }

                const statusPenempatan = this.getAttribute('data-status') || 'Diagih';
                const selectStatus = document.getElementById('selectPenempatanStatus');
                if (selectStatus) {
                    selectStatus.value = statusPenempatan;
                }

                if (formUpdate && itemId) {
                    let actionUrl = "{{ route('admin.peminjaman.updateStatus', ':id') }}";
                    formUpdate.action = actionUrl.replace(':id', itemId);
                }

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