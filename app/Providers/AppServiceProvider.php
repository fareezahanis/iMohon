<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Models\Permohonan;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // Notifikasi automatik untuk Admin, Pelulus, dan Pemohon
       View::composer('*', function ($view) {
            
            // 1. PELULUS: Permohonan baharu yang menunggu kelulusan
            $notifPelulusList = Permohonan::with('user')
                ->where(function ($q) {
                    $q->whereNull('status')
                      ->orWhere('status', '')
                      ->orWhere('status', 'Dalam Proses');
                })
                ->latest()
                ->take(5)
                ->get();

            $notifPelulusCount = Permohonan::where(function ($q) {
                $q->whereNull('status')
                  ->orWhere('status', '')
                  ->orWhere('status', 'Dalam Proses');
            })->count();

            // 2. ADMIN: Permohonan baharu atau permohonan diluluskan yang belum diagih
            $notifAdminList = Permohonan::with('user')
                ->where(function ($q) {
                    $q->whereNull('status')
                      ->orWhere('status', '')
                      ->orWhere('status', 'Dalam Proses')
                      ->orWhere(function ($sub) {
                          $sub->whereIn('status', ['Diterima', 'Lulus', 'Terima'])
                              ->where(function ($p) {
                                  $p->whereNull('status_penempatan')
                                    ->orWhere('status_penempatan', '')
                                    ->orWhere('status_penempatan', 'Permohonan');
                              });
                      });
                })
                ->latest()
                ->take(5)
                ->get();

            $notifAdminCount = Permohonan::where(function ($q) {
                $q->whereNull('status')
                  ->orWhere('status', '')
                  ->orWhere('status', 'Dalam Proses')
                  ->orWhere(function ($sub) {
                      $sub->whereIn('status', ['Diterima', 'Lulus', 'Terima'])
                          ->where(function ($p) {
                              $p->whereNull('status_penempatan')
                                ->orWhere('status_penempatan', '')
                                ->orWhere('status_penempatan', 'Permohonan');
                          });
                  });
            })->count();

            // 3. PEMOHON: Permohonan milik pengguna sendiri yang telah diproses (Diterima / Ditolak / Diagih / Dihantar / Selesai)
            $notifPemohonList = collect();
            $notifPemohonCount = 0;

            if (Auth::check()) {
                $notifPemohonList = Permohonan::where('user_id', Auth::id())
                    ->whereIn('status', ['Diterima', 'Lulus', 'Terima', 'Ditolak'])
                    ->latest('updated_at')
                    ->take(5)
                    ->get();

                $notifPemohonCount = Permohonan::where('user_id', Auth::id())
                    ->whereIn('status', ['Diterima', 'Lulus', 'Terima', 'Ditolak'])
                    ->count();
            }

            $view->with([
                'notifPelulusList'  => $notifPelulusList,
                'notifPelulusCount' => $notifPelulusCount,
                'notifAdminList'    => $notifAdminList,
                'notifAdminCount'   => $notifAdminCount,
                'notifPemohonList'  => $notifPemohonList,
                'notifPemohonCount' => $notifPemohonCount,
            ]);
        });
    }
}
