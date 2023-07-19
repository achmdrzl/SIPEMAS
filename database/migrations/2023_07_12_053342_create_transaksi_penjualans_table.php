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
        Schema::create('transaksi_penjualans', function (Blueprint $table) {
            $table->id('penjualan_id');
            $table->date('penjualan_tanggal');
            $table->string('penjualan_nobukti');
            $table->integer('penjualan_subtotal');
            $table->integer('penjualan_diskon');
            $table->integer('penjualan_grandtotal');
            $table->integer('penjualan_bayar');
            $table->integer('penjualan_kembalian');
            $table->string('penjualan_keterangan');
            $table->integer('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi_penjualans');
    }
};
