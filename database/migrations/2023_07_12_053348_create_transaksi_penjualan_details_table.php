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
        Schema::create('transaksi_penjualan_details', function (Blueprint $table) {
            $table->id('detail_penjualan_id');
            $table->string('barang_id');
            $table->string('penjualan_id');
            $table->double('detail_penjualan_berat_jual');
            $table->integer('detail_penjualan_harga');
            $table->integer('detail_penjualan_ongkos')->nullable();
            $table->integer('detail_penjualan_diskon')->nullable();
            $table->integer('detail_penjualan_jml_harga');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi_penjualan_details');
    }
};
