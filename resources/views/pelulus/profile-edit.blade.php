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
         *{
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

        /* FORM LAYOUT (2 COLUMNS) */
        .edit-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 25px;
            align-items: start;
        }

        .edit-card {
            background: white;
            border-radius: 16px;
            border: 1px solid #d1d5db;
            padding: 25px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.02);
        }

        .card-header-title {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 20px;
            font-size: 16px;
            font-weight: 700;
            color: #29158f;
        }

        .card-header-title i {
            font-size: 18px;
        }

        /* INPUT FIELD STYLES */
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

        .form-label span {
            color: #e11d48;
        }

        .form-input {
            width: 100%;
            padding: 10px 14px;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            font-size: 13px;
            color: #333;
            outline: none;
            background-color: #f8fafc;
            transition: border-color 0.2s, background-color 0.2s;
        }

        .form-input:focus {
            border-color: #29158f;
            background-color: #ffffff;
        }

        /* PASSWORD SECTION */
        .password-divider {
            border-top: 1px dashed #e2e8f0;
            margin: 25px 0 0 0;
            padding-top: 20px;
        }

        /* BOTTOM ACTION BUTTONS */
        .bottom-actions {
            display: flex;
            justify-content: flex-end;
            gap: 15px;
            margin-top: 25px;
        }

        .btn-cancel {
            background-color: #e2e8f0;
            color: #475569;
            padding: 10px 24px;
            border-radius: 8px;
            font-weight: 600;
            font-size: 13px;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
        }

        .btn-save {
            background-color: #29158f;
            color: white;
            border: none;
            padding: 10px 24px;
            border-radius: 8px;
            font-weight: 600;
            font-size: 13px;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .btn-save:hover {
            background-color: #1e0e6e;
        }
    </style>
</head>
<body>

    <!-- SIDEBAR LEFT (DINAMIK MENGIKUT ROLE) -->
    <aside class="sidebar">
        <div class="sidebar-header">
            <div class="brand-logo">
                <img src="{{ asset('images/rtmlogo.png') }}" alt="RTM Logo">
                <span class="brand-name">iMohon</span>
            </div>
            <i class="fa-solid fa-angles-left" id="toggleSidebar" style="cursor: pointer; opacity: 0.8; font-size: 18px; transition: transform 0.3s ease;"></i>
        </div>

        <ul class="nav-menu">
            @if(Auth::user()->role === 'pelulus')
                <!-- MENU PELULUS -->
                <li>
                    <a href="{{ route('pelulus.dashboard') }}" class="nav-link">
                        <i class="fa-solid fa-house"></i>
                        <span>Laman utama</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('pelulus.kelulusan') }}" class="nav-link">
                        <i class="fa-solid fa-circle-check"></i>
                        <span>Kelulusan</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('pelulus.profile.user') }}" class="nav-link active">
                        <i class="fa-solid fa-user"></i>
                        <span>Profil</span>
                    </a>
                </li>

            @elseif(Auth::user()->role === 'admin')
                <!-- MENU ADMIN -->
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

            @else
                <!-- MENU PEMOHON -->
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
            @endif

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

        <!-- MAIN CONTENT -->
        <main class="content-body">

            <h1 class="page-title">Edit Profil</h1>
            <p class="page-sub">Kemaskini maklumat peribadi anda di sini.</p>

            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('patch')

                <div class="edit-grid">

                    <!-- MAKLUMAT AKAUN -->
                    <div class="edit-card">
                        <div class="card-header-title">
                            <i class="fa-regular fa-user"></i>
                            <span>Maklumat Akaun</span>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Nama Penuh <span>*</span></label>
                            <input type="text" name="name" class="form-input" value="{{ old('name', Auth::user()->name) }}" required>
                        </div>

                        <div class="form-group">
                            <label class="form-label">No. Kad Pengenalan <span>*</span></label>
                            <input type="text" name="ic" class="form-input" value="{{ old('ic', Auth::user()->ic ?? Auth::user()->no_ic) }}">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Emel <span>*</span></label>
                            <input type="email" name="email" class="form-input" value="{{ old('email', Auth::user()->email) }}" required>
                        </div>

                        <div class="form-group">
                            <label class="form-label">No. Telefon <span>*</span></label>
                            <input type="text" name="phone" class="form-input" value="{{ old('phone', Auth::user()->phone ?? Auth::user()->no_tel) }}">
                        </div>
                    </div>

                    <!-- MAKLUMAT PEKERJAAN -->
                    <div class="edit-card">
                        <div class="card-header-title">
                            <i class="fa-solid fa-briefcase"></i>
                            <span>Maklumat Pekerjaan</span>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Jawatan <span>*</span></label>
                            <input name="jawatan" class="form-input" value="{{ old('jawatan', Auth::user()->jawatan) }}">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Bahagian <span>*</span></label>
                            <input name="bahagian" class="form-input" value="{{ old('bahagian', Auth::user()->bahagian) }}">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Unit <span>*</span></label>
                            <input name="unit" class="form-input" value="{{ old('unit', Auth::user()->unit) }}">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Alamat Pejabat <span>*</span></label>
                            <input name="address" class="form-input" value="{{ old('address', Auth::user()->address) }}">
                        </div>

                        <!-- TUKAR PASSWORD -->
                        <div class="password-divider">
                            <div class="card-header-title" style="margin-bottom: 12px;">
                                <i class="fa-solid fa-lock"></i>
                                <span>Tukar Kata Laluan</span>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Kata Laluan Semasa</label>
                                <input type="password" name="current_password" class="form-input" autocomplete="current-password">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Kata Laluan Baharu</label>
                                <input type="password" name="password" class="form-input" autocomplete="new-password">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Sahkan Kata Laluan Baharu</label>
                                <input type="password" name="password_confirmation" class="form-input" autocomplete="new-password">
                            </div>
                        </div>
                    </div>

                </div>

                <div class="bottom-actions">
                    @if(Auth::user()->role === 'pelulus')
                        <a href="{{ route('pelulus.profile.user') }}" class="btn-cancel">Batal</a>
                    @else
                        <a href="{{ route('profile.user') }}" class="btn-cancel">Batal</a>
                    @endif

                    <button type="submit" class="btn-save">
                        <i class="fa-solid fa-floppy-disk"></i> Simpan Perubahan
                    </button>
                </div>

            </form>

        </main>

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