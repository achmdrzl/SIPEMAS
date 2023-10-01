<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transaksi_penjualan_return_details', function (Blueprint $table) {
            $table->id('detail_penjualan_return_id');
            $table->string('penjualan_return_nobukti');
            $table->string('barang_id');
            $table->double('detail_penjualan_barang_berat');
            $table->double('detail_penjualan_return_berat');
            $table->integer('detail_penjualan_return_harga_jual');
            $table->integer('detail_penjualan_return_harga_return');
            $table->integer('detail_penjualan_return_potongan')->nullable();
            $table->integer('detail_penjualan_return_ppn')->nullable();
            $table->integer('detail_penjualan_return_jml_harga');
            $table->string('detail_penjualan_return_kondisi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi_penjualan_return_details');
    }
};
