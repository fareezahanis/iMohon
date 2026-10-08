<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // JANGAN letak protected $table = 'pengguna'; di sini 
    // sebab nama jadual di phpMyAdmin ialah 'users'

    protected $fillable = [
        'name',
        'ic',
        'email',
        'password',
        'phone',
        'unit',
        'jawatan',
        'bahagian',
        'address',
        'role'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
