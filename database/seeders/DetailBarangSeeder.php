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
            'barang_id'      =>  1 , 
            'detail_barang_no_transaksi'      =>  'RP0129371' ,  
            'detail_barang_harga_jual'      =>  1 , 
            'detail_barang_harga_beli'      =>  1 , 
            'detail_barang_berat'      =>  1 ,  
            'detail_barang_keterangan'      =>  "RETUR MASUK" , 
            'detail_barang_kondisi'      =>  "baik"

        ]);
    }
}
