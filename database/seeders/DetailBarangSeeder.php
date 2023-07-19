<?php

namespace Database\Seeders;

use App\Models\DetailBarang;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DetailBarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DetailBarang::create([
            'barang_id'      =>  010306300001,
            'detail_barang_no_transaksi'      =>  'RP0129371',
            'detail_barang_harga_jual'      =>  1,
            'detail_barang_harga_beli'      =>  1,
            'detail_barang_berat'      =>  1.1,
            'detail_barang_keterangan'      =>  "test detail data 1",
            'detail_barang_kondisi'      =>  "baik"

        ]);

        DetailBarang::create([
            'barang_id'      =>  010306300001,
            'detail_barang_no_transaksi'      =>  'RP0129372',
            'detail_barang_harga_jual'      =>  2,
            'detail_barang_harga_beli'      =>  2,
            'detail_barang_berat'      =>  2.1,
            'detail_barang_keterangan'      =>  "test detail data 2",
            'detail_barang_kondisi'      =>  "tidak baik"

        ]);

        DetailBarang::create([
            'barang_id'      =>  010306300002,
            'detail_barang_no_transaksi'      =>  'RP0129373',
            'detail_barang_harga_jual'      =>  1,
            'detail_barang_harga_beli'      =>  1,
            'detail_barang_berat'      =>  1.1,
            'detail_barang_keterangan'      =>  "test detail data 3",
            'detail_barang_kondisi'      =>  "baik"

        ]);

        DetailBarang::create([
            'barang_id'      =>  010306300002,
            'detail_barang_no_transaksi'      =>  'RP0129374',
            'detail_barang_harga_jual'      =>  2,
            'detail_barang_harga_beli'      =>  2,
            'detail_barang_berat'      =>  2.1,
            'detail_barang_keterangan'      =>  "test detail data 4",
            'detail_barang_kondisi'      =>  "tidak baik"

        ]);
    }
}
