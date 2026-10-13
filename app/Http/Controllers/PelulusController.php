<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permohonan; 

class PelulusController extends Controller
{
    public function dashboard()
    {
        $menungguCount = Permohonan::where('status', 'Menunggu')->count();
        $diterimaCount = Permohonan::where('status', 'Diterima')->count();
        $ditolakCount  = Permohonan::where('status', 'Ditolak')->count();

        $permohonanTerkini = Permohonan::latest()->take(5)->get();

        return view('pelulus.dashboard', compact('menungguCount', 'diterimaCount', 'ditolakCount', 'permohonanTerkini'));
    }

    public function kelulusan()
    {
        $senaraiPermohonan = Permohonan::latest()->get();
        return view('pelulus.kelulusan', compact('senaraiPermohonan'));
    }

    // TAMBAH KAEDAH INI UNTUK SIMPAN DATA KE MYSQL
    public function updateStatus(Request $request, $id)
    {
        $permohonan = Permohonan::findOrFail($id);

        // Kemaskini dan simpan ke pangkalan data
        $permohonan->status = $request->status;
        $permohonan->save(); 

        return response()->json([
            'success' => true,
            'message' => 'Status berjaya dikemaskini!',
            'status'  => $permohonan->status
        ]);
    }
}
