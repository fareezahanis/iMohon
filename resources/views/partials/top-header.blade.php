<header class="top-header">
   @php
        $userRole  = strtolower(Auth::user()->role ?? '');
        $isPelulus = $userRole === 'pelulus' || request()->is('pelulus*');
        $isAdmin   = $userRole === 'admin' || request()->is('admin*');

        if ($isPelulus) {
            $notifCount  = $notifPelulusCount ?? 0;
            $notifList   = $notifPelulusList ?? collect();
            $targetRoute = route('pelulus.kelulusan');
            $notifHeader = 'Menunggu Kelulusan';
            $badgeLabel  = $notifCount . ' Baharu';
        } elseif ($isAdmin) {
            $notifCount  = $notifAdminCount ?? 0;
            $notifList   = $notifAdminList ?? collect();
            $targetRoute = route('admin.kelulusan');
            $notifHeader = 'Notifikasi Permohonan';
            $badgeLabel  = $notifCount . ' Baharu';
        } else {
            $notifCount  = $notifPemohonCount ?? 0;
            $notifList   = $notifPemohonList ?? collect();
            $targetRoute = route('permohonan.index');
            $notifHeader = 'Status Permohonan Anda';
            $badgeLabel  = $notifCount . ' Rekod';
        }

        $notifSignature = collect($notifList)->pluck('id')->implode(',');
    @endphp

    <div style="display: flex; align-items: center; gap: 18px; position: relative;">

        <!-- icon -->
        <div style="position: relative;">
            <button type="button" id="btnToggleNotif" data-signature="{{ $notifSignature }}" style="background: rgba(255, 255, 255, 0.14); border: none; color: white; width: 38px; height: 38px; border-radius: 50%; cursor: pointer; display: flex; align-items: center; justify-content: center; font-size: 16px; position: relative;">
                <i class="fa-solid fa-bell"></i>
                @if($notifCount > 0)
                    <span id="notifBadge" style="position: absolute; top: -3px; right: -4px; background: #ef4444; color: white; font-size: 10px; font-weight: 800; min-width: 18px; height: 18px; padding: 0 4px; border-radius: 999px; display: flex; align-items: center; justify-content: center; border: 2px solid #29158f;">
                        {{ $notifCount > 99 ? '99+' : $notifCount }}
                    </span>
                @endif
            </button>
            <!-- dropdown noti -->
            <div id="notifDropdownMenu" style="display: none; position: absolute; right: 0; top: 48px; width: 335px; background: white; border-radius: 14px; box-shadow: 0 15px 30px rgba(15, 23, 42, 0.18); border: 1px solid #e2e8f0; z-index: 9999; overflow: hidden; text-align: left;">
                <div style="padding: 13px 16px; background: #f8fafc; border-bottom: 1px solid #e2e8f0; display: flex; justify-content: space-between; align-items: center;">
                    <span style="font-size: 13px; font-weight: 700; color: #1e0b75;">{{ $notifHeader }}</span>
                    <span style="background: #e0e7ff; color: #29158f; font-size: 11px; font-weight: 700; padding: 2px 8px; border-radius: 10px;">
                        {{ $badgeLabel }}
                    </span>
                </div>

                <div style="max-height: 280px; overflow-y: auto;">
                    @forelse($notifList as $n)
                        @php
                            $stLower = strtolower($n->status ?? '');
                            $spLower = strtolower($n->status_penempatan ?? '');
                        @endphp
                        <a href="{{ $targetRoute }}" style="display: block; padding: 12px 16px; border-bottom: 1px solid #f1f5f9; text-decoration: none;" onmouseover="this.style.background='#f8fafc'" onmouseout="this.style.background='white'">
                            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 3px;">
                                <span style="font-size: 12px; font-weight: 700; color: #1e0b75;">
                                    {{ $n->id_permohonan ?? 'REQ-'.str_pad($n->id, 3, '0', STR_PAD_LEFT) }}
                                </span>
                                <span style="font-size: 10px; color: #94a3b8;">
                                    {{ ($isPelulus || $isAdmin) ? ($n->created_at?->diffForHumans() ?? '') : ($n->updated_at?->diffForHumans() ?? '') }}
                                </span>
                            </div>

                            @if(!$isPelulus && !$isAdmin)
                                {{-- pemohon --}}
                                <div style="font-size: 12px; font-weight: 600; color: #0f172a; margin-bottom: 3px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                    {{ is_array($n->nama_item) ? implode(', ', $n->nama_item) : ($n->nama_item ?? '-') }}
                                </div>
                                <div style="font-size: 11px;">
                                    @if($stLower === 'ditolak')
                                        <span style="color: #dc2626; font-weight: 700;"><i class="fa-solid fa-circle-xmark"></i> Permohonan Ditolak</span>
                                    @elseif($spLower === 'selesai')
                                        <span style="color: #16a34a; font-weight: 700;"><i class="fa-solid fa-circle-check"></i> Selesai / Diterima</span>
                                    @elseif($spLower === 'dihantar')
                                        <span style="color: #0284c7; font-weight: 700;"><i class="fa-solid fa-truck"></i> Sedang Dihantar</span>
                                    @elseif(in_array($spLower, ['diagih', 'diagihkan']))
                                        <span style="color: #7c3aed; font-weight: 700;"><i class="fa-solid fa-box-open"></i> Peralatan Telah Diagih</span>
                                    @else
                                        <span style="color: #16a34a; font-weight: 700;"><i class="fa-solid fa-circle-check"></i> Permohonan Diluluskan</span>
                                    @endif
                                </div>
                            @else
                                {{-- admin & pelulus--}}
                                <div style="font-size: 12px; font-weight: 600; color: #0f172a; margin-bottom: 2px;">
                                    {{ $n->user->name ?? $n->nama_pemohon ?? 'Pemohon' }}
                                </div>
                                <div style="font-size: 11px; color: #64748b; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                    Item: {{ is_array($n->nama_item) ? implode(', ', $n->nama_item) : ($n->nama_item ?? '-') }}
                                </div>
                            @endif
                        </a>
                    @empty
                        <div style="padding: 24px 16px; text-align: center; color: #94a3b8; font-size: 12px; font-style: italic;">
                            Tiada notifikasi baharu buat masa ini.
                        </div>
                    @endforelse
                </div>

                <a href="{{ $targetRoute }}" style="display: block; text-align: center; padding: 10px; background: #eef2ff; color: #29158f; font-size: 12px; font-weight: 700; text-decoration: none;">
                    Lihat Senarai Penuh &rarr;
                </a>
            </div>
        </div>

        <!-- nama profile -->
        <div class="user-profile">
        <span>
            @if($isAdmin)
                Admin
            @elseif($isPelulus)
                Pelulus
             @else
                {{ Auth::user()->name ?? 'Pemohon' }}
            @endif
        </span>
            <div class="user-avatar">
            <i class="fa-solid fa-user"></i>
        </div>
    </div>

    </div>
</header>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const btnToggleNotif = document.getElementById('btnToggleNotif');
    const notifDropdownMenu = document.getElementById('notifDropdownMenu');
    const notifBadge = document.getElementById('notifBadge');

    if (btnToggleNotif && notifDropdownMenu) {
        const storageKey = 'imohon_notif_seen_{{ Auth::id() ?? "guest" }}';
        const currentSignature = btnToggleNotif.getAttribute('data-signature') || '';
        const seenSignature = localStorage.getItem(storageKey);

        
        if (notifBadge && currentSignature !== '' && seenSignature === currentSignature) {
            notifBadge.style.display = 'none';
        }

        btnToggleNotif.addEventListener('click', function (e) {
            e.stopPropagation();
            const isOpening = notifDropdownMenu.style.display !== 'block';
            notifDropdownMenu.style.display = isOpening ? 'block' : 'none';

            // Hilangkan nombor merah sebaik sahaja loceng diklik & simpan kekal
            if (isOpening && notifBadge) {
                notifBadge.style.display = 'none';
                if (currentSignature !== '') {
                    localStorage.setItem(storageKey, currentSignature);
                }
            }
        });

        document.addEventListener('click', function (e) {
            if (!notifDropdownMenu.contains(e.target) && e.target !== btnToggleNotif) {
                notifDropdownMenu.style.display = 'none';
            }
        });
    }
});
</script>