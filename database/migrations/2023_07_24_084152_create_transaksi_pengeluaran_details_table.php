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
        Schema::create('transaksi_pengeluaran_details', function (Blueprint $table) {
            $table->id('detail_pengeluaran_id');
            $table->string('pengeluaran_nobukti');
            $table->integer('kadar_id');
            $table->double('detail_pengeluaran_berat');
            $table->double('detail_pengeluaran_kembali');
            $table->string('detail_pengeluaran_kondisi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi_pengeluaran_details');
    }
};
