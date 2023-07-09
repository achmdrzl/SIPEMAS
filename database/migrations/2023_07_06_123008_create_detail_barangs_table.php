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
        Schema::create('detail_barangs', function (Blueprint $table) {
            $table->id('detail_barang_id');  
            $table->string('barang_id');  
            $table->string('detail_barang_no_transaksi')->nullable();
            $table->double('detail_barang_harga_jual',15,2)->nullable();
            $table->double('detail_barang_harga_beli',15,2)->nullable();
            $table->double('detail_barang_berat',15,2);  
            $table->text('detail_barang_keterangan')->nullable();
            $table->string('detail_barang_kondisi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_barangs');
    }
};
