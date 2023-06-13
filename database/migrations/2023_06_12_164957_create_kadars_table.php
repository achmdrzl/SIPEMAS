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
        Schema::create('kadars', function (Blueprint $table) {
            $table->id('kadar_id');
            $table->string('kadar_nama');
            $table->double('kadar_harga_jual_1',8,2);
            $table->double('kadar_harga_jual_2',8,2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kadars');
    }
};
