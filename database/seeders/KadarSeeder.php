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
            'kadar_id'            => 210114001,
            'kadar_kode'          =>  '1',
            'kadar_nama'          =>  '8K',
            'kadar_harga_jual_1'  =>  440000,
            'kadar_harga_jual_2'  =>  460000
        ]);

        Kadar::create([
            'kadar_id'            => 210114002,
            'kadar_kode'          =>  '2',
            'kadar_nama'          =>  '9K',
            'kadar_harga_jual_1'  =>  460000,
            'kadar_harga_jual_2'  =>  0
        ]);

        Kadar::create([
            'kadar_id'            => 210114003,
            'kadar_kode'          =>  '3',
            'kadar_nama'          =>  '16K',
            'kadar_harga_jual_1'  =>  705000,
            'kadar_harga_jual_2'  =>  0
        ]);

        Kadar::create([
            'kadar_id'            => 210114005,
            'kadar_kode'          =>  '0',
            'kadar_nama'          =>  '0',
            'kadar_harga_jual_1'  =>  0,
            'kadar_harga_jual_2'  =>  0
        ]);

        Kadar::create([
            'kadar_id'            => 210114006,
            'kadar_kode'          =>  '4',
            'kadar_nama'          =>  '17K',
            'kadar_harga_jual_1'  =>  765000,
            'kadar_harga_jual_2'  =>  0
        ]);

        Kadar::create([
            'kadar_id'            => 210228007,
            'kadar_kode'          =>  '5',
            'kadar_nama'          =>  '24K',
            'kadar_harga_jual_1'  =>  0,
            'kadar_harga_jual_2'  =>  0
        ]);
    }
}
