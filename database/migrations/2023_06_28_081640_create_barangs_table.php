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
        Schema::create('barangs', function (Blueprint $table) {
            $table->id('barang_id');
            $table->string('barang_kode');
            $table->string('barang_nama');
            $table->string('barang_foto');
            $table->string('barang_barcode');
            $table->integer('barang_status');
            $table->string('barang_lokasi');
            $table->integer('model_id');
            $table->integer('pabrik_id');
            $table->integer('merk_id');
            $table->integer('supplier_id');
            $table->integer('kadar_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barangs');
    }
};