<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permohonan extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'id_permohonan',
        'jenis_permohonan',
        'nama_item',
        'kuantiti',
        'tarikh_mohon',
        'tujuan',
        'nama_penerima',
        'lokasi',
        'status',
    ];

    public function user()
{
    return $this->belongsTo(User::class, 'user_id');
}
}
