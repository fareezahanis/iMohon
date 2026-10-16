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

    public function peralatans()
    {
        // Hubungkan Vendor ke Peralatan menerusi pivot table 'peralatan_vendor'
        return $this->belongsToMany(Peralatan::class, 'peralatan_vendor', 'vendor_id', 'peralatan_id')
                    ->withPivot('jumlah_unit')
                    ->withTimestamps();
    }
}