<?php

namespace App\Http\Controllers;

use App\Models\Peralatan;
use App\Models\Permohonan;
use App\Models\Vendor;
use App\Models\User;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function dashboard()
    {
        // DITERIMA PELULUS: Mengira permohonan yang telah diluluskan/disokong oleh Pelulus
        $permohonanBaru = Permohonan::count();

        // DALAM PROSES: Mengira permohonan yang masih belum diproses
        $dalamProses = Permohonan::where(function ($q) {
            $q->whereNull('status')
              ->orWhere('status', '')
              ->orWhere('status', 'Dalam Proses');
        })->count();

        // DITERIMA ADMIN: Mengira permohonan yang telah diterima akhir oleh Admin
        $diterima = Permohonan::whereIn('status', ['Diterima', 'Lulus', 'Terima'])->count();

        // DITOLAK
        $ditolak = Permohonan::where('status', 'Ditolak')->count();

        $permohonanTerkini = Permohonan::latest()->take(5)->get();

        $inventoriKuantiti = Peralatan::select('kategori', DB::raw('SUM(jumlah) as total_kuantiti'))
            ->groupBy('kategori')
            ->pluck('total_kuantiti', 'kategori');

        $jumlahInventori = Peralatan::sum('jumlah');

        return view('admin.dashboard', compact(
            'permohonanBaru',
            'dalamProses',
            'diterima',
            'ditolak',
            'permohonanTerkini',
            'jumlahInventori',
            'inventoriKuantiti'
        ));
    }

    public function inventori()
    {
        $jumlahPeralatan = Peralatan::sum('jumlah');
        $tersedia        = Peralatan::sum('tersedia');
        $diagih          = Peralatan::sum('diagih');

        
        $inventori = Peralatan::with('vendors')->latest()->get();
        $vendors   = Vendor::all();

        return view('admin.inventori', compact(
            'jumlahPeralatan',
            'tersedia',
            'diagih',
            'inventori',
            'vendors'
        ));
    }

    public function storeInventori(Request $request)
    {
        $request->validate([
            'nama_peralatan'        => 'required|string|max:255',
            'no_siri'               => 'nullable|string',
            'kategori'              => 'required|string',
            'vendors'               => 'required|array|min:1',
            'vendors.*.id'          => 'required|exists:vendors,id',
            'vendors.*.jumlah_unit' => 'required|integer|min:1',
            'jumlah'                => 'required|integer|min:0',
            'tersedia'              => 'required|integer|min:0',
            'diagih'                => 'required|integer|min:0',
        ]);

        $peralatan = Peralatan::create([
            'nama_peralatan' => $request->nama_peralatan,
            'no_siri'        => $request->no_siri,
            'kategori'       => $request->kategori,
            'jumlah'         => $request->jumlah,
            'tersedia'       => $request->tersedia,
            'diagih'         => $request->diagih,
        ]);

        $attachData = [];
        foreach ($request->vendors as $v) {
            if (!empty($v['id'])) {
                $attachData[$v['id']] = [
                    'jumlah_unit' => $v['jumlah_unit'] ?? 0
                ];
            }
        }

        if (!empty($attachData)) {
            $peralatan->vendors()->attach($attachData);

            // yolak unit yang didaftarkan ke inventori daripada baki vendor
            foreach ($attachData as $vendorId => $pivotData) {
                $vendor = Vendor::find($vendorId);
                if ($vendor) {
                    $unitDitambah = (int) ($pivotData['jumlah_unit'] ?? 0);
                    $vendor->jumlah_peralatan = max(0, ($vendor->jumlah_peralatan ?? 0) + $unitDitambah);
                    $vendor->save();
                }
            }
        }
        foreach ($attachData as $vendorId => $pivotData) {
    $vendor = Vendor::with('peralatans')->find($vendorId);
    if ($vendor) {
        $vendor->jumlah_peralatan = $vendor->peralatans->sum(fn($p) => (int) ($p->pivot->jumlah_unit ?? 0));
        $vendor->save();
    }
}

        return redirect()->back()->with('success', 'Peralatan baharu berjaya disimpan!');
    }

   public function destroyInventori($id)
{
    $inventori = Peralatan::with('vendors')->findOrFail($id);

    // 1. Simpan senarai ID vendor sebelum hubungan diputuskan (detach)
    $vendorIds = $inventori->vendors->pluck('id')->toArray();

    // 2. Putuskan pautan pivot dan padam peralatan
    $inventori->vendors()->detach();
    $inventori->delete();

    // 3. Kira semula jumlah_peralatan sebenar setiap vendor terlibat supaya selari dengan rekod inventori
    foreach ($vendorIds as $vendorId) {
        $vendor = Vendor::with('peralatans')->find($vendorId);
        if ($vendor) {
            $vendor->jumlah_peralatan = $vendor->peralatans->sum(function ($p) {
                return (int) ($p->pivot->jumlah_unit ?? 0);
            });
            $vendor->save();
        }
    }

    return redirect()->back()->with('success', 'Peralatan berjaya dipadam!');
}

   public function vendor(Request $request)
{
    $query = Vendor::with('peralatans');

    if ($request->filled('search')) {
        $search = $request->search;
        $query->where(function ($q) use ($search) {
            $q->where('nama_vendor', 'like', "%{$search}%")
              ->orWhere('no_kontrak', 'like', "%{$search}%")
              ->orWhere('pic_kontrak', 'like', "%{$search}%");
        });
    }

    $vendors = $query->latest()->get();

    // Kira jumlah unit sebenar setiap vendor supaya 100% sama dengan jadual dalam popup
    foreach ($vendors as $v) {
        $v->jumlah_peralatan = $v->peralatans->sum(function ($p) {
            return (int) ($p->pivot->jumlah_unit ?? 0);
        });
    }

    $jumlahVendor  = $vendors->count();
    $jumlahKontrak = $vendors->count();
    $jumlahItem    = $vendors->sum('jumlah_peralatan');

    return view('admin.vendor', compact(
        'vendors',
        'jumlahVendor',
        'jumlahKontrak',
        'jumlahItem'
    ));
}

    public function storeVendor(Request $request)
    {
        // Semak input dari borang
        $request->validate([
            'nama_vendor'      => 'required|string|max:255',
            'no_kontrak'       => 'required|string|max:100',
            'pic_kontrak'      => 'nullable|string',
            'pemilik_kontrak'  => 'nullable|string',
            'nilai_kontrak'    => 'nullable|numeric',
            'tarikh_mula'      => 'required|date',
            'tarikh_tamat'     => 'required|date',
            'jumlah_peralatan' => 'required|integer|min:0',
        ]);

        // Simpan dalam pangkalan data
        Vendor::create([
            'nama_vendor'      => $request->nama_vendor,
            'no_kontrak'       => $request->no_kontrak,
            'pic_kontrak'      => $request->pic_kontrak ?? 'Akan dikemaskini',
            'pemilik_kontrak'  => $request->pemilik_kontrak ?? 'Kementerian Komunikasi',
            'nilai_kontrak'    => $request->nilai_kontrak ?? 0,
            'tarikh_mula'      => $request->tarikh_mula,
            'tarikh_tamat'     => $request->tarikh_tamat,
            'jumlah_peralatan' => $request->jumlah_peralatan,
        ]);

        return redirect()->route('admin.vendor')->with('success', 'Vendor & Kontrak berjaya disimpan!');
    }

    public function destroyVendor($id)
    {
        $vendor = Vendor::findOrFail($id);
        $vendor->delete();

        return redirect()->back()->with('success', 'Vendor berjaya dipadam!');
    }

    public function pengguna(Request $request)
    {
        $query = User::query();

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('ic', 'like', "%{$search}%");
            });
        }

        // Ambil data
        $users = $query->latest()->get();

        // Hantar sebagai 'users' ke Blade
        return view('admin.pengguna', compact('users'));
    }

    // Simpan Data Pengguna Baharu
    public function storePengguna(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|string|email|max:255|unique:users,email',
            'role'     => 'required|string',
            'password' => 'required|string|min:6',
        ]);

        User::create([
            'name'     => $request->name,
            'ic'       => $request->ic,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'phone'    => $request->phone,
            'unit'     => $request->unit,
            'jawatan'  => $request->jawatan,
            'bahagian' => $request->bahagian,
            'address'  => $request->address,
            'role'     => $request->role ?? 'pengguna',
        ]);

        return redirect()->back()->with('success', 'Pengguna baharu berjaya disimpan!');
    }

    public function updateRolePengguna(Request $request, $id)
    {
        $request->validate([
            'role' => 'required|string|in:pengguna,pelulus,admin',
        ]);

        $user = User::findOrFail($id);
        $user->role = $request->role;
        $user->save();

        return redirect()->back()->with('success', 'Peranan pengguna berjaya dikemaskini!');
    }

    public function kelulusan()
    {
        // Ambil semua permohonan berserta perhubungan user
        $permohonan = Permohonan::with('user')->latest()->get();

        return view('admin.kelulusan', compact('permohonan'));
    }

    public function updateStatus(Request $request, $id)
    {
        $permohonan = Permohonan::findOrFail($id);

        if ($request->status == 'Lulus' || $request->status == 'Diterima' || $request->status == 'Terima') {
            $permohonan->status = 'Diterima';
        } elseif ($request->status == 'Ditolak') {
            $permohonan->status = 'Ditolak';
        } else {
            $permohonan->status = $request->status;
        }

        if ($request->filled('sebab_penolakan')) {
            $permohonan->sebab_penolakan = $request->sebab_penolakan;
        }

        $permohonan->save();

        return redirect()->back()->with('success', 'Status permohonan berjaya dikemaskini!');
    }

    public function rekodPeminjaman(Request $request)
    {
        // Hanya ambil permohonan yang telah Diterima / Lulus oleh pelulus/admin
        $query = Permohonan::whereIn('status', ['Diterima', 'Lulus']);

        // Filter carian (search)
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('nama_pemohon', 'like', "%{$search}%")
                  ->orWhere('nama_item', 'like', "%{$search}%")
                  ->orWhere('no_siri', 'like', "%{$search}%");
            });
        }

        // Filter mengikut status_penempatan (Permohonan / Diagih / Dihantar / Selesai)
        if ($request->filled('status')) {
            $query->where(function ($q) use ($request) {
                if ($request->status == 'Permohonan') {
                    $q->whereNull('status_penempatan')->orWhere('status_penempatan', 'Permohonan');
                } else {
                    $q->where('status_penempatan', $request->status);
                }
            });
        }

        $peminjaman = $query->latest()->get();

        return view('admin.peminjaman', compact('peminjaman'));
    }

    // Kemaskini Status Penempatan
    public function updateStatusPenempatan(Request $request, $id)
    {
        $statusInput = $request->input('status_penempatan') ?? $request->input('status');

        $request->validate([
            'status_penempatan' => 'nullable|string',
            'no_siri'           => 'nullable|string',
            'status'            => 'nullable|string',
        ]);

        $permohonan = Permohonan::findOrFail($id);

        if ($statusInput) {
            $permohonan->status_penempatan = $statusInput;
        }

        if ($request->filled('no_siri')) {
            $permohonan->no_siri = $request->no_siri;
        }

        $permohonan->save();

        return redirect()->back()->with('success', 'Status tracking penempatan berjaya dikemaskini!');
    }

    public function sahkanPemulangan($id)
    {
        $rekod = Peminjaman::findOrFail($id);

        // Kemaskini status & tarikh
        $rekod->status_peminjaman = 'Telah Dikembalikan';
        $rekod->tarikh_pulang = now();
        $rekod->save();

        // Kemaskini jumlah dalam stok inventori
        if ($rekod->peralatan_id) {
            $peralatan = Peralatan::find($rekod->peralatan_id);
            if ($peralatan) {
                $peralatan->tersedia = $peralatan->tersedia + 1;
                $peralatan->diagih   = max(0, $peralatan->diagih - 1);
                $peralatan->save();
            }
        }

        return redirect()->back()->with('success', 'Pemulangan peralatan berjaya disahkan!');
    }
}