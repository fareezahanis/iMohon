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
        View::composer('*', function ($view) {
            $tarikhHad = now()->subDays(3);

            // 1. PELULUS
            $queryPelulus = Permohonan::with('user')
                ->where('created_at', '>=', $tarikhHad)
                ->where(function ($q) {
                    $q->whereNull('status')
                      ->orWhere('status', '')
                      ->orWhere('status', 'Dalam Proses');
                });

            $notifPelulusCount = (clone $queryPelulus)->count();
            $notifPelulusList  = $queryPelulus->latest()->take(6)->get();

            // 2. ADMIN
            $queryAdmin = Permohonan::with('user')
                ->where('updated_at', '>=', $tarikhHad)
                ->where(function ($q) {
                    $q->whereNull('status')
                      ->orWhere('status', '')
                      ->orWhere('status', 'Dalam Proses')
                      ->orWhere(function ($sub) {
                          $sub->whereIn('status', ['Diterima', 'Lulus', 'Terima'])
                              ->where(function ($p) {
                                  $p->whereNull('status_penempatan')
                                    ->orWhere('status_penempatan', '')
                                    ->orWhere('status_penempatan', 'Permohonan')
                                    ->orWhere('status_penempatan', 'Selesai');
                              });
                      });
                });

            $notifAdminCount = (clone $queryAdmin)->count();
            $notifAdminList  = $queryAdmin->latest('updated_at')->take(6)->get();

            // 3. PEMOHON
            $notifPemohonCount = 0;
            $notifPemohonList  = collect();

            if (Auth::check()) {
                $queryPemohon = Permohonan::where('user_id', Auth::id())
                    ->where('updated_at', '>=', $tarikhHad)
                    ->whereIn('status', ['Diterima', 'Lulus', 'Terima', 'Ditolak']);

                $notifPemohonCount = (clone $queryPemohon)->count();
                $notifPemohonList  = $queryPemohon->latest('updated_at')->take(6)->get();
            }

            $view->with([
                'notifPelulusCount' => $notifPelulusCount,
                'notifPelulusList'  => $notifPelulusList,
                'notifAdminCount'   => $notifAdminCount,
                'notifAdminList'    => $notifAdminList,
                'notifPemohonCount' => $notifPemohonCount,
                'notifPemohonList'  => $notifPemohonList,
            ]);
        });
    }
}