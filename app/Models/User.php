<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;

    // ✅ Ubah nama tabel ke 'pengguna' karena kita rename
    protected $table = 'pengguna';

    // ✅ Kolom yang bisa diisi massal
    protected $fillable = [
        'username',
        'password',
    ];

    // ✅ Sembunyikan password saat model di-convert ke JSON/array
    protected $hidden = [
        'password',
    ];

    // (Optional) casting jika kamu pakai kolom seperti email_verified_at
    // protected $casts = [
    //     'email_verified_at' => 'datetime',
    // ];
}
