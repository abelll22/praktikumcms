<?php

namespace App\Models;

class Barang
{
    protected static function getDummyData()
    {
        return [
            [
                'id' => 1,
                'title' => 'Nama Barang',
                'content' => 'Berisi id barang dan nama barang.',
                'items' => ['001/Indomie', '002/Susu', '003/Minuman']
            ],
            [
                'id' => 2,
                'title' => 'Stok Barang',
                'content' => 'Berisi tentang jumlah barang yang ada.',
                'items' => ['Indomie: 100', 'Susu: 50', 'Minuman: 30']
            ],
            [
                'id' => 3,
                'title' => 'Pesanan Barang',
                'content' => 'Berisi catatan pesanan barang.',
                'items' => ['Indomie = 10 DUS - Pemesanan A', 'Susu = 5 DUS - Pemesanan B']
            ],
        ];
    }

    public static function all()
    {
        return self::getDummyData();
    }

    
    public static function find($id)
    {
        $barangs = self::getDummyData(); 
        foreach ($barangs as $barang) {
            if ($barang['id'] == $id) {
                return $barang;
            }
        }
        return null;
    }
}
