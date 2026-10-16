<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peralatan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_peralatan',
        'kategori',
        'vendor_id',
        'jumlah',
        'tersedia',
        'diagih',
    ];
    public function vendors()
{
    return $this->belongsToMany(Vendor::class, 'peralatan_vendor', 'peralatan_id', 'vendor_id')
                ->withPivot('jumlah_unit')
                ->withTimestamps();
}
public function vendor()
{
    return $this->belongsTo(Vendor::class, 'vendor_id');
}

}