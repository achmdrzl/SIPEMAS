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
        Schema::create('transaksi_pembelians', function (Blueprint $table) {
            $table->id('pembelian_id');
            $table->date('pembelian_tanggal');
            $table->string('pembelian_nobukti');
            $table->integer('pembelian_subtotal');
            $table->integer('pembelian_diskon');
            $table->integer('pembelian_ppn');
            $table->integer('pembelian_grandtotal');
            $table->string('pembelian_keterangan');
            $table->string('supplier_id');
            $table->integer('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi_pembelians');
    }
};
