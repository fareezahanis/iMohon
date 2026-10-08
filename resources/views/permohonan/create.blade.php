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
            color: #111;
        }

        .page-sub {
            color: #666;
            font-size: 14px;
            margin-bottom: 25px;
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1.3fr;
            gap: 25px;
            align-items: start;
        }

        .form-card {
            background: white;
            border-radius: 16px;
            border: 1px solid #d1d5db;
            padding: 25px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.02);
        }

        .card-header-step {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 20px;
        }

        .step-number {
            width: 28px;
            height: 28px;
            background-color: #29158f;
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 14px;
        }

        .step-title {
            font-size: 16px;
            font-weight: 700;
            color: #29158f;
        }

        /* INPUT STYLES */
        .form-group {
            margin-bottom: 16px;
        }

        .form-label {
            display: block;
            font-size: 13px;
            font-weight: 600;
            color: #333;
            margin-bottom: 6px;
        }

        .form-input, .form-select, .form-textarea {
            width: 100%;
            padding: 10px 14px;
            border: 1px solid #94a3b8;
            border-radius: 8px;
            font-size: 13px;
            color: #333;
            outline: none;
            transition: border-color 0.2s;
        }

        .form-input:focus, .form-select:focus, .form-textarea:focus {
            border-color: #29158f;
        }

        /* RADIO BUTTONS */
        .radio-group {
            display: flex;
            gap: 30px;
            align-items: center;
            margin-top: 5px;
        }

        .radio-label {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 14px;
            cursor: pointer;
        }

        /* ITEM & KUANTITI GRID */
        .item-qty-grid {
            display: grid;
            grid-template-columns: 1fr 80px;
            gap: 15px;
            align-items: flex-start;
        }

        /* button tambah penerima & item */
        .btn-small {
            background: #e2e8f0;
            color: #475569;
            border: none;
            padding: 4px 10px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 11px;
            font-weight: 600;
            margin-top: 6px;
            display: inline-block;
        }

        .btn-small:hover {
            background: #cbd5e1;
        }

        .btn-remove-row {
            background: #ef4444;
            color: white;
            border: none;
            padding: 4px 8px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 11px;
            margin-top: 4px;
            display: inline-block;
        }

        /* PENERIMA SECTION */
        .penerima-block {
            border-bottom: 1px dashed #cbd5e1;
            padding-bottom: 15px;
            margin-bottom: 15px;
        }

        .penerima-block:last-child {
            border-bottom: none;
            padding-bottom: 0;
            margin-bottom: 0;
        }

        /* submit button */
        .btn-container {
            display: flex;
            justify-content: flex-end;
            margin-top: 20px;
        }

        .submit-btn {
            background-color: #29158f;
            color: white;
            border: none;
            padding: 10px 24px;
            border-radius: 8px;
            font-weight: 600;
            font-size: 13px;
            cursor: pointer;
            transition: background 0.2s;
        }

        .submit-btn:hover {
            background-color: #1e0e6e;
        }

        /* popup confirmation */
        .modal {
            display: none;
            position: fixed;
            z-index: 99999;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.4);
            align-items: center;
            justify-content: center;
        }

        .modal-content-confirm {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 16px;
            width: 90%;
            max-width: 650px;
            position: relative;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            animation: popupAnimation 0.3s ease-out;
        }

        @keyframes popupAnimation {
            from { transform: scale(0.9); opacity: 0; }
            to { transform: scale(1); opacity: 1; }
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

        /* arahan confirmation */
        .confirm-banner {
            background-color: #fef3c7;
            color: #92400e;
            padding: 10px 16px;
            border-radius: 6px;
            font-size: 13px;
            font-weight: 500;
            margin-bottom: 20px;
            display: inline-block;
        }

    
        .confirm-box {
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            margin-bottom: 20px;
            overflow: hidden;
        }
        
        .confirm-table-wrapper {
         max-height: 200px; 
        overflow-y: auto;  /* scrollbar */
        }

        .confirm-box-header {
            background-color: #f8fafc;
            padding: 12px 20px;
            font-size: 14px;
            font-weight: 600;
            color: #29158f;
            border-bottom: 1px solid #e2e8f0;
        }

        .confirm-box-body {
            padding: 16px 20px;
        }

        .confirm-grid-2 {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px 30px;
            font-size: 13px;
        }

        .confirm-row {
            display: flex;
            align-items: flex-start;
        }

        .confirm-row .lbl {
            width: 130px;
            color: #475569;
            font-weight: 500;
            flex-shrink: 0;
        }

        .confirm-row .val {
            color: #1e1b4b;
            font-weight: 600;
        }

        /* table penerima */
        .confirm-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 13px;
        }

        .confirm-table th {
            background-color: #f1f5f9;
            color: #475569;
            font-weight: 600;
            padding: 10px 14px;
            text-align: left;
        }

        .confirm-table td {
            padding: 12px 14px;
            color: #1e1b4b;
            border-top: 1px solid #f1f5f9;
        }

        /* btn sah */
        .btn-sahkan {
            background-color: #0d0680;
            color: white;
            border: none;
            padding: 12px 28px;
            border-radius: 8px;
            font-weight: 700;
            font-size: 13.5px;
            cursor: pointer;
            transition: background 0.2s;
        }

        .btn-sahkan:hover {
            background-color: #07034c;
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

        <!-- TOP HEADER -->
        <header class="top-header">
            <div class="user-profile">
                <span>{{ Auth::user()->name }}</span>
                <div class="user-avatar">
                    <i class="fa-solid fa-user"></i>
                </div>
            </div>
        </header>

        <!-- CONTENT BODY -->
        <main class="content-body">

            <h1 class="page-title">Permohonan</h1>
            <p class="page-sub">Borang permohonan peralatan ICT</p>

            <form id="permohonanForm" action="{{ route('permohonan.store') }}" method="POST">
                @csrf

                <div class="form-grid">

                    <!-- KAD 1: MAKLUMAT PEMOHON (AUTO-FILL DATA USER) -->
                    <div class="form-card">
                        <div class="card-header-step">
                            <div class="step-number">1</div>
                            <div class="step-title">Maklumat Pemohon</div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Nama pemohon</label>
                            <input type="text" class="form-input" value="{{ Auth::user()->name }}" readonly style="background-color: #f8fafc;">
                        </div>

                        <div class="form-group">
                            <label class="form-label">No. Tel Pej</label>
                            <input type="text" class="form-input"  style="background-color: #f8fafc;">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Jawatan</label>
                            <input type="text" class="form-input" value="{{ Auth::user()->jawatan  }}" readonly style="background-color: #f8fafc;">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Unit</label>
                            <input type="text" class="form-input" value="{{ Auth::user()->unit }}" readonly style="background-color: #f8fafc;">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-input" value="{{ Auth::user()->email }}" readonly style="background-color: #f8fafc;">
                        </div>

                        <div class="form-group">
                            <label class="form-label">No. Tel Hp</label>
                            <input type="text" class="form-input" value="{{ Auth::user()->phone  }}" readonly style="background-color: #f8fafc;">
                        </div>
                    </div>

                    <!-- KAD 2: MAKLUMAT PERMOHONAN -->
                    <div class="form-card">
                        <div class="card-header-step">
                            <div class="step-number">2</div>
                            <div class="step-title">Maklumat Permohonan</div>
                        </div>

                        <!-- JENIS PERMOHONAN -->
                        <div class="form-group">
                            <label class="form-label">Jenis permohonan</label>
                            <div class="radio-group">
                                <label class="radio-label">
                                    <input type="radio" name="jenis_permohonan" value="Baru" checked> Baru
                                </label>
                                <label class="radio-label">
                                    <input type="radio" name="jenis_permohonan" value="Ganti"> Ganti
                                </label>
                            </div>
                        </div>

                        <!-- ITEM & KUANTITI -->
                        <div class="form-group">
                            <div id="items-container">
                                <div class="item-qty-grid item-row" style="margin-bottom: 8px;">
                                    <div>
                                        <label class="form-label">Item/Peralatan</label>
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
                                        <label class="form-label">Kuantiti</label>
                                        <input type="number" name="kuantiti[]" class="form-input input-kuantiti" value="1" min="1" required>
                                    </div>
                                </div>
                            </div>
                            
                            <button type="button" class="btn-small" id="addItemBtn">Tambah Item</button>
                        </div>

                        <!-- TARIKH -->
                        <div class="form-group" style="margin-top: 15px;">
                            <label class="form-label">Tarikh</label>
                            <input type="date" name="tarikh_mohon" id="inputTarikh" class="form-input" value="{{ date('Y-m-d') }}" required>
                        </div>

                        <!-- TUJUAN / JUSTIFIKASI -->
                        <div class="form-group">
                            <label class="form-label">Tujuan/justifikasi</label>
                            <textarea name="tujuan" id="inputTujuan" class="form-textarea" rows="3" placeholder="Nyatakan tujuan permohonan ini" required></textarea>
                        </div>

                        <!-- SENARAI PENERIMA -->
                        <div id="penerima-container">
                            <div class="penerima-block">
                                <div class="form-group">
                                    <label class="form-label label-penerima">Nama penerima 1</label>
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
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="button" class="btn-small" id="addPenerimaBtn">Tambah penerima</button>
                        </div>

                        <!-- button tu open popup -->
                        <div class="btn-container">
                            <button type="button" class="submit-btn" onclick="triggerConfirmModal()">Hantar permohonan</button>
                        </div>

                    </div>

                </div>

            </form>

        </main>

    </div>

    <!--popup confirmation -->
    <div id="confirmModal" class="modal">
        <div class="modal-content-confirm">
            <span class="close-btn" onclick="closeConfirmModal()">&times;</span>

            <!-- arahan -->
            <div class="confirm-banner">
                Sila semak permohonan anda sebelum dihantar.
            </div>

            <!-- KOTAK 1: MAKLUMAT PERMOHONAN -->
            <div class="confirm-box">
                <div class="confirm-box-header">
                    Maklumat permohonan
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
                                <span class="val">: <span id="cfm-item">Komputer riba, printer</span></span>
                            </div>
                            <div class="confirm-row" style="margin-bottom: 8px;">
                                <span class="lbl">Kuantiti</span>
                                <span class="val">: <span id="cfm-kuantiti">2</span></span>
                            </div>
                            <div class="confirm-row">
                                <span class="lbl">Tarikh</span>
                                <span class="val">: <span id="cfm-tarikh">15/09/2026</span></span>
                            </div>
                        </div>

                        <div>
                            <div class="confirm-row">
                                <span class="lbl">Tujuan</span>
                                <span class="val">: <span id="cfm-tujuan">Permohonan baru</span></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- KOTAK 2: SENARAI NAMA PENERIMA & ITEM -->
            <div class="confirm-box" style="margin-bottom: 25px;">
                <div class="confirm-box-header">
                    Senarai nama penerima & item
                </div>
                <div class="confirm-table-wrapper" style="padding: 10px 15px;">
                     <table class="confirm-table">
                     <thead>
                        <tr>
                            <th style="width: 30%;">Nama</th>
                            <th style="width: 35%;">Item</th>
                            <th style="width: 35%;">Alamat</th>
                        </tr>
                    </thead>
                    <tbody id="cfm-penerima-tbody">
              
                    </tbody>
                    </table>
                </div>
            </div>

            <!-- btn sah -->
            <div style="display: flex; justify-content: flex-end;">
                <button type="button" class="btn-sahkan" onclick="submitFinalForm()">Sahkan & Hantar</button>
            </div>
        </div>
    </div>

    <!-- js -->
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

            // 2. Tambah Item Dinamik
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

            // 3. Tambah Penerima Dinamik
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

        // =========================================================
        // FUNGSI POPUP PENGESAHAN (CONFIRMATION MODAL)
        // =========================================================
        function triggerConfirmModal() {
            const form = document.getElementById('permohonanForm');
            
            // Semak jika ada ruangan required yang belum diisi
            if (!form.checkValidity()) {
                form.reportValidity();
                return;
            }

            // 1. Ambil Jenis Permohonan
            const jenisEl = document.querySelector('input[name="jenis_permohonan"]:checked');
            document.getElementById('cfm-jenis').innerText = jenisEl ? jenisEl.value : '-';

            // 2. Ambil Senarai Item & Kuantiti
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

            // 3. Ambil Tarikh (Format DD/MM/YYYY)
            const rawDate = document.getElementById('inputTarikh').value;
            if (rawDate) {
                const parts = rawDate.split('-');
                document.getElementById('cfm-tarikh').innerText = `${parts[2]}/${parts[1]}/${parts[0]}`;
            }

            // 4. Ambil Tujuan
            document.getElementById('cfm-tujuan').innerText = document.getElementById('inputTujuan').value || '-';

            // 5. Bina Jadual Senarai Penerima Dalam Modal
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

            // Paparkan Modal Pengesahan
            document.getElementById('confirmModal').style.display = 'flex';
        }

        function closeConfirmModal() {
            document.getElementById('confirmModal').style.display = 'none';
        }

        function submitFinalForm() {
            // Hantar borang secara rasmi ke Laravel Controller
            document.getElementById('permohonanForm').submit();
        }

        // Tutup jika pengguna klik di luar kawasan modal
        window.onclick = function(event) {
            const modal = document.getElementById('confirmModal');
            if (event.target == modal) {
                modal.style.display = 'none';
            }
        }
    </script>
</body>
</html>