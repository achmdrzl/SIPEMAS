<?php

namespace Database\Seeders;

use App\Models\Barang;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BarangSeeder extends Seeder
{
    // <th>No</th>
    // <th>Nama</th>  
    // <th>Model</th> 
    // <th>Pabrik</th> 
    // <th>Merk</th> 
    // <th>Supplier</th> 
    // <th>Kadar</th> 
    // <th>Status</th> 
    // <th>Stok</th>
    // <th>Action</th>
    public function run(): void
    {
        Barang::create([
            'barang_kode'      =>  '09128300002',
            'barang_nama'      =>  'barang1' ,
            'barang_foto'      =>  'foto_barang/test_foto.jpg' ,
            'barang_barcode'      =>  'barcode_barang/test_barcode.jpg' ,
            'barang_status'      =>  1 ,
            'barang_lokasi'      =>  'etalase' ,
            'model_id'      =>  1 , 
            'pabrik_id'      =>  1 , 
            'merk_id'      =>  1 , 
            'supplier_id'      =>  1 , 
            'kadar_id'      =>  1 

        ]);
    }
}
