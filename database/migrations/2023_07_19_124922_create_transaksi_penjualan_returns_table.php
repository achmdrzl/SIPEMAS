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
        Schema::create('transaksi_penjualan_returns', function (Blueprint $table) {
            $table->id('penjualan_return_id');
            $table->string('penjualan_return_nobukti');
            $table->string('penjualan_kode');
            $table->date('penjualan_return_tanggal');
            $table->string('penjualan_return_keterangan');
            $table->integer('user_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi_penjualan_returns');
    }
};
