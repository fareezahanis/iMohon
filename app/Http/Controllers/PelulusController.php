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

        return view('pelulus.dashboard', compact(
            'menungguCount', 
            'diterimaCount', 
            'ditolakCount', 
            'permohonanTerkini'
        ));
    }

    
    public function kelulusan()
    {
        // ambil senarai permohonan & data pengguna
        $senaraiPermohonan = Permohonan::with('user')->latest()->get();

        return view('pelulus.kelulusan', compact('senaraiPermohonan'));
    }

    
    public function updateStatus(Request $request, $id)
    {
        $permohonan = Permohonan::findOrFail($id);

        // kemaskini status pelulus
        if ($request->status == 'Diterima' ) {
            $permohonan->status_pelulus = 'Diterima';
            // kekal dalam proses untuk tindakan admin
            $permohonan->status = 'Dalam Proses'; 
        } elseif ($request->status == 'Ditolak') {
            $permohonan->status_pelulus = 'Ditolak';
            $permohonan->status = 'Ditolak';
        } else {
            $permohonan->status_pelulus = $request->status;
        }

        $permohonan->save(); 

        return response()->json([
            'success' => true,
            'message' => 'Status Pelulus berjaya dikemaskini!',
            'status'  => $permohonan->status_pelulus
        ]);
    }
}
