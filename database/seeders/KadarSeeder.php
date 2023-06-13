<?php

namespace Database\Seeders;

use App\Models\Kadar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KadarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Kadar::create([
            'kadar_nama'      =>  'test kadar 1',
            'kadar_harga_jual_1'      =>  1100 ,
            'kadar_harga_jual_2'      =>  110 
        ]);

        Kadar::create([
            'kadar_nama'      =>  'test kadar 2',
            'kadar_harga_jual_1'      =>  12000 ,
            'kadar_harga_jual_2'      =>  1200 
        ]);
    }
}
