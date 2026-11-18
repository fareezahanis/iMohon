<!DOCTYPE html>
<html lang="ms">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Kelulusan Permohonan - iMohon</title>
    
    <!-- FontAwesome Icon & Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!DOCTYPE html>
<html lang="ms">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelulusan Permohonan - iMohon</title>

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
            transition: all 0.3s ease;
        }

        .sidebar-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 40px;
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

        .page-header {
            margin-bottom: 24px;
        }

        .page-title {
            font-size: 28px;
            font-weight: bold;
            color: #0f172a;
            margin-bottom: 4px;
        }

        .page-subtitle {
            font-size: 13.5px;
            color: #64748b;
        }

        
        .alert-success {
            background-color: #dcfce7;
            border: 1px solid #86efac;
            color: #166534;
            padding: 14px 18px;
            border-radius: 12px;
            margin-bottom: 20px;
            font-size: 13.5px;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        
        .card-box {
            background: white;
            border-radius: 16px;
            padding: 25px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.04);
            overflow-x: auto;
        }

        .custom-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 13.5px;
        }

        .custom-table th {
            background-color: #e0e7ff;
            color: #3730a3;
            padding: 13px 16px;
            text-align: center;
            font-weight: 600;
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
            padding: 14px 16px;
            color: #334155;
            text-align: center;
        }

        
        .badge {
            padding: 6px 14px;
            border-radius: 50px;
            font-size: 11.5px;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .badge-proses { background-color: #fef3c7; color: #92400e; }
        .badge-purple { background-color: #dcfce7; color: #166534; }
        .badge-tolak  { background-color: #fee2e2; color: #991b1b; }

        .btn-action-edit {
            width: 34px;
            height: 34px;
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

        .btn-action-edit:hover {
            background-color: #29158f;
            color: #ffffff;
        }

        
        .modal-overlay {
            position: fixed;
            inset: 0;
            width: 100%;
            height: 100%;
            background: rgba(15, 23, 42, 0.55);
            backdrop-filter: blur(3px);
            display: none;
            align-items: center;
            justify-content: center;
            z-index: 1000;
        }

        .modal-card {
            background: #ffffff;
            border-radius: 20px;
            width: 92%;
            max-width: 820px;
            max-height: 90vh;
            overflow-y: auto;
            padding: 30px 34px;
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.15);
            position: relative;
            animation: modalSlide 0.25s ease-out;
        }

        @keyframes modalSlide {
            from { transform: translateY(-16px); opacity: 0; }
            to   { transform: translateY(0); opacity: 1; }
        }

        .modal-header-title {
            font-size: 20px;
            font-weight: 700;
            color: #0f172a;
            margin-bottom: 18px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .modal-info-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 18px;
            margin-bottom: 18px;
        }

        @media (max-width: 720px) {
            .modal-info-grid {
                grid-template-columns: 1fr;
            }
        }

        .info-box-card {
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 14px;
            padding: 18px 20px;
        }

        .info-box-title {
            font-size: 14px;
            font-weight: 700;
            color: #29158f;
            margin-bottom: 12px;
        }

        .info-table {
            width: 100%;
            border-collapse: collapse;
        }

        .info-table td {
            padding: 5px 0;
            font-size: 13px;
            vertical-align: top;
            text-align: left;
        }

        .info-table td.label {
            color: #64748b;
            width: 42%;
        }

        .info-table td.colon {
            width: 5%;
            color: #64748b;
        }

        .info-table td.value {
            color: #0f172a;
            font-weight: 600;
            width: 53%;
        }

        .justifikasi-section {
            margin-top: 16px;
            text-align: left;
        }

        .justifikasi-title {
            font-size: 14px;
            font-weight: 700;
            color: #29158f;
            margin-bottom: 8px;
        }

        .justifikasi-box {
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            padding: 12px 16px;
            font-size: 13px;
            color: #334155;
            min-height: 44px;
        }

        .modal-actions {
            display: flex;
            justify-content: flex-end;
            gap: 12px;
            margin-top: 22px;
            padding-top: 16px;
            border-top: 1px solid #f1f5f9;
        }

        .btn-modal {
            padding: 10px 26px;
            border-radius: 10px;
            font-size: 13.5px;
            font-weight: 700;
            border: none;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: all 0.2s ease;
        }

        .btn-lulus { background-color: #16a34a; color: white; }
        .btn-lulus:hover { background-color: #15803d; }

        .btn-tolak { background-color: #dc2626; color: white; }
        .btn-tolak:hover { background-color: #b91c1c; }

        .close-modal-btn {
            position: absolute;
            top: 18px;
            right: 24px;
            background: none;
            border: none;
            font-size: 24px;
            color: #94a3b8;
            cursor: pointer;
        }

        .close-modal-btn:hover { color: #0f172a; }

       
        .modal {
            position: fixed;
            inset: 0;
            width: 100vw;
            height: 100vh;
            background: rgba(15, 23, 42, 0.6);
            backdrop-filter: blur(4px);
            display: none;
            align-items: center;
            justify-content: center;
            z-index: 999999;
        }

        .modal-content-confirm {
            background: #ffffff;
            border-radius: 20px;
            width: 90%;
            max-width: 420px;
            padding: 30px 26px;
            text-align: center;
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.15);
            position: relative;
            animation: popupScale 0.2s ease-out;
        }

        @keyframes popupScale {
            from { transform: scale(0.92); opacity: 0; }
            to   { transform: scale(1); opacity: 1; }
        }

        .icon-circle-success {
            background-color: #dcfce7;
            color: #16a34a;
            width: 68px;
            height: 68px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 18px auto;
            font-size: 30px;
        }

        .icon-circle-danger {
            background-color: #fee2e2;
            color: #dc2626;
            width: 68px;
            height: 68px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 18px auto;
            font-size: 30px;
        }

        .modal-confirm-title {
            font-size: 18px;
            font-weight: 700;
            color: #0f172a;
            margin-bottom: 18px;
        }

        .reason-box {
            width: 100%;
            display: flex;
            flex-direction: column;
            gap: 6px;
            margin-bottom: 16px;
            text-align: left;
        }

        .reason-label {
            font-size: 12.5px;
            color: #334155;
            font-weight: 600;
        }

        .reason-textarea {
            width: 100%;
            height: 76px;
            border: 1px solid #cbd5e1;
            border-radius: 10px;
            padding: 10px 12px;
            font-size: 13px;
            outline: none;
            resize: none;
            color: #0f172a;
        }

        .reason-textarea:focus {
            border-color: #29158f;
            box-shadow: 0 0 0 3px rgba(41, 21, 143, 0.12);
        }

        .confirm-btn-row {
            display: flex;
            justify-content: center;
            gap: 10px;
            width: 100%;
        }

        .modal-btn-confirm-lulus {
            background-color: #16a34a;
            color: white;
            border: none;
            padding: 10px 20px;
            min-width: 130px;
            border-radius: 10px;
            font-weight: 600;
            font-size: 13.5px;
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
            padding: 10px 20px;
            min-width: 130px;
            border-radius: 10px;
            font-weight: 600;
            font-size: 13.5px;
            cursor: pointer;
            transition: 0.2s;
        }

        .modal-btn-confirm-tolak:hover {
            background-color: #b91c1c;
        }

        .modal-btn-batal {
            background-color: #f1f5f9;
            color: #475569;
            border: 1px solid #cbd5e1;
            padding: 10px 20px;
            min-width: 110px;
            border-radius: 10px;
            font-weight: 600;
            font-size: 13.5px;
            cursor: pointer;
            transition: 0.2s;
        }

        .modal-btn-batal:hover {
            background-color: #e2e8f0;
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
                <a href="{{ route('pelulus.dashboard') }}" class="nav-link {{ request()->routeIs('pelulus.dashboard') ? 'active' : '' }}">
                    <i class="fa-solid fa-house"></i>
                    <span>Laman utama</span>
                </a>
            </li>
            <li>
                <a href="{{ route('pelulus.kelulusan') }}" class="nav-link {{ request()->routeIs('pelulus.kelulusan*') ? 'active' : '' }}">
                    <i class="fa-solid fa-circle-check"></i>
                    <span>Kelulusan</span>
                </a>
            </li>
            <li>
                <a href="{{ route('pelulus.profile.user') }}" class="nav-link {{ request()->routeIs('pelulus.profile*') ? 'active' : '' }}">
                    <i class="fa-solid fa-users"></i>
                    <span>Profil</span>
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

       @include('partials.top-header')

        <!-- CONTENT BODY -->
        <main class="content-body">
            <div class="page-header">
                <h1 class="page-title">Kelulusan Permohonan</h1>
                <p class="page-subtitle">Semak butiran dan sahkan kelulusan permohonan peralatan ICT</p>
            </div>

            @if(session('success'))
                <div class="alert-success">
                    <i class="fa-solid fa-circle-check"></i>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            <div class="card-box">
                <table class="custom-table">
                    <thead>
                        <tr>
                            <th style="text-align: left;">ID Permohonan</th>
                            <th>Tarikh mohon</th>
                            <th style="text-align: left;">Pemohon</th>
                            <th>Jabatan / Unit</th>
                            <th style="text-align: left;">Item</th>
                            <th>Jenis</th>
                            <th>Status Pelulus</th>
                            <th>Tindakan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($senaraiPermohonan ?? [] as $item)
                            @php
                                $statusPelulus = strtolower($item->status_pelulus ?? $item->status ?? '');
                            @endphp
                            <tr>
                                <td style="text-align: left; font-weight: 700; color: #1e0b75;">
                                    {{ $item->id_permohonan ?? 'REQ'.str_pad($item->id, 3, '0', STR_PAD_LEFT) }}
                                </td>
                                <td>{{ \Carbon\Carbon::parse($item->created_at)->format('d/m/Y') }}</td>
                                <td style="text-align: left; font-weight: 600; color: #0f172a;">
                                    {{ $item->user->name ?? $item->nama_pemohon ?? '-' }}
                                </td>
                                <td>{{ $item->jabatan ?? $item->unit ?? 'STM' }}</td>
                                <td style="text-align: left;">{{ $item->nama_item ?? '-' }}</td>
                                <td>{{ $item->jenis_permohonan ?? 'Baru' }}</td>

                                <td>
                                    @if(in_array($statusPelulus, ['diterima', 'disokong', 'lulus', 'terima']))
                                        <span class="badge badge-purple">
                                            <i class="fa-solid fa-user-check"></i> Diterima Pelulus
                                        </span>
                                    @elseif($statusPelulus == 'ditolak')
                                        <span class="badge badge-tolak">
                                            <i class="fa-solid fa-user-xmark"></i> Ditolak Pelulus
                                        </span>
                                    @else
                                        <span class="badge badge-proses">
                                            <i class="fa-solid fa-clock"></i> Menunggu Pelulus
                                        </span>
                                    @endif
                                </td>

                                <td>
                                    <button type="button" class="btn-action-edit btn-view-permohonan"
                                        title="Semak & Kemaskini Kelulusan"
                                        data-id="{{ $item->id }}"
                                        data-id-permohonan="{{ $item->id_permohonan ?? 'REQ'.str_pad($item->id, 3, '0', STR_PAD_LEFT) }}"
                                        data-nama="{{ $item->user->name ?? $item->nama_pemohon ?? '-' }}"
                                        data-ic="{{ $item->user->ic ?? '-' }}"
                                        data-tel="{{ $item->user->phone ?? '-' }}"
                                        data-tel-pej="{{ $item->user->no_tel_pejabat ?? '-' }}"
                                        data-email="{{ $item->user->email ?? '-' }}"
                                        data-tarikh="{{ \Carbon\Carbon::parse($item->created_at)->format('d/m/Y') }}"
                                        data-jenis="{{ $item->jenis_permohonan ?? 'Baru' }}"
                                        data-namapenerima="{{ is_array($item->nama_penerima) ? json_encode($item->nama_penerima) : $item->nama_penerima }}"
                                        data-lokasi="{{ is_array($item->lokasi) ? json_encode($item->lokasi) : ($item->lokasi ?? '-') }}"
                                        data-item="{{ is_array($item->nama_item) ? json_encode($item->nama_item) : ($item->nama_item ?? '-') }}"
                                        data-justifikasi="{{ $item->tujuan ?? 'Tiada justifikasi.' }}"
                                        data-status="{{ $statusPelulus }}">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" style="text-align: center; color: #94a3b8; padding: 35px; font-style: italic;">
                                    Tiada permohonan memerlukan kelulusan buat masa ini.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </main>

    </div>

    <!-- popup details permohonan -->
    <div class="modal-overlay" id="modalButiran">
        <div class="modal-card">
            <button type="button" class="close-modal-btn" id="btnCloseModal">&times;</button>
            <h2 class="modal-header-title">
                <i class="fa-solid fa-file-signature" style="color: #29158f;"></i> Butiran Permohonan
            </h2>

            <div class="modal-info-grid">
                <!-- maklumat pemohon -->
                <div class="info-box-card">
                    <div class="info-box-title">Maklumat Pemohon</div>
                    <table class="info-table">
                        <tr><td class="label">Nama penuh</td><td class="colon">:</td><td class="value" id="modalNama">-</td></tr>
                        <tr><td class="label">No. Kad Pengenalan</td><td class="colon">:</td><td class="value" id="modalIC">-</td></tr>
                        <tr><td class="label">No. Tel Pejabat</td><td class="colon">:</td><td class="value" id="modalTelPej">-</td></tr>
                        <tr><td class="label">No. Tel Bimbit</td><td class="colon">:</td><td class="value" id="modalTel">-</td></tr>
                        <tr><td class="label">Emel</td><td class="colon">:</td><td class="value" id="modalEmail">-</td></tr>
                    </table>
                </div>

                <!-- maklumat permohonan -->
                <div class="info-box-card">
                    <div class="info-box-title">Maklumat Permohonan</div>
                    <table class="info-table">
                        <tr><td class="label">ID Permohonan</td><td class="colon">:</td><td class="value" id="modalIDPermohonan">-</td></tr>
                        <tr><td class="label">Tarikh Mohon</td><td class="colon">:</td><td class="value" id="modalTarikh">-</td></tr>
                        <tr><td class="label">Jenis Permohonan</td><td class="colon">:</td><td class="value" id="modalJenis">-</td></tr>
                    </table>
                </div>
            </div>

            <!-- Table Senarai Penerima -->
            <div class="info-box-card">
                <div class="info-box-title">Senarai Penerima Permohonan</div>

                <div style="overflow-x: auto; border-radius: 8px; border: 1px solid #e2e8f0;">
                    <table style="width: 100%; border-collapse: collapse; font-size: 13px; text-align: left; background: white;">
                        <thead>
                            <tr style="background: #e0e7ff; color: #3730a3;">
                                <th style="padding: 10px 12px; width: 110px;">Penerima</th>
                                <th style="padding: 10px 12px;">Nama Penerima</th>
                                <th style="padding: 10px 12px;">Alat Dimohon</th>
                                <th style="padding: 10px 12px;">Lokasi</th>
                            </tr>
                        </thead>
                        <tbody id="tblBodyPenerima">
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- justifikasi -->
            <div class="justifikasi-section">
                <div class="justifikasi-title">Tujuan / Justifikasi</div>
                <div class="justifikasi-box" id="modalJustifikasi">-</div>
            </div>

            <!-- button terima / tolak -->
            <div class="modal-actions" id="modalActionsGroup">
                <button type="button" class="btn-modal btn-tolak" id="btnProsesTolak">
                    <i class="fa-solid fa-xmark"></i> TOLAK
                </button>
                <button type="button" class="btn-modal btn-lulus" id="btnProsesLulus">
                    <i class="fa-solid fa-check"></i> TERIMA
                </button>
            </div>
        </div>
    </div>

    <!-- popup -->
    <div class="modal" id="modalLulus">
        <div class="modal-content-confirm">
            <div class="icon-circle-success">
                <i class="fa-solid fa-check"></i>
            </div>
            <p class="modal-confirm-title">Terima permohonan ini?</p>

            <form id="formConfirmLulus" action="" method="POST" style="width: 100%;">
                @csrf
                @method('PUT')
                <input type="hidden" name="status" value="Diterima">

                <div class="reason-box">
                    <span class="reason-label">Catatan kelulusan (pilihan):</span>
                    <textarea name="catatan_kelulusan" class="reason-textarea" placeholder="Masukkan catatan tambahan jika ada..."></textarea>
                </div>

                <div class="confirm-btn-row">
                    <button type="button" class="modal-btn-batal close-lulus-btn">Batal</button>
                    <button type="submit" class="modal-btn-confirm-lulus">Ya, Terima</button>
                </div>
            </form>
        </div>
    </div>

    <!-- popup -->
    <div class="modal" id="modalTolak">
        <div class="modal-content-confirm">
            <div class="icon-circle-danger">
                <i class="fa-solid fa-xmark"></i>
            </div>
            <p class="modal-confirm-title">Tolak permohonan ini?</p>

            <form id="formConfirmTolak" action="" method="POST" style="width: 100%;">
                @csrf
                @method('PUT')
                <input type="hidden" name="status" value="Ditolak">

                <div class="reason-box">
                    <span class="reason-label">Sebab penolakan:</span>
                    <textarea name="sebab_penolakan" class="reason-textarea" placeholder="Nyatakan sebab penolakan..." required></textarea>
                </div>

                <div class="confirm-btn-row">
                    <button type="button" class="modal-btn-batal close-tolak-btn">Batal</button>
                    <button type="submit" class="modal-btn-confirm-tolak">Ya, Tolak</button>
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

       
        const modalButiran = document.getElementById('modalButiran');
        const modalLulus = document.getElementById('modalLulus');
        const modalTolak = document.getElementById('modalTolak');
        
        const btnCloseModal = document.getElementById('btnCloseModal');
        const modalActionsGroup = document.getElementById('modalActionsGroup');
        
        let selectedPermohonanId = null;
        let selectedRowTarget = null;

        
        document.querySelectorAll('.btn-view-permohonan').forEach(btn => {
            btn.addEventListener('click', function () {
                selectedPermohonanId = this.getAttribute('data-id');
                selectedRowTarget = this.closest('tr');

                // maklumat pemohon
                document.getElementById('modalNama').innerText = this.getAttribute('data-nama') || '-';
                document.getElementById('modalIC').innerText = this.getAttribute('data-ic') || '-';
                document.getElementById('modalTel').innerText = this.getAttribute('data-tel') || '-';
                document.getElementById('modalEmail').innerText = this.getAttribute('data-email') || '-';

                // maklumat permohonan
                document.getElementById('modalIDPermohonan').innerText = this.getAttribute('data-id-permohonan') || '-';
                document.getElementById('modalTarikh').innerText = this.getAttribute('data-tarikh') || '-';
                document.getElementById('modalJenis').innerText = this.getAttribute('data-jenis') || '-';
                document.getElementById('modalJustifikasi').innerText = this.getAttribute('data-justifikasi') || 'Tiada justifikasi.';

                
                const currentStatus = (this.getAttribute('data-status') || '').toLowerCase().trim();
                if (['diterima', 'disokong', 'ditolak', 'lulus', 'terima'].includes(currentStatus)) {
                    if (modalActionsGroup) modalActionsGroup.style.display = 'none';
                } else {
                    if (modalActionsGroup) modalActionsGroup.style.display = 'flex';
                }

               
                const strPenerima = this.getAttribute('data-namapenerima') || '';
                const strItem     = this.getAttribute('data-item') || '';
                const strLokasi   = this.getAttribute('data-lokasi') || '';

                const listPenerima = strPenerima ? strPenerima.split(',').map(s => s.trim()) : [];
                const listItem     = strItem ? strItem.split(',').map(s => s.trim()) : [];

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

                modalButiran.style.display = 'flex';
            });
        });

        
        if (btnCloseModal) {
            btnCloseModal.addEventListener('click', () => modalButiran.style.display = 'none');
        }

        document.querySelectorAll('.close-lulus-btn').forEach(btn => {
            btn.addEventListener('click', () => modalLulus.style.display = 'none');
        });

        document.querySelectorAll('.close-tolak-btn').forEach(btn => {
            btn.addEventListener('click', () => modalTolak.style.display = 'none');
        });

        window.addEventListener('click', (e) => {
            if (e.target === modalButiran) modalButiran.style.display = 'none';
            if (e.target === modalLulus) modalLulus.style.display = 'none';
            if (e.target === modalTolak) modalTolak.style.display = 'none';
        });

       
        document.getElementById('btnProsesLulus').addEventListener('click', function () {
            if (!selectedPermohonanId) return;
            modalLulus.style.display = 'flex';
        });

        document.getElementById('btnProsesTolak').addEventListener('click', function () {
            if (!selectedPermohonanId) return;
            modalTolak.style.display = 'flex';
        });

        
        function sendStatusUpdate(status, extraData = {}) {
            if (!selectedPermohonanId) return;

            const token = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');

            let actionUrl = "{{ route('pelulus.kelulusan.update', ':id') }}";
            actionUrl = actionUrl.replace(':id', selectedPermohonanId);

            const payload = {
                status: status,
                ...extraData
            };

            fetch(actionUrl, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': token,
                    'Accept': 'application/json'
                },
                body: JSON.stringify(payload)
            })
            .then(async res => {
                const data = await res.json();
                if (!res.ok) {
                    throw new Error(data.message || 'Gagal mengemaskini pangkalan data');
                }
                return data;
            })
            .then(data => {
                if (data.success) {
                    
                    modalLulus.style.display = 'none';
                    modalTolak.style.display = 'none';
                    modalButiran.style.display = 'none';

                    // Kemaskini Badge & Atribut dekat baris jadual secara langsung
                    if (selectedRowTarget) {
                        const statusTd = selectedRowTarget.children[6]; 
                        const actionBtn = selectedRowTarget.querySelector('.btn-view-permohonan');
                        
                        if (data.status === 'Diterima' || data.status === 'Disokong' || data.status === 'Lulus') {
                            if (actionBtn) actionBtn.setAttribute('data-status', 'diterima');
                            statusTd.innerHTML = `
                                <span class="badge badge-purple">
                                    <i class="fa-solid fa-user-check"></i> Diterima Pelulus
                                </span>
                            `;
                        } else if (data.status === 'Ditolak') {
                            if (actionBtn) actionBtn.setAttribute('data-status', 'ditolak');
                            statusTd.innerHTML = `
                                <span class="badge badge-tolak">
                                    <i class="fa-solid fa-user-xmark"></i> Ditolak Pelulus
                                </span>
                            `;
                        }
                    }
                }
            })
            .catch(err => {
                console.error('Ralat:', err);
                alert('Gagal menyimpan status: ' + err.message);
            });
        }

        
        document.getElementById('formConfirmLulus').addEventListener('submit', function (e) {
            e.preventDefault();
            const catatan = this.querySelector('textarea[name="catatan_kelulusan"]')?.value || '';
            sendStatusUpdate('Diterima', { catatan_kelulusan: catatan });
        });

        document.getElementById('formConfirmTolak').addEventListener('submit', function (e) {
            e.preventDefault();
            const sebab = this.querySelector('textarea[name="sebab_penolakan"]')?.value || '';
            if (!sebab.trim()) {
                alert('Sila nyatakan sebab penolakan.');
                return;
            }
            sendStatusUpdate('Ditolak', { sebab_penolakan: sebab });
        });
    });
</script>
    
</body>
</html>