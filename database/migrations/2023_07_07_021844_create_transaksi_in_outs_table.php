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
        Schema::create('transaksi_in_outs', function (Blueprint $table) {
            $table->id('transaksi_id');
            $table->string('kode_transaksi');
            $table->date('tgl_transaksi');
            $table->enum('jenis_transaksi', ['Pengeluaran', 'Pemasukan']);
            $table->integer('total');
            $table->string('keterangan');
            $table->enum('status', ['aktif', 'non-aktif'])->default('aktif');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi_in_outs');
    }
};
