<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permohonan;
use Illuminate\Support\Facades\Auth;

class PermohonanController extends Controller
{
    public function index()
    {
        $permohonan = Permohonan::where('user_id', Auth::id())
                        ->orderBy('created_at', 'desc')
                        ->get();

        return view('permohonan.index', compact('permohonan'));
    }

    public function create()
    {
        return view('permohonan.create');
    }

    // 
    public function store(Request $request)
    {
       
        $request->validate([
            'jenis_permohonan' => 'required',
            'nama_item'        => 'required|array',
            'kuantiti'         => 'required|array',
            'tarikh_mohon'     => 'required|date',
            'tujuan'           => 'required|string',
            'nama_penerima'    => 'required|array',
            'lokasi'           => 'required|array',
        ]);

        $namaItemJoined     = is_array($request->nama_item) ? implode(', ', $request->nama_item) : $request->nama_item;
        $kuantitiJoined     = is_array($request->kuantiti) ? implode(', ', $request->kuantiti) : $request->kuantiti;
        $namaPenerimaJoined = is_array($request->nama_penerima) ? implode(', ', $request->nama_penerima) : $request->nama_penerima;
        $lokasiJoined       = is_array($request->lokasi) ? implode(', ', $request->lokasi) : $request->lokasi;
        // id auto (random)
        $idAuto = 'REQ-' . rand(1000, 9999);

        // simpan data
        Permohonan::create([
            'user_id'          => Auth::id(),
            'id_permohonan'    => $idAuto,
            'jenis_permohonan' => $request->jenis_permohonan,
            'nama_item'        => $namaItemJoined,
            'kuantiti'         => $kuantitiJoined,
            'tarikh_mohon'     => $request->tarikh_mohon,
            'tujuan'           => $request->tujuan,
            'nama_penerima'    => $namaPenerimaJoined,
            'lokasi'           => $lokasiJoined,
            'status'           => 'Dalam proses',
        ]);

        
        
        return redirect()->route('permohonan.index');
    }

    public function dashboard()
{
    $userId = Auth::id();

    
    $jumlahSemua = Permohonan::where('user_id', $userId)->count();
    $jumlahProses = Permohonan::where('user_id', $userId)->where('status', 'Dalam proses')->count();
    $jumlahLulus = Permohonan::where('user_id', $userId)->where('status', 'Lulus')->count();
    $jumlahTolak = Permohonan::where('user_id', $userId)->where('status', 'Ditolak')->count();

    
    $permohonanTerkini = Permohonan::where('user_id', $userId)
                          ->orderBy('created_at', 'desc')
                          ->take(5)
                          ->get();

    return view('dashboard', compact(
        'jumlahSemua', 
        'jumlahProses', 
        'jumlahLulus', 
        'jumlahTolak', 
        'permohonanTerkini'
    ));
}
}