<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InventoriUnit extends Model
{
    protected $fillable = [
        'peralatan_id',
        'no_kontrak',
        'vendor',
        'no_siri',
        'status',
        'permohonan_id',
    ];

    public function peralatan()
    {
        return $this->belongsTo(Peralatan::class, 'peralatan_id');
    }
}
