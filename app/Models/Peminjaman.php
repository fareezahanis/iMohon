<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;

    protected $table = 'peminjamans';

    protected $fillable = [
        'user_id',
        'peralatan_id',
        'nama_pemohon',
        'nama_peralatan',
        'kategori',
        'no_siri',
        'lokasi',
        'tarikh_pinjam',
        'tarikh_pulang',
        'status_peminjaman',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function peralatan()
    {
        return $this->belongsTo(Peralatan::class, 'peralatan_id');
    }
}
