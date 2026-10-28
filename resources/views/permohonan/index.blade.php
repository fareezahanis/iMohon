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

        
        .content-area {
            padding: 30px 40px;
            flex-grow: 1;
        }

        .page-title {
            font-size: 28px;
            font-weight: bold;
            color: #111;
        }

        .page-sub {
            color: #666;
            font-size: 14px;
            margin-bottom: 25px;
        }

        .card-table {
            background-color: #ffffff;
            border-radius: 16px;
            padding: 25px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.03);
        }

        .custom-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0 8px;
            text-align: center;
        }

        .custom-table thead tr {
            background-color: #e2e5fc;
            color: #3d506a;  
            font-weight: 600;
            font-size: 14px;
        }

        .custom-table th {
            padding: 14px;
        }

        .custom-table th:first-child { border-top-left-radius: 8px; border-bottom-left-radius: 8px; }
        .custom-table th:last-child { border-top-right-radius: 8px; border-bottom-right-radius: 8px; }

        .custom-table tbody tr {
            border-bottom: 1px solid #f1f5f9;
        }

        .custom-table td {
            padding: 16px 14px;
            font-size: 14px;
        }

        .badge-status {
            display: inline-block;
            padding: 6px 12px;
            border-radius: 50px;
            font-size: 10px;
            font-weight: 600;
            min-width: 80px;
        }

        .bg-kuning { background-color: #fef08a; color: #854d0e; }
        .bg-hijau  { background-color: #bbf7d0; color: #166534; }
        .bg-merah  { background-color: #fecaca; color: #991b1b; }

        .btn-jejak {
            background-color: #bae6fd;
            color: #0369a1;
            padding: 5px 22px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            border: none;
            cursor: pointer;
            text-decoration: none;
            transition: background 0.2s;
        }

        .btn-jejak:hover { background-color: #7dd3fc; }

        .btn-mata {
            color: #0f172a;
            font-size: 18px;
            text-decoration: none;
            margin-left: 10px;
            cursor: pointer;
            background: none;
            border: none;
        }

        .btn-mata:hover { color: #29158f; }

       
        .modal {
            display: none;
            position: fixed; 
            z-index: 99999; 
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5); 
            align-items: center;
            justify-content: center; 
        }

        .modal-content {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 16px;
            width: 90%;
            max-width: 450px;
            position: relative;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            animation: popupAnimation 0.3s ease-out; 
        }

        .modal-content-wide {
            max-width: 650px;
            padding: 35px;
        }

        @keyframes popupAnimation {
            from {
                transform: scale(0.8);
                opacity: 0;
            }
            to {
                transform: scale(1);
                opacity: 1;
            }
        }

        .close-btn {
            position: absolute;
            top: 15px;
            right: 20px;
            font-size: 24px;
            font-weight: bold;
            color: #94a3b8;
            cursor: pointer;
            transition: color 0.2s;
        }

        .close-btn:hover {
            color: #0f172a;
        }

        
        .summary-card {
            background-color: #e8eafb; 
            padding: 18px 22px;
            border-radius: 14px;
            margin-bottom: 30px;
        }

        .summary-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px 10px;
        }

        .summary-label {
            display: block;
            font-size: 12px;
            color: #6b7280;
            margin-bottom: 2px;
        }

        .summary-grid strong {
            font-size: 14px;
            color: #111827;
            font-weight: 700;
        }

        
        .timeline-container {
            padding-left: 10px;
        }

        .timeline-item {
            display: flex;
            align-items: flex-start;
            gap: 20px;
            position: relative;
            padding-bottom: 30px;
        }

        .timeline-item:not(:last-child)::before {
            content: '';
            position: absolute;
            left: 21px; 
            top: 42px;
            bottom: 0;
            width: 4px;
            background-color: #d1d5db;
        }

        .timeline-icon {
            width: 44px;
            height: 44px;
            border-radius: 50%;
            background-color: #e5e7eb;
            color: #374151;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            z-index: 1;
            flex-shrink: 0;
        }

        .timeline-item.active .timeline-icon.icon-success {
            background-color: #15803d;
            color: #ffffff;
        }

        .timeline-content h4 {
            font-size: 15px;
            font-weight: 600;
            color: #1f2937;
            margin-bottom: 3px;
        }

        .timeline-content p {
            font-size: 13px;
            color: #6b7280;
            line-height: 1.4;
        }

        
        .detail-card {
            background-color: #e8ebff;
            border-radius: 14px;
            padding: 20px 24px;
            margin-bottom: 25px;
        }

        .detail-section-title {
            font-size: 16px;
            font-weight: 600;
            color: #1e1b4b;
            margin-bottom: 12px;
        }

        .detail-grid-3 {
            display: grid;
            grid-template-columns: 1.2fr 1fr 1.2fr;
            gap: 16px 12px;
        }

        .detail-field {
            display: flex;
            flex-direction: column;
        }

        .detail-field label {
            font-size: 13px;
            color: #6b7280;
            margin-bottom: 4px;
        }

        .detail-field strong {
            font-size: 14px;
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
            <h1 class="page-title">Senarai Permohonan</h1>
            <p class="page-sub">Senarai permohonan yang telah dihantar</p>

            <div class="card-table">
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
                            <tr>
                                <td style="text-align: left; color: #181819; font-weight: 400;">
                                    {{ $item->id_permohonan }}
                                </td>
                                <td style="text-align: left; font-weight: 400; color: #1e293b;">
                                    {{ $item->nama_item }}
                                </td>
                                <td style="color: #1a1a1b;">
                                    {{ \Carbon\Carbon::parse($item->tarikh_mohon)->format('d/m/Y') }}
                                </td>
                                <td>
                                    @if($item->status == 'Dalam proses')
                                        <span class="badge-status bg-kuning">Dalam proses</span>
                                    @elseif($item->status == 'Diterima')
                                        <span class="badge-status bg-hijau">Diterima</span>
                                    @elseif($item->status == 'Ditolak')
                                        <span class="badge-status bg-merah">Ditolak</span>
                                    @else
                                        <span class="badge-status bg-kuning">{{ $item->status }}</span>
                                    @endif
                                </td>
                                <td>
                                    <!-- button jejak -->
                                    <button type="button" class="btn-jejak" 
                                        onclick="openTrackingModal(
                                            '{{ $item->id_permohonan }}', 
                                            '{{ $item->nama_item }}', 
                                            '{{ \Carbon\Carbon::parse($item->tarikh_mohon)->format('d/m/Y') }}', 
                                            '{{ $item->kuantiti }}'
                                        )"> Jejak
                                    </button>

                                    <!-- button mata detail -->
                                    <button type="button" class="btn-mata" title="Lihat"
                                        onclick="openDetailModal(
                                            '{{ Auth::user()->name }}',
                                            '{{ Auth::user()->jawatan ?? '-' }}',
                                            '{{ Auth::user()->email }}',
                                            '{{ Auth::user()->phone_pej ?? '-' }}',
                                            '{{ Auth::user()->unit ?? '-' }}',
                                            '{{ Auth::user()->phone ?? '-' }}',
                                            '{{ $item->jenis_permohonan }}',
                                            '{{ $item->nama_item }}',
                                            '{{ $item->nama_penerima }}',
                                            '{{ \Carbon\Carbon::parse($item->tarikh_mohon)->format('d/m/Y') }}',
                                            '{{ $item->tujuan }}',
                                            '{{ $item->lokasi }}'
                                        )">
                                        <i class="bi bi-eye-fill"></i>
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" style="padding: 40px; color: #94a3b8;">
                                    Tiada rekod permohonan ditemui.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- button jejak content-->
    <div id="trackingModal" class="modal">
        <div class="modal-content">
            <span class="close-btn" onclick="closeModal('trackingModal')">&times;</span>

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
                        <span class="summary-label">Jumlah</span>
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
                        <h4>Permohonan</h4>
                        <p id="modal-step1-time">Terima</p>
                    </div>
                </div>

                <div class="timeline-item">
                    <div class="timeline-icon">
                        <i class="fa-solid fa-paper-plane"></i>
                    </div>
                    <div class="timeline-content">
                        <h4>Pengagihan</h4>
                        <p>Belum mula</p>
                    </div>
                </div>

                <div class="timeline-item">
                    <div class="timeline-icon">
                        <i class="fa-solid fa-truck"></i>
                    </div>
                    <div class="timeline-content">
                        <h4>Penghantaran</h4>
                        <p>Belum mula</p>
                    </div>
                </div>

                <div class="timeline-item">
                    <div class="timeline-icon">
                        <i class="fa-solid fa-clipboard-check"></i>
                    </div>
                    <div class="timeline-content">
                        <h4>Penerimaan</h4>
                        <p>Belum mula</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

<div id="detailModal" class="modal">
    <div class="modal-content modal-content-wide" style="max-width: 800px; width: 90%; background: #ffffff; border-radius: 20px; padding: 30px; position: relative;">
        <span class="close-btn" onclick="closeModal('detailModal')" style="position: absolute; right: 25px; top: 20px; cursor: pointer; font-size: 24px;">&times;</span>

        
        <h3 class="detail-section-title">Maklumat Pemohon</h3>
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
                    <label>No.Tel Pej</label>
                    <strong id="dt-tel-pej">-</strong>
                </div>
                <div class="detail-field">
                    <label>Unit</label>
                    <strong id="dt-unit">-</strong>
                </div>
                <div class="detail-field">
                    <label>No.Tel Hp</label>
                    <strong id="dt-tel-hp">-</strong>
                </div>
            </div>
        </div>

        
        <h3 class="detail-section-title" style="margin-top: 20px;">Maklumat Permohonan</h3>
        <div class="detail-card">
            <div class="detail-grid-3">
                <div class="detail-field">
                    <label>Jenis permohonan</label>
                    <strong id="dt-jenis">-</strong>
                </div>
                <div class="detail-field">
                    <label>Tarikh</label>
                    <strong id="dt-tarikh">-</strong>
                </div>
                <div class="detail-field" style="grid-column: span 3;">
                    <label>Tujuan / Justifikasi</label>
                    <strong id="dt-tujuan">-</strong>
                </div>
            </div>
        </div>

        
        <h3 class="detail-section-title" style="margin-top: 20px;">Senarai Penerima Permohonan</h3>
        <div class="detail-card" style="margin-bottom: 0; padding: 15px;">
            <div style="max-height: 220px; overflow-y: auto; border-radius: 8px; border: 1px solid #e2e8f0;">
                <table style="width: 100%; border-collapse: collapse; font-size: 13px; text-align: left; background: white;">
                    <thead style="position: sticky; top: 0; z-index: 10;">
                        <tr style="background: #e2e8f0; color: #334155;">
                            <th style="padding: 10px 12px; width: 110px;">Penerima</th>
                            <th style="padding: 10px 12px;">Nama Penerima</th>
                            <th style="padding: 10px 12px;">Item Dimohon</th>
                            <th style="padding: 10px 12px;">Lokasi / Alamat</th>
                        </tr>
                    </thead>
                    <tbody id="tblPemohonPenerima">
                        <!-- js -->
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>

    <script>
    document.addEventListener('DOMContentLoaded', function () {
        // Sidebar toggle
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