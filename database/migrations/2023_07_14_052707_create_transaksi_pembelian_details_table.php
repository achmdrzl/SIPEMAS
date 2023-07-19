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
        Schema::create('transaksi_pembelian_details', function (Blueprint $table) {
            $table->id('detail_pembelian_id');
            $table->string('pembelian_id');
            $table->string('barang_id');
            $table->string('detail_pembelian_kadar');
            $table->double('detail_pembelian_berat');
            $table->integer('detail_pembelian_harga_beli');
            $table->double('detail_pembelian_nilai_tukar');
            $table->integer('detail_pembelian_jml_beli');
            $table->integer('detail_pembelian_total');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi_pembelian_details');
    }
};
