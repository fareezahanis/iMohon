<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permohonan;

class PelulusController extends Controller
{
    /**
     * Paparan Dashboard Pelulus
     */
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

    /**
     * Paparan Senarai Kelulusan Permohonan
     */
    public function kelulusan()
    {
        // Ambil senarai permohonan berserta data pengguna
        $senaraiPermohonan = Permohonan::with('user')->latest()->get();

        return view('pelulus.kelulusan', compact('senaraiPermohonan'));
    }

    /**
     * Kemaskini Status Kelulusan oleh Pelulus (AJAX Request)
     */
    public function updateStatus(Request $request, $id)
    {
        $permohonan = Permohonan::findOrFail($id);

        // Kemaskini status_pelulus secara khusus
        if ($request->status == 'Diterima' || $request->status == 'Lulus' || $request->status == 'Disokong') {
            $permohonan->status_pelulus = 'Diterima';
            // Status permohonan utama kekal 'Dalam Proses' untuk tindakan Admin kelak
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
