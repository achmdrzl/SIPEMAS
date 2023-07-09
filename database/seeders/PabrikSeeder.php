<?php

namespace Database\Seeders;

use App\Models\Pabrik;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PabrikSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pabrik::create([
            'pabrik_kode'      =>  '01',
            'pabrik_nama'      =>  'test 1'
        ]);

        Pabrik::create([
            'pabrik_kode'      =>  '02',
            'pabrik_nama'      =>  'test 2'
        ]);
    }
}
