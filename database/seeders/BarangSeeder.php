<?php

namespace Database\Seeders;

use App\Models\Barang;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BarangSeeder extends Seeder
{ 
    public function run(): void
    {
        Barang::create([ 
            'barang_nama'      =>  'barang1' ,
            'barang_kode'      =>  '010306300001' ,
            'barang_foto'      =>  'foto_barang/test_foto.jpg' ,
            'barang_lokasi'      =>  '' ,  
            'barang_berat'      =>   3.1,  
            'barang_status'      =>  'non-aktif' ,  
            'model_id'      =>  1 , 
            'pabrik_id'      =>  1 ,  
            'supplier_id'      =>  1 , 
            'kadar_id'      =>  1 

        ]);
        
        Barang::create([ 
            'barang_nama'      =>  'barang1' ,
            'barang_kode'      =>  '010306300001' ,
            'barang_foto'      =>  'foto_barang/test_foto.jpg' ,
            'barang_lokasi'      =>  '' ,  
            'barang_berat'      =>   3.1,  
            'barang_status'      =>  'non-aktif' ,  
            'model_id'      =>  1 , 
            'pabrik_id'      =>  1 ,  
            'supplier_id'      =>  1 , 
            'kadar_id'      =>  1 

        ]);
    }
}
