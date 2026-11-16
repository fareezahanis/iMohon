<!DOCTYPE html>
<html lang="ms">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profil - iMohon</title>

    <!-- FontAwesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!DOCTYPE html>
<html lang="ms">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profil - iMohon</title>

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

        .header-row {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
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

        .btn-back {
            background-color: white;
            color: #334155;
            border: 1px solid #cbd5e1;
            padding: 9px 16px;
            border-radius: 10px;
            font-size: 13px;
            font-weight: 600;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: all 0.2s;
        }

        .btn-back:hover {
            background-color: #f8fafc;
            border-color: #94a3b8;
            color: #0f172a;
        }

        /* ALERT BANNER */
        .alert-success {
            background-color: #dcfce7;
            border: 1px solid #86efac;
            color: #166534;
            padding: 12px 18px;
            border-radius: 12px;
            font-size: 13.5px;
            font-weight: 600;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        /* FORM LAYOUT (2 COLUMNS) */
        .edit-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 24px;
            align-items: start;
        }

        @media (max-width: 900px) {
            .edit-grid {
                grid-template-columns: 1fr;
            }
        }

        .edit-card {
            background: white;
            border-radius: 16px;
            padding: 28px 30px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.04);
            border-top: 4px solid #29158f;
        }

        .card-header-box {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 22px;
            padding-bottom: 14px;
            border-bottom: 1px solid #f1f5f9;
        }

        .card-header-icon {
            width: 38px;
            height: 38px;
            border-radius: 10px;
            background-color: #eef2ff;
            color: #29158f;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
        }

        .card-header-title {
            font-size: 17px;
            font-weight: 700;
            color: #0f172a;
        }

        .form-group {
            margin-bottom: 16px;
        }

        .form-row-2 {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 14px;
            margin-bottom: 16px;
        }

        .form-label {
            display: block;
            font-size: 13px;
            font-weight: 600;
            color: #334155;
            margin-bottom: 6px;
        }

        .form-label span {
            color: #e11d48;
        }

        .form-input {
            width: 100%;
            padding: 10px 14px !important;
            border: 1px solid #cbd5e1 !important;
            border-radius: 10px !important;
            font-size: 13.5px;
            color: #0f172a;
            outline: none !important;
            box-shadow: none !important;
            background-color: #f8fafc;
            transition: border-color 0.2s, background-color 0.2s, box-shadow 0.2s;
        }

        .form-input:focus {
            border-color: #29158f !important;
            background-color: #ffffff;
            box-shadow: 0 0 0 3px rgba(41, 21, 143, 0.12) !important;
        }

        .error-text {
            color: #dc2626;
            font-size: 12px;
            margin-top: 4px;
            display: block;
        }

        
        .password-divider {
            border-top: 1px dashed #e2e8f0;
            margin-top: 22px;
            padding-top: 20px;
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
        }

        .password-btn {
            border: 1px solid #29158f;
            background: #eef2ff;
            color: #29158f;
            padding: 9px 16px;
            border-radius: 9px;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: all 0.2s;
        }

        .password-btn:hover {
            background: #29158f;
            color: white;
        }

        
        .bottom-actions {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            gap: 12px;
            margin-top: 24px;
        }

        .btn-save {
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

        .btn-save:hover {
            background-color: #1e0b75;
            transform: translateY(-1px);
        }

        /* MODAL OVERLAY */
        .modal-overlay {
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
                <a href="{{ route('dashboard') }}" class="nav-link">
                    <i class="fa-solid fa-house"></i>
                    <span>Laman utama</span>
                </a>
            </li>
            <li>
                <a href="{{ route('profile.user') }}" class="nav-link active">
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

            <div class="header-row">
                <div>
                    <h1 class="page-title">Edit Profil</h1>
                    <p class="page-sub">Kemaskini maklumat peribadi serta maklumat penempatan tugas anda di sini</p>
                </div>

                <a href="{{ route('profile.user') }}" class="btn-back">
                    <i class="fa-solid fa-arrow-left"></i> Kembali ke Profil
                </a>
            </div>

            @if(session('status') === 'profile-updated' || session('status') === 'password-updated' || session('success'))
                <div class="alert-success">
                    <i class="fa-solid fa-circle-check"></i>
                    <span>{{ session('success') ?? 'Maklumat akaun anda telah berjaya dikemaskini.' }}</span>
                </div>
            @endif

            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('patch')

                <div class="edit-grid">

                    <!-- MAKLUMAT AKAUN -->
                    <div class="edit-card">
                        <div class="card-header-box">
                            <div class="card-header-icon">
                                <i class="fa-solid fa-id-card"></i>
                            </div>
                            <span class="card-header-title">Maklumat Akaun</span>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Nama Penuh <span>*</span></label>
                            <input type="text" name="name" class="form-input" required value="{{ old('name', Auth::user()->name) }}">
                            @error('name') <span class="error-text">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-label">No. Kad Pengenalan <span>*</span></label>
                            <input type="text" name="ic" class="form-input" required value="{{ old('ic', Auth::user()->ic) }}">
                            @error('ic') <span class="error-text">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-label">Emel <span>*</span></label>
                            <input type="email" name="email" class="form-input" required value="{{ old('email', Auth::user()->email) }}">
                            @error('email') <span class="error-text">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group" style="margin-bottom: 0;">
                            <label class="form-label">No. Telefon Bimbit <span>*</span></label>
                            <input type="text" name="phone" class="form-input" required value="{{ old('phone', Auth::user()->phone) }}">
                            @error('phone') <span class="error-text">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <!-- MAKLUMAT PEKERJAAN -->
                    <div class="edit-card" style="border-top-color: #10b981;">
                        <div class="card-header-box">
                            <div class="card-header-icon" style="background-color: #ecfdf5; color: #10b981;">
                                <i class="fa-solid fa-briefcase"></i>
                            </div>
                            <span class="card-header-title">Maklumat Pekerjaan</span>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Jawatan <span>*</span></label>
                            <input type="text" name="jawatan" class="form-input" required value="{{ old('jawatan', Auth::user()->jawatan) }}">
                            @error('jawatan') <span class="error-text">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-label">Bahagian <span>*</span></label>
                            <input type="text" name="bahagian" class="form-input" required value="{{ old('bahagian', Auth::user()->bahagian) }}">
                            @error('bahagian') <span class="error-text">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-row-2">
                            <div>
                                <label class="form-label">Unit <span>*</span></label>
                                <input type="text" name="unit" class="form-input" required value="{{ old('unit', Auth::user()->unit) }}">
                                @error('unit') <span class="error-text">{{ $message }}</span> @enderror
                            </div>

                            <div>
                                <label class="form-label">No. Tel Pejabat <span>*</span></label>
                                <input type="text" name="no_tel_pejabat" class="form-input" required placeholder="Contoh: 03-2282 5333" value="{{ old('no_tel_pejabat', Auth::user()->no_tel_pejabat) }}">
                                @error('no_tel_pejabat') <span class="error-text">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="form-group" style="margin-bottom: 0;">
                            <label class="form-label">Alamat Pejabat <span>*</span></label>
                            <input type="text" name="address" class="form-input" required value="{{ old('address', Auth::user()->address) }}">
                            @error('address') <span class="error-text">{{ $message }}</span> @enderror
                        </div>

                        <!-- TUKAR PASSWORD -->
                        <div class="password-divider">
                            <div>
                                <div style="font-size: 13.5px; font-weight: 700; color: #0f172a;">Keselamatan Akaun</div>
                                <div style="font-size: 12px; color: #64748b;">Tukar kata laluan log masuk anda secara berkala</div>
                            </div>
                            <button type="button" class="password-btn" id="openPasswordModalBtn">
                                <i class="fa-solid fa-key"></i> Kemaskini Kata Laluan
                            </button>
                        </div>
                    </div>

                </div>

                <div class="bottom-actions">
                    <a href="{{ route('profile.user') }}" class="btn-back">Batal</a>
                    <button type="submit" class="btn-save">
                        <i class="fa-solid fa-floppy-disk"></i> Simpan Perubahan
                    </button>
                </div>

            </form>

        </main>

    </div>

    <!-- MODAL POPUP: TUKAR KATA LALUAN -->
    <div id="passwordModal" class="modal-overlay">
        <div style="background: white; border-radius: 18px; width: 92%; max-width: 440px; padding: 28px 30px; position: relative; box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.15);">

            <span id="closePasswordModalBtn" style="position: absolute; right: 22px; top: 18px; cursor: pointer; font-size: 20px; color: #94a3b8;">
                <i class="fa-solid fa-xmark"></i>
            </span>

            <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 20px;">
                <div style="background: #eef2ff; color: #29158f; width: 42px; height: 42px; border-radius: 11px; display: flex; align-items: center; justify-content: center; font-size: 18px;">
                    <i class="fa-solid fa-lock"></i>
                </div>
                <div>
                    <h2 style="font-size: 17px; font-weight: bold; color: #0f172a; margin: 0;">Kemaskini Kata Laluan</h2>
                    <p style="font-size: 12px; color: #64748b; margin: 2px 0 0 0;">Masukkan kata laluan semasa dan kata laluan baharu</p>
                </div>
            </div>

            <form method="POST" action="{{ route('password.update') }}">
                @csrf
                @method('put')

                <div class="form-group">
                    <label class="form-label">Kata Laluan Semasa <span>*</span></label>
                    <input type="password" name="current_password" class="form-input" required placeholder="Masukkan kata laluan semasa">
                </div>

                <div class="form-group">
                    <label class="form-label">Kata Laluan Baharu <span>*</span></label>
                    <input type="password" name="password" class="form-input" required placeholder="Minimum 8 aksara">
                </div>

                <div class="form-group" style="margin-bottom: 20px;">
                    <label class="form-label">Sahkan Kata Laluan Baharu <span>*</span></label>
                    <input type="password" name="password_confirmation" class="form-input" required placeholder="Ulang kata laluan baharu">
                </div>

                <div style="display: flex; justify-content: flex-end; gap: 10px;">
                    <button type="button" id="cancelPasswordModalBtn" class="btn-back">Batal</button>
                    <button type="submit" class="btn-save">Simpan Kata Laluan</button>
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
        });
    </script>
</body>
</html>