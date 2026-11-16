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

        /* ALERT */
        .alert-danger {
            background-color: #fee2e2;
            border: 1px solid #fca5a5;
            color: #991b1b;
            padding: 14px 18px;
            border-radius: 12px;
            margin-bottom: 20px;
            font-size: 13.5px;
        }

        .alert-danger ul {
            margin-left: 18px;
            margin-top: 4px;
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
            border: 1px solid #e2e8f0;
            padding: 26px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.03);
        }

        .card-header-title {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 20px;
            font-size: 16px;
            font-weight: 700;
            color: #29158f;
        }

        .card-header-title i {
            font-size: 17px;
        }

        /* INPUT FIELD STYLES */
        .form-group {
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
            padding: 10px 14px;
            border: 1px solid #cbd5e1;
            border-radius: 9px;
            font-size: 13.5px;
            color: #0f172a;
            outline: none;
            background-color: #f8fafc;
            transition: border-color 0.2s, background-color 0.2s, box-shadow 0.2s;
        }

        .form-input:focus {
            border-color: #29158f;
            background-color: #ffffff;
            box-shadow: 0 0 0 3px rgba(41, 21, 143, 0.1);
        }

        .error-text {
            color: #dc2626;
            font-size: 12px;
            margin-top: 4px;
            display: block;
        }

        
        .password-wrapper {
            position: relative;
        }

        .password-wrapper .form-input {
            padding-right: 40px;
        }

        .toggle-pw {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: #64748b;
            cursor: pointer;
            font-size: 14px;
        }

        .toggle-pw:hover {
            color: #29158f;
        }

        
        .password-divider {
            border-top: 1px dashed #cbd5e1;
            margin-top: 22px;
            padding-top: 20px;
        }

        
        .bottom-actions {
            display: flex;
            justify-content: flex-end;
            gap: 14px;
            margin-top: 25px;
        }

        .btn-cancel {
            background-color: #e2e8f0;
            color: #475569;
            padding: 11px 24px;
            border-radius: 10px;
            font-weight: 600;
            font-size: 13.5px;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            transition: background 0.2s;
        }

        .btn-cancel:hover {
            background-color: #cbd5e1;
        }

        .btn-save {
            background-color: #29158f;
            color: white;
            border: none;
            padding: 11px 26px;
            border-radius: 10px;
            font-weight: 600;
            font-size: 13.5px;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: background 0.2s;
        }

        .btn-save:hover {
            background-color: #1e0e6e;
        }
    </style>
</head>
<body>

    <!-- SIDEBAR LEFT  -->
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
            <p class="page-sub">Kemaskini maklumat peribadi, pekerjaan, dan kata laluan akaun anda.</p>

            @if($errors->any())
                <div class="alert-danger">
                    <strong><i class="fa-solid fa-triangle-exclamation"></i> Sila semak semula ralat berikut:</strong>
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('patch')

                <div class="edit-grid">

                    
                    <div class="edit-card">
                        <div class="card-header-title">
                            <i class="fa-regular fa-user"></i>
                            <span>Maklumat Akaun</span>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Nama Penuh <span>*</span></label>
                            <input type="text" name="name" class="form-input" value="{{ old('name', Auth::user()->name) }}" required>
                            @error('name') <span class="error-text">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-label">No. Kad Pengenalan <span>*</span></label>
                            <input type="text" name="ic" class="form-input" value="{{ old('ic', Auth::user()->ic ?? Auth::user()->no_ic) }}">
                            @error('ic') <span class="error-text">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-label">Emel <span>*</span></label>
                            <input type="email" name="email" class="form-input" value="{{ old('email', Auth::user()->email) }}" required>
                            @error('email') <span class="error-text">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-label">No. Tel Pejabat</label>
                            <input type="text" name="no_tel_pejabat" class="form-input" placeholder="Contoh: 03-2282 5333" value="{{ old('no_tel_pejabat', Auth::user()->no_tel_pejabat) }}">
                            @error('no_tel_pejabat') <span class="error-text">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-label">No. Tel Bimbit <span>*</span></label>
                            <input type="text" name="phone" class="form-input" placeholder="Contoh: 012-3456789" value="{{ old('phone', Auth::user()->phone ?? Auth::user()->no_tel) }}">
                            @error('phone') <span class="error-text">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    
                    <div class="edit-card">
                        <div class="card-header-title">
                            <i class="fa-solid fa-briefcase"></i>
                            <span>Maklumat Pekerjaan</span>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Jawatan <span>*</span></label>
                            <input type="text" name="jawatan" class="form-input" value="{{ old('jawatan', Auth::user()->jawatan) }}">
                            @error('jawatan') <span class="error-text">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-label">Bahagian <span>*</span></label>
                            <input type="text" name="bahagian" class="form-input" value="{{ old('bahagian', Auth::user()->bahagian) }}">
                            @error('bahagian') <span class="error-text">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-label">Unit <span>*</span></label>
                            <input type="text" name="unit" class="form-input" value="{{ old('unit', Auth::user()->unit) }}">
                            @error('unit') <span class="error-text">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-label">Alamat Pejabat <span>*</span></label>
                            <input type="text" name="address" class="form-input" value="{{ old('address', Auth::user()->address) }}">
                            @error('address') <span class="error-text">{{ $message }}</span> @enderror
                        </div>

                        
                        <div class="password-divider">
                            <div class="card-header-title" style="margin-bottom: 14px;">
                                <i class="fa-solid fa-lock"></i>
                                <span>Tukar Kata Laluan (Pilihan)</span>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Kata Laluan Semasa</label>
                                <div class="password-wrapper">
                                    <input type="password" name="current_password" class="form-input" autocomplete="current-password">
                                    <button type="button" class="toggle-pw" aria-label="Papar kata laluan">
                                        <i class="fa-regular fa-eye"></i>
                                    </button>
                                </div>
                                @error('current_password') <span class="error-text">{{ $message }}</span> @enderror
                            </div>

                            <div class="form-group">
                                <label class="form-label">Kata Laluan Baharu</label>
                                <div class="password-wrapper">
                                    <input type="password" name="password" class="form-input" autocomplete="new-password">
                                    <button type="button" class="toggle-pw" aria-label="Papar kata laluan">
                                        <i class="fa-regular fa-eye"></i>
                                    </button>
                                </div>
                                @error('password') <span class="error-text">{{ $message }}</span> @enderror
                            </div>

                            <div class="form-group" style="margin-bottom: 0;">
                                <label class="form-label">Sahkan Kata Laluan Baharu</label>
                                <div class="password-wrapper">
                                    <input type="password" name="password_confirmation" class="form-input" autocomplete="new-password">
                                    <button type="button" class="toggle-pw" aria-label="Papar kata laluan">
                                        <i class="fa-regular fa-eye"></i>
                                    </button>
                                </div>
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