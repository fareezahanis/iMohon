<!DOCTYPE html>
<html lang="ms">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Permohonan - iMohon</title>

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

        /* MAIN WRAPPER (RIGHT) */
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

        .page-sub {
            color: #64748b;
            font-size: 13.5px;
            margin-bottom: 24px;
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1.35fr;
            gap: 24px;
            align-items: start;
        }

        @media (max-width: 960px) {
            .form-grid {
                grid-template-columns: 1fr;
            }
        }

        .form-card {
            background: white;
            border-radius: 16px;
            padding: 26px 28px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.04);
            border-top: 4px solid #29158f;
        }

        .card-header-step {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 20px;
            padding-bottom: 14px;
            border-bottom: 1px solid #f1f5f9;
        }

        .step-number {
            width: 30px;
            height: 30px;
            background-color: #29158f;
            color: white;
            border-radius: 9px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 14px;
            flex-shrink: 0;
        }

        .step-title {
            font-size: 17px;
            font-weight: 700;
            color: #0f172a;
        }

        
        .form-group {
            margin-bottom: 15px;
        }

        .form-row-2 {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 14px;
            margin-bottom: 15px;
        }

        .form-label {
            display: block;
            font-size: 13px;
            font-weight: 600;
            color: #334155;
            margin-bottom: 6px;
        }

        .form-label span.req {
            color: #e11d48;
        }

        .form-input, .form-select, .form-textarea {
            width: 100%;
            padding: 10px 14px !important;
            border: 1px solid #cbd5e1 !important;
            border-radius: 10px !important;
            font-size: 13.5px;
            color: #0f172a;
            outline: none !important;
            box-shadow: none !important;
            background-color: #ffffff;
            transition: border-color 0.2s, box-shadow 0.2s;
        }

        .form-input:focus, .form-select:focus, .form-textarea:focus {
            border-color: #29158f !important;
            box-shadow: 0 0 0 3px rgba(41, 21, 143, 0.12) !important;
        }

        .form-input[readonly] {
            background-color: #f8fafc;
            color: #475569;
            font-weight: 600;
            cursor: default;
        }

        
        .radio-group {
            display: flex;
            gap: 16px;
            align-items: center;
            margin-top: 4px;
        }

        .radio-pill {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 8px 16px;
            border: 1px solid #cbd5e1;
            border-radius: 10px;
            font-size: 13.5px;
            font-weight: 600;
            color: #334155;
            cursor: pointer;
            background: #f8fafc;
            transition: all 0.2s;
        }

        .radio-pill:has(input:checked) {
            background: #eef2ff;
            border-color: #29158f;
            color: #29158f;
        }

        
        .item-qty-grid {
            display: grid;
            grid-template-columns: 1fr 90px auto;
            gap: 10px;
            align-items: end;
            margin-bottom: 10px;
        }

        /* BUTTON TAMBAH & BUANG */
        .btn-add-sub {
            background: #eef2ff;
            color: #29158f;
            border: 1px dashed #a5b4fc;
            padding: 7px 14px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 12.5px;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            transition: all 0.2s;
        }

        .btn-add-sub:hover {
            background: #e0e7ff;
            border-color: #29158f;
        }

        .btn-remove-icon {
            background: #fee2e2;
            color: #dc2626;
            border: none;
            width: 38px;
            height: 39px;
            border-radius: 9px;
            cursor: pointer;
            font-size: 13px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            transition: background 0.2s;
        }

        .btn-remove-icon:hover {
            background: #fecaca;
        }

        .penerima-block {
            background-color: #f8fafc;
            border: 1px solid #e2e8f0;
            border-left: 4px solid #29158f;
            border-radius: 12px;
            padding: 16px 18px;
            margin-bottom: 14px;
        }

        .penerima-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 12px;
        }

        .penerima-badge {
            font-size: 12.5px;
            font-weight: 700;
            color: #29158f;
            background: #eef2ff;
            padding: 3px 10px;
            border-radius: 20px;
        }

        .btn-remove-penerima {
            background: none;
            border: none;
            color: #dc2626;
            font-size: 12px;
            font-weight: 600;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 4px;
        }

        .btn-remove-penerima:hover {
            text-decoration: underline;
        }

        
        .btn-container {
            display: flex;
            justify-content: flex-end;
            margin-top: 22px;
            padding-top: 16px;
            border-top: 1px solid #f1f5f9;
        }

        .submit-btn {
            background-color: #29158f;
            color: white;
            border: none;
            padding: 11px 24px;
            border-radius: 10px;
            font-weight: 600;
            font-size: 13.5px;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            box-shadow: 0 4px 12px rgba(41, 21, 143, 0.2);
            transition: background 0.2s, transform 0.2s;
        }

        .submit-btn:hover {
            background-color: #1e0b75;
            transform: translateY(-1px);
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

        .modal-content-confirm {
            background-color: #ffffff;
            padding: 28px 30px;
            border-radius: 18px;
            width: 92%;
            max-width: 660px;
            position: relative;
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.15);
            animation: popupAnimation 0.25s ease-out;
        }

        @keyframes popupAnimation {
            from { transform: scale(0.95); opacity: 0; }
            to { transform: scale(1); opacity: 1; }
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

        .confirm-banner {
            background-color: #fef3c7;
            border: 1px solid #fde68a;
            color: #92400e;
            padding: 10px 14px;
            border-radius: 10px;
            font-size: 13px;
            font-weight: 600;
            margin-bottom: 18px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .confirm-box {
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            margin-bottom: 16px;
            overflow: hidden;
        }

        .confirm-table-wrapper {
            max-height: 200px;
            overflow-y: auto;
        }

        .confirm-box-header {
            background-color: #f8fafc;
            padding: 11px 18px;
            font-size: 13.5px;
            font-weight: 700;
            color: #29158f;
            border-bottom: 1px solid #e2e8f0;
        }

        .confirm-box-body {
            padding: 15px 18px;
        }

        .confirm-grid-2 {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 10px 24px;
            font-size: 13px;
        }

        .confirm-row {
            display: flex;
            align-items: flex-start;
        }

        .confirm-row .lbl {
            width: 125px;
            color: #64748b;
            font-weight: 500;
            flex-shrink: 0;
        }

        .confirm-row .val {
            color: #0f172a;
            font-weight: 600;
        }

        .confirm-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 13px;
        }

        .confirm-table th {
            background-color: #e0e7ff;
            color: #3730a3;
            font-weight: 600;
            padding: 9px 14px;
            text-align: left;
        }

        .confirm-table td {
            padding: 10px 14px;
            color: #334155;
            border-top: 1px solid #f1f5f9;
        }

        .btn-sahkan {
            background-color: #29158f;
            color: white;
            border: none;
            padding: 11px 24px;
            border-radius: 10px;
            font-weight: 600;
            font-size: 13.5px;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            box-shadow: 0 4px 12px rgba(41, 21, 143, 0.2);
            transition: background 0.2s;
        }

        .btn-sahkan:hover {
            background-color: #1e0b75;
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
                <a href="{{ route('permohonan.create') }}" class="nav-link active">
                    <i class="fa-solid fa-pen-to-square"></i>
                    <span>Permohonan</span>
                </a>
            </li>
            <li>
                <a href="{{ route('permohonan.index') }}" class="nav-link">
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

    <!-- MAIN WRAPPER RIGHT -->
    <div class="main-wrapper">

       @include('partials.top-header')

        <!-- CONTENT BODY -->
        <main class="content-body">

            <h1 class="page-title">Permohonan Baharu</h1>
            <p class="page-sub">Lengkapkan butiran peralatan ICT yang diperlukan di bawah</p>

            <form id="permohonanForm" action="{{ route('permohonan.store') }}" method="POST">
                @csrf

                <div class="form-grid">

                    
                    <div class="form-card">
                        <div class="card-header-step">
                            <div class="step-number">1</div>
                            <div>
                                <div class="step-title">Maklumat Pemohon</div>
                                <div style="font-size: 11.5px; color: #64748b;">Diambil secara automatik daripada profil anda</div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Nama pemohon</label>
                            <input type="text" class="form-input" value="{{ Auth::user()->name }}" readonly>
                        </div>

                        <div class="form-row-2">
                            <div>
                                <label class="form-label">No. Tel Pejabat</label>
                                <input type="text" name="no_tel_pejabat" class="form-input" value="{{ Auth::user()->no_tel_pejabat ?? '-' }}" readonly>
                            </div>
                            <div>
                                <label class="form-label">No. Tel Bimbit</label>
                                <input type="text" class="form-input" value="{{ Auth::user()->phone ?? '-' }}" readonly>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Jawatan</label>
                            <input type="text" class="form-input" value="{{ Auth::user()->jawatan ?? '-' }}" readonly>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Unit</label>
                            <input type="text" class="form-input" value="{{ Auth::user()->unit ?? '-' }}" readonly>
                        </div>

                        <div class="form-group" style="margin-bottom: 0;">
                            <label class="form-label">Emel rasmi</label>
                            <input type="email" class="form-input" value="{{ Auth::user()->email }}" readonly>
                        </div>
                    </div>

                    
                    <div class="form-card" style="border-top-color: #10b981;">
                        <div class="card-header-step">
                            <div class="step-number" style="background-color: #10b981;">2</div>
                            <div>
                                <div class="step-title">Maklumat Permohonan</div>
                                <div style="font-size: 11.5px; color: #64748b;">Pilih jenis peralatan, kuantiti dan senarai penerima</div>
                            </div>
                        </div>

                        <div class="form-row-2">
                            <div>
                                <label class="form-label">Jenis permohonan <span class="req">*</span></label>
                                <div class="radio-group">
                                    <label class="radio-pill">
                                        <input type="radio" name="jenis_permohonan" value="Baru" checked> Baru
                                    </label>
                                    <label class="radio-pill">
                                        <input type="radio" name="jenis_permohonan" value="Ganti"> Ganti
                                    </label>
                                </div>
                            </div>

                            <div>
                                <label class="form-label">Tarikh permohonan <span class="req">*</span></label>
                                <input type="date" name="tarikh_mohon" id="inputTarikh" class="form-input" value="{{ date('Y-m-d') }}" required>
                            </div>
                        </div>

                       
                        <div class="form-group">
                            <div id="items-container">
                                <div class="item-qty-grid item-row">
                                    <div>
                                        <label class="form-label">Item / Peralatan <span class="req">*</span></label>
                                        <select name="nama_item[]" class="form-select input-nama-item" required>
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
                                    <div>
                                        <label class="form-label">Kuantiti <span class="req">*</span></label>
                                        <input type="number" name="kuantiti[]" class="form-input input-kuantiti" value="1" min="1" required>
                                    </div>
                                    <div style="width: 38px;"></div>
                                </div>
                            </div>

                            <button type="button" class="btn-add-sub" id="addItemBtn">
                                <i class="fa-solid fa-plus"></i> Tambah Item
                            </button>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Tujuan / Justifikasi <span class="req">*</span></label>
                            <textarea name="tujuan" id="inputTujuan" class="form-textarea" rows="3" placeholder="Nyatakan tujuan atau justifikasi permohonan ini" required></textarea>
                        </div>

                        
                        <div id="penerima-container">
                            <div class="penerima-block">
                                <div class="penerima-header">
                                    <span class="penerima-badge label-penerima">Penerima 1</span>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Nama penerima <span class="req">*</span></label>
                                    <input type="text" name="nama_penerima[]" class="form-input input-penerima-nama" placeholder="Nama penuh penerima peralatan" required>
                                </div>

                                <div class="form-row-2" style="margin-bottom: 0;">
                                    <div>
                                        <label class="form-label">Item diterima <span class="req">*</span></label>
                                        <input type="text" name="penerima_item[]" class="form-input input-penerima-item" placeholder="Contoh: Notebook" required>
                                    </div>
                                    <div>
                                        <label class="form-label">Lokasi / Aras penggunaan <span class="req">*</span></label>
                                        <input type="text" name="lokasi[]" class="form-input input-penerima-lokasi" placeholder="Contoh: Aras 3, Wisma TV" required>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group" style="margin-bottom: 0;">
                            <button type="button" class="btn-add-sub" id="addPenerimaBtn">
                                <i class="fa-solid fa-user-plus"></i> Tambah Penerima
                            </button>
                        </div>

                       
                        <div class="btn-container">
                            <button type="button" class="submit-btn" onclick="triggerConfirmModal()">
                                <i class="fa-solid fa-paper-plane"></i> Hantar Permohonan
                            </button>
                        </div>

                    </div>

                </div>

            </form>

        </main>

    </div>

    
    <div id="confirmModal" class="modal">
        <div class="modal-content-confirm">
            <span class="close-btn" onclick="closeConfirmModal()">&times;</span>

            <div class="confirm-banner">
                <i class="fa-solid fa-circle-exclamation"></i>
                <span>Sila semak maklumat permohonan anda dengan teliti sebelum dihantar.</span>
            </div>

            <div class="confirm-box">
                <div class="confirm-box-header">
                    <i class="fa-solid fa-file-lines" style="margin-right: 6px;"></i> Maklumat Permohonan
                </div>
                <div class="confirm-box-body">
                    <div class="confirm-grid-2">
                        <div>
                            <div class="confirm-row" style="margin-bottom: 8px;">
                                <span class="lbl">Jenis permohonan</span>
                                <span class="val">: <span id="cfm-jenis">Baru</span></span>
                            </div>
                            <div class="confirm-row" style="margin-bottom: 8px;">
                                <span class="lbl">Item</span>
                                <span class="val">: <span id="cfm-item">-</span></span>
                            </div>
                            <div class="confirm-row" style="margin-bottom: 8px;">
                                <span class="lbl">Jumlah kuantiti</span>
                                <span class="val">: <span id="cfm-kuantiti">1</span></span>
                            </div>
                            <div class="confirm-row">
                                <span class="lbl">Tarikh</span>
                                <span class="val">: <span id="cfm-tarikh">-</span></span>
                            </div>
                        </div>

                        <div>
                            <div class="confirm-row">
                                <span class="lbl">Tujuan</span>
                                <span class="val">: <span id="cfm-tujuan">-</span></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="confirm-box" style="margin-bottom: 22px;">
                <div class="confirm-box-header">
                    <i class="fa-solid fa-users" style="margin-right: 6px;"></i> Senarai Nama Penerima & Item
                </div>
                <div class="confirm-table-wrapper">
                    <table class="confirm-table">
                        <thead>
                            <tr>
                                <th style="width: 30%;">Nama</th>
                                <th style="width: 35%;">Item</th>
                                <th style="width: 35%;">Lokasi / Alamat</th>
                            </tr>
                        </thead>
                        <tbody id="cfm-penerima-tbody">
                        </tbody>
                    </table>
                </div>
            </div>

            <div style="display: flex; justify-content: flex-end; gap: 10px;">
                <button type="button" onclick="closeConfirmModal()" style="background: #f1f5f9; color: #475569; border: 1px solid #cbd5e1; padding: 10px 20px; border-radius: 10px; font-weight: 600; font-size: 13.5px; cursor: pointer;">
                    Semak Semula
                </button>
                <button type="button" class="btn-sahkan" onclick="submitFinalForm()">
                    <i class="fa-solid fa-check"></i> Sahkan & Hantar
                </button>
            </div>
        </div>
    </div>

    <!-- js -->
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

            
            const itemsContainer = document.getElementById('items-container');
            const addItemBtn = document.getElementById('addItemBtn');

            if (addItemBtn && itemsContainer) {
                addItemBtn.addEventListener('click', function () {
                    const firstRow = itemsContainer.querySelector('.item-row');
                    const newRow = firstRow.cloneNode(true);

                    newRow.querySelector('select').value = "";
                    newRow.querySelector('input[type="number"]').value = "1";

                    let removeBtn = newRow.querySelector('.btn-remove-row');
                    if (!removeBtn) {
                        removeBtn = document.createElement('button');
                        removeBtn.type = 'button';
                        removeBtn.className = 'btn-remove-row';
                        removeBtn.innerText = 'Padam Item';
                        removeBtn.onclick = function () { newRow.remove(); };
                        newRow.querySelector('div').appendChild(removeBtn);
                    }

                    itemsContainer.appendChild(newRow);
                });
            }

            
            const penerimaContainer = document.getElementById('penerima-container');
            const addPenerimaBtn = document.getElementById('addPenerimaBtn');

            if (addPenerimaBtn && penerimaContainer) {
                addPenerimaBtn.addEventListener('click', function () {
                    const totalPenerima = penerimaContainer.querySelectorAll('.penerima-block').length + 1;

                    const newBlock = document.createElement('div');
                    newBlock.className = 'penerima-block';
                    newBlock.innerHTML = `
                        <div class="form-group">
                            <label class="form-label">Nama penerima ${totalPenerima}</label>
                            <input type="text" name="nama_penerima[]" class="form-input input-penerima-nama" placeholder="Nama penerima (jika berkaitan)" required>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Lokasi/Alamat penggunaan</label>
                            <input type="text" name="lokasi[]" class="form-input input-penerima-lokasi" placeholder="Nyatakan lokasi alamat penggunaan peralatan" required>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Item</label>
                            <input type="text" name="penerima_item[]" class="form-input input-penerima-item" placeholder="Nyatakan item" required>
                        </div>
                        <button type="button" class="btn-remove-row" onclick="this.parentElement.remove()">Padam Penerima</button>
                    `;

                    penerimaContainer.appendChild(newBlock);
                });
            }
        });

     
        function triggerConfirmModal() {
            const form = document.getElementById('permohonanForm');
            
            // Semak jika ada ruangan required yang belum diisi
            if (!form.checkValidity()) {
                form.reportValidity();
                return;
            }

            
            const jenisEl = document.querySelector('input[name="jenis_permohonan"]:checked');
            document.getElementById('cfm-jenis').innerText = jenisEl ? jenisEl.value : '-';

            
            const itemSelects = document.querySelectorAll('.input-nama-item');
            const qtyInputs = document.querySelectorAll('.input-kuantiti');

            let itemList = [];
            let totalQty = 0;

            itemSelects.forEach((select, idx) => {
                if (select.value) {
                    itemList.push(select.value);
                }
                const qVal = parseInt(qtyInputs[idx].value) || 0;
                totalQty += qVal;
            });

            document.getElementById('cfm-item').innerText = itemList.join(', ') || '-';
            document.getElementById('cfm-kuantiti').innerText = totalQty;

            
            const rawDate = document.getElementById('inputTarikh').value;
            if (rawDate) {
                const parts = rawDate.split('-');
                document.getElementById('cfm-tarikh').innerText = `${parts[2]}/${parts[1]}/${parts[0]}`;
            }

            
            document.getElementById('cfm-tujuan').innerText = document.getElementById('inputTujuan').value || '-';

           
            const pNama = document.querySelectorAll('.input-penerima-nama');
            const pLokasi = document.querySelectorAll('.input-penerima-lokasi');
            const pItem = document.querySelectorAll('.input-penerima-item');

            const tbody = document.getElementById('cfm-penerima-tbody');
            tbody.innerHTML = ''; 

            pNama.forEach((namaInput, idx) => {
                const namaVal = namaInput.value || '-';
                const itemVal = pItem[idx] ? (pItem[idx].value || '-') : '-';
                const lokasiVal = pLokasi[idx] ? (pLokasi[idx].value || '-') : '-';

                const tr = document.createElement('tr');
                tr.innerHTML = `
                    <td style="font-weight: 500;">${namaVal}</td>
                    <td style="font-weight: 500;">${itemVal}</td>
                    <td style="font-weight: 500; color: #475569;">${lokasiVal}</td>
                `;
                tbody.appendChild(tr);
            });

            
            document.getElementById('confirmModal').style.display = 'flex';
        }

        function closeConfirmModal() {
            document.getElementById('confirmModal').style.display = 'none';
        }

        function submitFinalForm() {
            
            document.getElementById('permohonanForm').submit();
        }

        
        window.onclick = function(event) {
            const modal = document.getElementById('confirmModal');
            if (event.target == modal) {
                modal.style.display = 'none';
            }
        }
    </script>
</body>
</html>