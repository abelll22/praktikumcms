<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;


    protected $table = 'barang';

    
    protected $fillable = [
        'title',
        'content',
        'id_pemasok',
        'stok_barang',
        'pesanan_barang',
    ];

}
