<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permohonan; // Tukar ikut nama Model anda jika berbeza

class PelulusController extends Controller
{
    public function dashboard()
    {
        
        $menungguCount = Permohonan::whereIn('status', ['Menunggu', 'Pending', 'Dalam Proses'])->count();
        $lulusCount    = Permohonan::whereIn('status', ['Lulus', 'Diterima', 'Terima'])->count();
        $ditolakCount  = Permohonan::where('status', 'Ditolak')->count();

        $permohonanTerkini = Permohonan::latest()->take(5)->get();

        return view('pelulus.dashboard', compact('menungguCount', 'lulusCount', 'ditolakCount', 'permohonanTerkini'));
    }

    public function kelulusan()
    {
        
        $senaraiPermohonan = Permohonan::latest()->get();
        return view('pelulus.kelulusan', compact('senaraiPermohonan'));
    }
}
