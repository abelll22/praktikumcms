<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $fillable = ['nama_pembeli', 'barang_id', 'jumlah', 'total_harga'];

    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }
}
