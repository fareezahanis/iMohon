<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use HasFactory;

    protected $table = 'vendors';

    protected $fillable = [
        'nama_vendor',
        'no_kontrak',
        'pic_kontrak',
        'pemilik_kontrak',
        'nilai_kontrak',
        'tarikh_mula',
        'tarikh_tamat',
        'jumlah_peralatan',
    ];
}