<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permohonan;
use App\Models\Peralatan;
use App\Models\User;
use App\Models\Peminjaman;
use App\Models\Vendor;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function dashboard()
    {
    
        $permohonanBaru = Permohonan::whereIn('status', ['Baharu', 'Baru', 'Dalam Proses'])->count();
        $dalamProses    = Permohonan::where('status', 'Dalam Proses')->count();
        $lulus          = Permohonan::where('status', 'Lulus')->count();
        $ditolak        = Permohonan::where('status', 'Ditolak')->count();

        
       $permohonanTerkini = Permohonan::latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'permohonanBaru', 
            'dalamProses', 
            'lulus', 
            'ditolak', 
            'permohonanTerkini'
        ));
    }

     public function inventori()
{
    $jumlahPeralatan = Peralatan::sum('jumlah');
    $tersedia        = Peralatan::sum('tersedia');
    $diagih          = Peralatan::sum('diagih');

    // Load pautan vendors beserta data pivot (jumlah_unit)
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
    }

    return redirect()->back()->with('success', 'Peralatan baharu berjaya disimpan!');
}
public function destroyInventori($id)
{
    $inventori = Peralatan::findOrFail($id);
    $inventori->delete();

    return redirect()->back()->with('success', 'Peralatan berjaya dipadam!');
}
        public function vendor(Request $request)
{
    $query = Vendor::query();

    // Carian
    if ($request->filled('search')) {
        $search = $request->search;
        $query->where(function($q) use ($search) {
            $q->where('nama_vendor', 'like', "%{$search}%")
              ->orWhere('no_kontrak', 'like', "%{$search}%")
              ->orWhere('pic_kontrak', 'like', "%{$search}%");
        });
    }

    // Ambil senarai vendor terkini dari database
    $vendors = $query->latest()->get();

    // Kira statistik berdasarkan data sebenar
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
    // semak input dari borang
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

    // simpan dalam pangkalan data
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
public function pengguna(Request $request)
{
    $query = User::query();

    if ($request->filled('search')) {
        $search = $request->search;
        $query->where(function($q) use ($search) {
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
// 2. Simpan Data Pengguna Baharu
public function storePengguna(Request $request)
{
    // Tukar 'unique:pengguna,email' kepada 'unique:users,email'
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
public function kelulusan()
{
    // Ambil permohonan dari database
    $permohonan = Permohonan::with('user')->latest()->get();

    return view('admin.kelulusan', compact('permohonan'));
}

public function updateStatus(Request $request, $id)
{
    $permohonan = Permohonan::findOrFail($id);
    $permohonan->status = $request->status; // 'Lulus' atau 'Ditolak'
    $permohonan->save();

    return redirect()->back()->with('success', 'Status permohonan berjaya dikemaskini!');
}
public function rekodPeminjaman(Request $request)
{
    $query = Peminjaman::with(['user', 'peralatan']);

    // Jika ada carian
    if ($request->filled('search')) {
        $search = $request->search;
        $query->where(function($q) use ($search) {
            $q->where('nama_pemohon', 'like', "%{$search}%")
              ->orWhere('nama_peralatan', 'like', "%{$search}%")
              ->orWhere('no_siri', 'like', "%{$search}%")
              ->orWhere('lokasi', 'like', "%{$search}%")
              ->orWhereHas('user', function($u) use ($search) {
                  $u->where('name', 'like', "%{$search}%");
              });
        });
    }

    $peminjaman = $query->latest()->get();

    return view('admin.peminjaman', compact('peminjaman'));
}

/**
 * Sahkan Pemulangan Peralatan
 */
public function sahkanPemulangan($id)
{
    $rekod = Peminjaman::findOrFail($id);

    // 1. Kemaskini status & tarikh
    $rekod->status_peminjaman = 'Telah Dikembalikan';
    $rekod->tarikh_pulang = now();
    $rekod->save();

    // 2. Kemaskini jumlah dalam stok Inventori
    if ($rekod->peralatan_id) {
        $peralatan = Peralatan::find($rekod->peralatan_id);
        if ($peralatan) {
            $peralatan->tersedia = $peralatan->tersedia + 1;
            $peralatan->diagih = max(0, $peralatan->diagih - 1);
            $peralatan->save();
        }
    }

    return redirect()->back()->with('success', 'Pemulangan peralatan berjaya disahkan!');
}
}