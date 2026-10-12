<!DOCTYPE html>
<html lang="ms">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Kelulusan Permohonan - iMohon</title>
    
    <!-- FontAwesome Icon & Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

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
            padding: 35px 40px 40px;
            width: 100%;
        }

        .page-header {
            margin-bottom: 25px;
        }

        .page-title {
            font-size: 28px;
            font-weight: bold;
            color: #111827;
            margin-bottom: 4px;
        }

        .page-subtitle {
            font-size: 14px;
            color: #6b7280;
        }

        
        .card-box {
            background: white;
            border-radius: 16px;
            padding: 25px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.03);
        }

        .custom-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 13px;
        }

        .custom-table th {
            background-color: #e0e7ff;
            color: #3730a3;
            padding: 12px 16px;
            text-align: center;
            font-weight: 600;
        }

        .custom-table td {
            padding: 14px 16px;
            color: #334155;
            text-align: center;
            border-bottom: 1px solid #f1f5f9;
        }

        
        .badge {
            padding: 4px 14px;
            border-radius: 12px;
            font-size: 11px;
            font-weight: 600;
            display: inline-block;
        }
        .badge-proses { background-color: #fef3c7; color: #b45309; }
        .badge-lulus  { background-color: #bbf7d0; color: #15803d; }
        .badge-tolak  { background-color: #fecaca; color: #b91c1c; }

        .btn-action-edit {
            color: #111;
            text-decoration: none;
            font-size: 15px;
            cursor: pointer;
            background: none;
            border: none;
        }

        .btn-action-edit:hover {
            color: #29158f;
        }

        /* popup */
        .modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(15, 23, 42, 0.5);
            backdrop-filter: blur(4px);
            display: none;
            align-items: center;
            justify-content: center;
            z-index: 1000;
        }

       
        .modal-card {
            background: #ffffff;
            border-radius: 20px;
            width: 90%;
            max-width: 820px;
            padding: 30px 35px;
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
            position: relative;
            animation: modalSlide 0.25s ease-out;
        }

        @keyframes modalSlide {
            from { transform: translateY(-20px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }

        .modal-header-title {
            font-size: 20px;
            font-weight: 700;
            color: #0f172a;
            margin-bottom: 20px;
        }

        
        .modal-info-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-bottom: 20px;
        }

        .info-box-card {
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            padding: 20px;
        }

        .info-box-title {
            font-size: 14px;
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 15px;
        }

        .info-table {
            width: 100%;
            border-collapse: collapse;
        }

        .info-table td {
            padding: 6px 0;
            font-size: 13px;
            vertical-align: top;
        }

        .info-table td.label {
            color: #64748b;
            width: 40%;
        }

        .info-table td.colon {
            width: 5%;
            color: #64748b;
        }

        .info-table td.value {
            color: #0f172a;
            font-weight: 600;
            width: 55%;
        }

        .justifikasi-section {
            margin-bottom: 25px;
        }

        .justifikasi-title {
            font-size: 14px;
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 8px;
        }

        .justifikasi-box {
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            padding: 12px 16px;
            font-size: 13px;
            color: #334155;
            min-height: 45px;
        }

        
        .modal-actions {
            display: flex;
            justify-content: flex-end;
            gap: 15px;
        }

        .btn-modal {
            padding: 10px 28px;
            border-radius: 10px;
            font-size: 14px;
            font-weight: 700;
            border: none;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: all 0.2s ease;
        }

        .btn-lulus {
            background-color: #48bb78;
            color: white;
        }

        .btn-lulus:hover {
            background-color: #38a169;
        }

        .btn-tolak {
            background-color: #e53e3e;
            color: white;
        }

        .btn-tolak:hover {
            background-color: #c53030;
        }

        .close-modal-btn {
            position: absolute;
            top: 20px;
            right: 25px;
            background: none;
            border: none;
            font-size: 24px;
            color: #94a3b8;
            cursor: pointer;
        }

        .close-modal-btn:hover { color: #334155; }
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
                <a href="{{ route('pelulus.dashboard') }}" class="nav-link {{ request()->routeIs('pelulus.dashboard') ? 'active' : '' }}">
                    <i class="fa-solid fa-house"></i>
                    <span>Laman utama</span>
                </a>
            </li>
            <li>
                <a href="{{ route('pelulus.kelulusan') }}" class="nav-link {{ request()->routeIs('pelulus.kelulusan') ? 'active' : '' }}">
                    <i class="fa-solid fa-circle-check"></i>
                    <span>Kelulusan</span>
                </a>
            </li>
            <li>
                <a href="{{ route('profile.edit') }}" class="nav-link {{ request()->routeIs('profile.*') ? 'active' : '' }}">
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

    <div class="main-wrapper">

        <!-- TOP HEADER -->
        <header class="top-header">
            <div class="user-profile">
                <span>Pelulus</span>
                <div class="user-avatar">
                    <i class="fa-solid fa-user"></i>
                </div>
            </div>
        </header>

        <!-- CONTENT BODY -->
        <main class="content-body">

            <!-- PAGE HEADER -->
            <div class="page-header">
                <h1 class="page-title">Permohonan</h1>
                <p class="page-subtitle">Senarai permohonan yang memerlukan kelulusan</p>
            </div>

            
            <div class="card-box">
                <table class="custom-table">
                    <thead>
                        <tr>
                            <th>ID Permohonan</th>
                            <th>Tarikh mohon</th>
                            <th>Pemohon</th>
                            <th>Jabatan/Unit</th>
                            <th>Item</th>
                            <th>Jenis</th>
                            <th>Status</th>
                            <th>Tindakan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($senaraiPermohonan ?? [] as $item)
                            <tr>
                                <td>{{ $item->id_permohonan ?? 'REQ'.str_pad($item->id, 3, '0', STR_PAD_LEFT) }}</td>
                                <td>{{ \Carbon\Carbon::parse($item->created_at)->format('j M Y') }}</td>
                                <td>{{ $item->user->name ?? $item->nama_pemohon ?? '-' }}</td>
                                <td>{{ $item->jabatan ?? $item->unit ?? 'STM' }}</td>
                                <td>{{ $item->nama_item ?? '-' }}</td>
                                <td>{{ $item->jenis_permohonan ?? 'Baru' }}</td>
                                <td>
                                    @if(in_array(strtolower($item->status ?? ''), ['lulus', 'terima', 'diterima']))
                                        <span class="badge badge-lulus">Lulus</span>
                                    @elseif(strtolower($item->status ?? '') == 'ditolak')
                                        <span class="badge badge-tolak">Ditolak</span>
                                    @else
                                        <span class="badge badge-proses">Menunggu</span>
                                    @endif
                                </td>
                                <td>
                                    <button class="btn-action-edit btn-view-permohonan"
                                        data-id="{{ $item->id }}"
                                        data-id-permohonan="{{ $item->id_permohonan ?? 'REQ'.str_pad($item->id, 3, '0', STR_PAD_LEFT) }}"
                                        data-nama="{{ $item->user->name ?? $item->nama_pemohon ?? 'Nur Fareeza' }}"
                                        data-ic="{{ $item->no_ic ?? $item->user->no_ic ?? '030607050088' }}"
                                        data-tel="{{ $item->no_tel ?? $item->user->no_tel ?? '0173940556' }}"
                                        data-email="{{ $item->email ?? $item->user->email ?? 'fareeza@rtm.gov.my' }}"
                                        data-tarikh="{{ \Carbon\Carbon::parse($item->created_at)->format('d/m/Y') }}"
                                        data-jenis="{{ $item->jenis_permohonan ?? 'Baru' }}"
                                        data-lokasi="{{ $item->lokasi ?? 'Aras 12, Menara Angkasapuri' }}"
                                        data-item="{{ $item->nama_item ?? 'Komputer riba' }}"
                                        data-justifikasi="{{ $item->justifikasi ?? 'Permohonan komputer riba baru' }}">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" style="text-align: center; color: #888; padding: 25px;">
                                    Tiada permohonan memerlukan kelulusan buat masa ini.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </main>

    </div>

    
    <div class="modal-overlay" id="modalButiran">
        <div class="modal-card">
            <button class="close-modal-btn" id="btnCloseModal">&times;</button>
            <h2 class="modal-header-title">Butiran permohonan</h2>

            <div class="modal-info-grid">
               
                <div class="info-box-card">
                    <div class="info-box-title">Maklumat pemohon</div>
                    <table class="info-table">
                        <tr><td class="label">Nama penuh</td><td class="colon">:</td><td class="value" id="modalNama">-</td></tr>
                        <tr><td class="label">No. kad pengenalan</td><td class="colon">:</td><td class="value" id="modalIC">-</td></tr>
                        <tr><td class="label">No. Tel</td><td class="colon">:</td><td class="value" id="modalTel">-</td></tr>
                        <tr><td class="label">Email</td><td class="colon">:</td><td class="value" id="modalEmail">-</td></tr>
                    </table>
                </div>

                
                <div class="info-box-card">
                    <div class="info-box-title">Maklumat permohonan</div>
                    <table class="info-table">
                        <tr><td class="label">ID permohonan</td><td class="colon">:</td><td class="value" id="modalIDPermohonan">-</td></tr>
                        <tr><td class="label">Tarikh mohon</td><td class="colon">:</td><td class="value" id="modalTarikh">-</td></tr>
                        <tr><td class="label">Jenis permohonan</td><td class="colon">:</td><td class="value" id="modalJenis">-</td></tr>
                        <tr><td class="label">Lokasi</td><td class="colon">:</td><td class="value" id="modalLokasi">-</td></tr>
                        <tr><td class="label">Item dimohon</td><td class="colon">:</td><td class="value" id="modalItem">-</td></tr>
                    </table>
                </div>
            </div>

          
            <div class="justifikasi-section">
                <div class="justifikasi-title">Justifikasi</div>
                <div class="justifikasi-box" id="modalJustifikasi">-</div>
            </div>

           
            <div class="modal-actions">
                <button type="button" class="btn-modal btn-lulus" id="btnProsesLulus">
                    <i class="fa-solid fa-check"></i> LULUS
                </button>
                <button type="button" class="btn-modal btn-tolak" id="btnProsesTolak">
                    <i class="fa-solid fa-xmark"></i> TOLAK
                </button>
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

            
            const modalButiran = document.getElementById('modalButiran');
            const btnCloseModal = document.getElementById('btnCloseModal');
            let selectedPermohonanId = null;
            let selectedRowTarget = null;

            // Buka Modal & Pass Data
            document.querySelectorAll('.btn-view-permohonan').forEach(btn => {
                btn.addEventListener('click', function () {
                    selectedPermohonanId = this.getAttribute('data-id');
                    selectedRowTarget = this.closest('tr');

                    document.getElementById('modalNama').innerText = this.getAttribute('data-nama');
                    document.getElementById('modalIC').innerText = this.getAttribute('data-ic');
                    document.getElementById('modalTel').innerText = this.getAttribute('data-tel');
                    document.getElementById('modalEmail').innerText = this.getAttribute('data-email');

                    document.getElementById('modalIDPermohonan').innerText = this.getAttribute('data-id-permohonan');
                    document.getElementById('modalTarikh').innerText = this.getAttribute('data-tarikh');
                    document.getElementById('modalJenis').innerText = this.getAttribute('data-jenis');
                    document.getElementById('modalLokasi').innerText = this.getAttribute('data-lokasi');
                    document.getElementById('modalItem').innerText = this.getAttribute('data-item');

                    document.getElementById('modalJustifikasi').innerText = this.getAttribute('data-justifikasi');

                    modalButiran.style.display = 'flex';
                });
            });

            // Tutup Modal
            if (btnCloseModal) {
                btnCloseModal.addEventListener('click', () => modalButiran.style.display = 'none');
            }

           
            window.addEventListener('click', (e) => {
                if (e.target === modalButiran) modalButiran.style.display = 'none';
            });

            // update guna ajax tak reload page
            function updateStatusPermohonan(status) {
                if (!selectedPermohonanId) return;

                const token = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');

                fetch(`/pelulus/kelulusan/${selectedPermohonanId}/update`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': token,
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({ status: status })
                })
                .then(res => res.json())
                .then(data => {
                    modalButiran.style.display = 'none';

                    // Kemaskini Badge pada jadual secara automatik tanpa reload page
                    if (selectedRowTarget) {
                        const statusTd = selectedRowTarget.children[6];
                        if (status === 'Lulus') {
                            statusTd.innerHTML = '<span class="badge badge-lulus">Lulus</span>';
                        } else {
                            statusTd.innerHTML = '<span class="badge badge-tolak">Ditolak</span>';
                        }
                    }
                })
                .catch(err => console.error(err));
            }

            document.getElementById('btnProsesLulus').addEventListener('click', () => updateStatusPermohonan('Lulus'));
            document.getElementById('btnProsesTolak').addEventListener('click', () => updateStatusPermohonan('Ditolak'));
        });
    </script>
</body>
</html>