<!DOCTYPE html>
<html lang="ms">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Senarai Permohonan - iMohon</title>

    <!-- FontAwesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

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

        /* SIDEBAR (LEFT) */
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

        .sidebar.collapsed {
            width: 80px;
            padding: 25px 12px;
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

        /* CONTENT AREA */
        .content-area {
            padding: 30px 40px 40px;
            flex-grow: 1;
        }

        .header-row {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            margin-bottom: 24px;
        }

        .page-title {
            font-size: 28px;
            font-weight: bold;
            color: #0f172a;
            margin-bottom: 4px;
        }

        .page-sub {
            color: #64748b;
            font-size: 13.5px;
        }

        .btn-new-request {
            background-color: #29158f;
            color: white;
            text-decoration: none;
            padding: 10px 18px;
            border-radius: 10px;
            font-size: 13px;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            box-shadow: 0 4px 12px rgba(41, 21, 143, 0.2);
            transition: background 0.2s, transform 0.2s;
        }

        .btn-new-request:hover {
            background-color: #1e0b75;
            transform: translateY(-1px);
        }

        
        .card-table {
            background-color: #ffffff;
            border-radius: 16px;
            padding: 25px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.04);
        }

        .custom-table {
            width: 100%;
            border-collapse: collapse;
            text-align: center;
        }

        .custom-table thead tr {
            background-color: #e0e7ff;
            color: #3730a3;
            font-weight: 600;
            font-size: 13.5px;
        }

        .custom-table th {
            padding: 13px 16px;
        }

        .custom-table th:first-child { border-radius: 10px 0 0 10px; }
        .custom-table th:last-child  { border-radius: 0 10px 10px 0; }

        .custom-table tbody tr {
            border-bottom: 1px solid #f1f5f9;
            transition: background 0.15s;
        }

        .custom-table tbody tr:hover {
            background-color: #f8fafc;
        }

        .custom-table td {
            padding: 15px 16px;
            font-size: 13.5px;
            color: #334155;
        }

        
        .badge-status {
            display: inline-block;
            padding: 5px 13px;
            border-radius: 50px;
            font-size: 11.5px;
            font-weight: 600;
            min-width: 92px;
        }

        .bg-kuning { background-color: #fef3c7; color: #92400e; }
        .bg-hijau  { background-color: #dcfce7; color: #166534; }
        .bg-merah  { background-color: #fee2e2; color: #991b1b; }

        /* ACTION BUTTONS */
        .action-group {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .btn-jejak {
            background-color: #e0f2fe;
            color: #0369a1;
            padding: 6px 16px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            border: none;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            transition: background 0.2s;
        }

        .btn-jejak:hover {
            background-color: #bae6fd;
        }

        .btn-mata {
            width: 32px;
            height: 32px;
            border-radius: 8px;
            background-color: #eef2ff;
            color: #29158f;
            font-size: 14px;
            cursor: pointer;
            border: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            transition: all 0.2s;
        }

        .btn-mata:hover {
            background-color: #29158f;
            color: #ffffff;
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

        .modal-content {
            background-color: #ffffff;
            padding: 28px 30px;
            border-radius: 18px;
            width: 92%;
            max-width: 470px;
            position: relative;
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.15);
            animation: popupAnimation 0.25s ease-out;
        }

        .modal-content-wide {
            max-width: 780px;
            padding: 30px;
        }

        @keyframes popupAnimation {
            from { transform: scale(0.95); opacity: 0; }
            to   { transform: scale(1); opacity: 1; }
        }

        .close-btn {
            position: absolute;
            top: 16px;
            right: 22px;
            font-size: 22px;
            color: #94a3b8;
            cursor: pointer;
            transition: color 0.2s;
        }

        .close-btn:hover {
            color: #0f172a;
        }

        
        .summary-card {
            background-color: #eef2ff;
            border: 1px solid #c7d2fe;
            padding: 16px 20px;
            border-radius: 14px;
            margin-bottom: 24px;
        }

        .summary-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 14px 16px;
        }

        .summary-label {
            display: block;
            font-size: 11.5px;
            color: #64748b;
            margin-bottom: 2px;
        }

        .summary-grid strong {
            font-size: 13.5px;
            color: #0f172a;
            font-weight: 700;
        }

        
        .timeline-container {
            padding-left: 6px;
        }

        .timeline-item {
            display: flex;
            align-items: flex-start;
            gap: 16px;
            position: relative;
            padding-bottom: 24px;
        }

        .timeline-item:last-child {
            padding-bottom: 4px;
        }

        .timeline-item:not(:last-child)::before {
            content: '';
            position: absolute;
            left: 19px;
            top: 40px;
            bottom: 0;
            width: 3px;
            background-color: #e2e8f0;
        }

        .timeline-item.active:not(:last-child)::before {
            background-color: #16a34a;
        }

        .timeline-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: #f1f5f9;
            color: #64748b;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
            z-index: 1;
            flex-shrink: 0;
        }

        .timeline-item.active .timeline-icon.icon-success {
            background-color: #16a34a;
            color: #ffffff;
        }

        .timeline-item.rejected .timeline-icon {
            background-color: #dc2626;
            color: #ffffff;
        }

        .timeline-content h4 {
            font-size: 14.5px;
            font-weight: 700;
            color: #0f172a;
            margin-bottom: 2px;
        }

        .timeline-content p {
            font-size: 12.5px;
            color: #64748b;
            line-height: 1.4;
        }

        
        .detail-card {
            background-color: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 14px;
            padding: 18px 22px;
            margin-bottom: 20px;
        }

        .detail-section-title {
            font-size: 15px;
            font-weight: 700;
            color: #29158f;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .detail-grid-3 {
            display: grid;
            grid-template-columns: 1.2fr 1fr 1.2fr;
            gap: 14px 16px;
        }

        .detail-field {
            display: flex;
            flex-direction: column;
        }

        .detail-field label {
            font-size: 12px;
            color: #64748b;
            margin-bottom: 3px;
        }

        .detail-field strong {
            font-size: 13.5px;
            color: #0f172a;
            font-weight: 600;
            word-break: break-word;
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
            <i class="fa-solid fa-angles-left" id="toggleSidebar" style="cursor: pointer; opacity: 0.8; font-size: 18px; transition: transform 0.3s ease;"></i>
        </div>

        <ul class="nav-menu">
            <li>
                <a href="{{ route('dashboard') }}" class="nav-link">
                    <i class="fa-solid fa-house"></i>
                    <span>Laman utama</span>
                </a>
            </li>
            <li>
                <a href="{{ route('profile.user') }}" class="nav-link">
                    <i class="fa-solid fa-user"></i>
                    <span>Profil</span>
                </a>
            </li>
            <li>
                <a href="{{ route('permohonan.create') }}" class="nav-link">
                    <i class="fa-solid fa-pen-to-square"></i>
                    <span>Permohonan</span>
                </a>
            </li>
            <li>
                <a href="{{ route('permohonan.index') }}" class="nav-link active">
                    <i class="fa-solid fa-list-check"></i>
                    <span>Senarai Permohonan</span>
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

    <!-- MAIN WRAPPER -->
    <div class="main-wrapper">
        <!-- TOP HEADER -->
        <header class="top-header">
            <div class="user-profile">
                <span>{{ Auth::user()->name }}</span>
                <div class="user-avatar">
                    <i class="fa-solid fa-user"></i>
                </div>
            </div>
        </header>

        <!-- CONTENT AREA -->
        <div class="content-area">
            <div class="header-row">
                <div>
                    <h1 class="page-title">Senarai Permohonan</h1>
                    <p class="page-sub">Rekod dan status permohonan peralatan ICT yang telah dihantar</p>
                </div>

                <a href="{{ route('permohonan.create') }}" class="btn-new-request">
                    <i class="fa-solid fa-plus"></i> Permohonan Baharu
                </a>
            </div>

            <div class="card-table">
                <div style="overflow-x: auto;">
                    <table class="custom-table">
                        <thead>
                            <tr>
                                <th style="text-align: left;">ID Permohonan</th>
                                <th style="text-align: left;">Item</th>
                                <th>Tarikh mohon</th>
                                <th>Status</th>
                                <th>Tindakan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($permohonan as $item)
                                @php
                                    $statusLower = strtolower($item->status ?? '');
                                @endphp
                                <tr>
                                    <td style="text-align: left; color: #1e0b75; font-weight: 700;">
                                        {{ $item->id_permohonan }}
                                    </td>
                                    <td style="text-align: left; font-weight: 600; color: #0f172a;">
                                        {{ $item->nama_item }}
                                    </td>
                                    <td>
                                        {{ \Carbon\Carbon::parse($item->tarikh_mohon)->format('d/m/Y') }}
                                    </td>
                                    <td>
                                        @if(in_array($statusLower, ['diterima', 'lulus', 'terima']))
                                            <span class="badge-status bg-hijau">Diterima</span>
                                        @elseif($statusLower == 'ditolak')
                                            <span class="badge-status bg-merah">Ditolak</span>
                                        @else
                                            <span class="badge-status bg-kuning">{{ $item->status ?? 'Dalam proses' }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="action-group">
                                            <!-- BUTTON JEJAK -->
                                            <button type="button" class="btn-jejak"
                                                onclick="openTrackingModal(
                                                    @js($item->id_permohonan),
                                                    @js($item->nama_item),
                                                    @js(\Carbon\Carbon::parse($item->tarikh_mohon)->format('d/m/Y')),
                                                    @js($item->kuantiti),
                                                    @js($item->status ?? 'Dalam proses')
                                                )">
                                                <i class="fa-solid fa-route"></i> Jejak
                                            </button>

                                            <!-- BUTTON MATA DETAIL -->
                                            <button type="button" class="btn-mata" title="Lihat Butiran"
                                                onclick="openDetailModal(
                                                    @js(Auth::user()->name),
                                                    @js(Auth::user()->jawatan ?? '-'),
                                                    @js(Auth::user()->email),
                                                    @js(Auth::user()->no_tel_pejabat ?? '-'),
                                                    @js(Auth::user()->unit ?? '-'),
                                                    @js(Auth::user()->phone ?? '-'),
                                                    @js($item->jenis_permohonan),
                                                    @js($item->nama_item),
                                                    @js($item->nama_penerima),
                                                    @js(\Carbon\Carbon::parse($item->tarikh_mohon)->format('d/m/Y')),
                                                    @js($item->tujuan),
                                                    @js($item->lokasi)
                                                )">
                                                <i class="fa-solid fa-eye"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" style="padding: 40px; color: #94a3b8; font-style: italic;">
                                        <i class="fa-solid fa-folder-open" style="font-size: 24px; margin-bottom: 8px; display: block;"></i>
                                        Tiada rekod permohonan ditemui.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    
    <div id="trackingModal" class="modal">
        <div class="modal-content">
            <span class="close-btn" onclick="closeModal('trackingModal')">&times;</span>

            <h3 style="font-size: 17px; font-weight: 700; color: #0f172a; margin-bottom: 14px;">
                <i class="fa-solid fa-location-dot" style="color: #29158f; margin-right: 6px;"></i> Status Jejak Permohonan
            </h3>

            <div class="summary-card">
                <div class="summary-grid">
                    <div>
                        <span class="summary-label">ID Permohonan</span>
                        <strong id="modal-req-id">-</strong>
                    </div>
                    <div>
                        <span class="summary-label">Item</span>
                        <strong id="modal-item">-</strong>
                    </div>
                    <div>
                        <span class="summary-label">Tarikh Permohonan</span>
                        <strong id="modal-date">-</strong>
                    </div>
                    <div>
                        <span class="summary-label">Jumlah Kuantiti</span>
                        <strong id="modal-qty">-</strong>
                    </div>
                </div>
            </div>

            <div class="timeline-container">
                <div class="timeline-item active">
                    <div class="timeline-icon icon-success">
                        <i class="fa-solid fa-check"></i>
                    </div>
                    <div class="timeline-content">
                        <h4>Permohonan Dihantar</h4>
                        <p id="modal-step1-time">Diterima oleh sistem</p>
                    </div>
                </div>

                <div class="timeline-item" id="step-pengagihan">
                    <div class="timeline-icon">
                        <i class="fa-solid fa-paper-plane"></i>
                    </div>
                    <div class="timeline-content">
                        <h4>Semakan & Pengagihan</h4>
                        <p id="step-pengagihan-desc">Menunggu semakan unit ICT</p>
                    </div>
                </div>

                <div class="timeline-item" id="step-penghantaran">
                    <div class="timeline-icon">
                        <i class="fa-solid fa-truck"></i>
                    </div>
                    <div class="timeline-content">
                        <h4>Penghantaran / Penempatan</h4>
                        <p id="step-penghantaran-desc">Belum mula</p>
                    </div>
                </div>

                <div class="timeline-item" id="step-penerimaan">
                    <div class="timeline-icon">
                        <i class="fa-solid fa-clipboard-check"></i>
                    </div>
                    <div class="timeline-content">
                        <h4>Selesai / Penerimaan</h4>
                        <p id="step-penerimaan-desc">Belum mula</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    <div id="detailModal" class="modal">
        <div class="modal-content modal-content-wide">
            <span class="close-btn" onclick="closeModal('detailModal')">&times;</span>

            <h3 class="detail-section-title">
                <i class="fa-solid fa-user-tie"></i> Maklumat Pemohon
            </h3>
            <div class="detail-card">
                <div class="detail-grid-3">
                    <div class="detail-field">
                        <label>Nama Pemohon</label>
                        <strong id="dt-nama">-</strong>
                    </div>
                    <div class="detail-field">
                        <label>Jawatan</label>
                        <strong id="dt-jawatan">-</strong>
                    </div>
                    <div class="detail-field">
                        <label>Emel</label>
                        <strong id="dt-email">-</strong>
                    </div>

                    <div class="detail-field">
                        <label>No. Tel Pejabat</label>
                        <strong id="dt-tel-pej">-</strong>
                    </div>
                    <div class="detail-field">
                        <label>Unit</label>
                        <strong id="dt-unit">-</strong>
                    </div>
                    <div class="detail-field">
                        <label>No. Tel Bimbit</label>
                        <strong id="dt-tel-hp">-</strong>
                    </div>
                </div>
            </div>

            <h3 class="detail-section-title">
                <i class="fa-solid fa-file-lines"></i> Maklumat Permohonan
            </h3>
            <div class="detail-card">
                <div class="detail-grid-3">
                    <div class="detail-field">
                        <label>Jenis Permohonan</label>
                        <strong id="dt-jenis">-</strong>
                    </div>
                    <div class="detail-field">
                        <label>Tarikh Mohon</label>
                        <strong id="dt-tarikh">-</strong>
                    </div>
                    <div class="detail-field">
                        <label>Item Dimohon</label>
                        <strong id="dt-item-ringkas">-</strong>
                    </div>
                    <div class="detail-field" style="grid-column: span 3;">
                        <label>Tujuan / Justifikasi</label>
                        <strong id="dt-tujuan">-</strong>
                    </div>
                </div>
            </div>

            <h3 class="detail-section-title">
                <i class="fa-solid fa-users"></i> Senarai Penerima Permohonan
            </h3>
            <div class="detail-card" style="margin-bottom: 0; padding: 14px;">
                <div style="max-height: 220px; overflow-y: auto; border-radius: 8px; border: 1px solid #e2e8f0;">
                    <table style="width: 100%; border-collapse: collapse; font-size: 13px; text-align: left; background: white;">
                        <thead style="position: sticky; top: 0; z-index: 10;">
                            <tr style="background: #e0e7ff; color: #3730a3;">
                                <th style="padding: 10px 12px; width: 100px;">Penerima</th>
                                <th style="padding: 10px 12px;">Nama Penerima</th>
                                <th style="padding: 10px 12px;">Item Dimohon</th>
                                <th style="padding: 10px 12px;">Lokasi / Alamat</th>
                            </tr>
                        </thead>
                        <tbody id="tblPemohonPenerima">
                        </tbody>
                    </table>
                </div>
            </div>

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
    });

    
    function openTrackingModal(id, item, date, qty) {
        document.getElementById('modal-req-id').innerText = id;
        document.getElementById('modal-item').innerText = item;
        document.getElementById('modal-date').innerText = date;
        document.getElementById('modal-qty').innerText = qty + ' unit';
        document.getElementById('modal-step1-time').innerText = date;

        document.getElementById('trackingModal').style.display = 'flex';
    }

    function openDetailModal(nama, jawatan, email, telPej, unit, telHp, jenis, item, penerima, tarikh, tujuan, lokasi) {
        
        if (typeof nama === 'object' && nama !== null) {
            const btn = nama;
            nama = btn.getAttribute('data-nama') || '-';
            jawatan = btn.getAttribute('data-jawatan') || '-';
            email = btn.getAttribute('data-email') || '-';
            telPej = btn.getAttribute('data-telpej') || '-';
            unit = btn.getAttribute('data-unit') || '-';
            telHp = btn.getAttribute('data-telhp') || '-';
            jenis = btn.getAttribute('data-jenis') || '-';
            item = btn.getAttribute('data-item') || '-';
            penerima = btn.getAttribute('data-namapenerima') || '-';
            tarikh = btn.getAttribute('data-tarikh') || '-';
            tujuan = btn.getAttribute('data-tujuan') || '-';
            lokasi = btn.getAttribute('data-lokasi') || '-';
        }

        
        document.getElementById('dt-nama').innerText = nama || '-';
        document.getElementById('dt-jawatan').innerText = jawatan || '-';
        document.getElementById('dt-email').innerText = email || '-';
        document.getElementById('dt-tel-pej').innerText = telPej || '-';
        document.getElementById('dt-unit').innerText = unit || '-';
        document.getElementById('dt-tel-hp').innerText = telHp || '-';

        document.getElementById('dt-jenis').innerText = jenis || '-';
        document.getElementById('dt-tarikh').innerText = tarikh || '-';
        document.getElementById('dt-tujuan').innerText = tujuan || 'Tiada tujuan.';

        
        const strPenerima = penerima || '';
        const strItem     = item || '';
        const strLokasi   = lokasi || '';

        const listPenerima = strPenerima ? strPenerima.split(',').map(s => s.trim()) : [];
        const listItem     = strItem ? strItem.split(',').map(s => s.trim()) : [];

        //list lokasi
        let listLokasi = [];
        if (strLokasi.includes('|')) {
            listLokasi = strLokasi.split('|').map(s => s.trim());
        } else if (strLokasi.includes(';')) {
            listLokasi = strLokasi.split(';').map(s => s.trim());
        } else if (strLokasi.includes(',')) {
            const rawParts = strLokasi.split(',').map(s => s.trim());
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

        // jadual penerima
        const tbody = document.getElementById('tblPemohonPenerima');
        if (tbody) {
            tbody.innerHTML = '';

            if (listPenerima.length > 0) {
                listPenerima.forEach((namaPen, index) => {
                    const itemNama = listItem[index] || listItem[0] || '-';
                    const lokNama = listLokasi[index] || listLokasi[0] || '-';

                    const row = `
                        <tr style="border-bottom: 1px solid #f1f5f9;">
                            <td style="padding: 10px 12px; font-weight: 700; color: #201f25;">Penerima ${index + 1}</td>
                            <td style="padding: 10px 12px; font-weight: 600; color: #0f172a;">${namaPen}</td>
                            <td style="padding: 10px 12px; color: #334155;">${itemNama}</td>
                            <td style="padding: 10px 12px; color: #64748b;">${lokNama}</td>
                        </tr>
                    `;
                    tbody.insertAdjacentHTML('beforeend', row);
                });
            } else {
                tbody.innerHTML = `
                    <tr>
                        <td colspan="4" style="padding: 15px; text-align: center; color: #94a3b8; font-style: italic;">
                            Tiada maklumat penerima.
                        </td>
                    </tr>
                `;
            }
        }

        document.getElementById('detailModal').style.display = 'flex';
    }

    
    function closeModal(modalId) {
        document.getElementById(modalId).style.display = 'none';
    }

   
    window.onclick = function(event) {
        const trackingModal = document.getElementById('trackingModal');
        const detailModal = document.getElementById('detailModal');
        
        if (event.target == trackingModal) {
            trackingModal.style.display = 'none';
        }
        if (event.target == detailModal) {
            detailModal.style.display = 'none';
        }
    }
</script>
</body>
</html>