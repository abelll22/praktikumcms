<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Database\Seeders\BarangSeeder;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('barang', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('content');
            $table->unsignedBigInteger('id_pemasok');
            $table->integer('stok_barang');
            $table->integer('pesanan_barang');
            $table->timestamps();
        });

        
        (new BarangSeeder())->run();
    }

    public function down(): void
    {
        Schema::dropIfExists('barang');
    }
};
