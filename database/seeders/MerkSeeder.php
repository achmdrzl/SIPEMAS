<?php

namespace Database\Seeders;

use App\Models\Merk;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MerkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Merk::create([
            'merk_id'       => 210114001,
            'merk_kode'     => '01',
            'merk_nama'     => 'HWT'
        ]);

        Merk::create([
            'merk_id'       => 210114002,
            'merk_kode'     => '02',
            'merk_nama'     => 'LG'
        ]);

        Merk::create([
            'merk_id'       => 210114003,
            'merk_kode'     => '03',
            'merk_nama'     => 'UBS'
        ]);

        Merk::create([
            'merk_id'       => 210114004,
            'merk_kode'     => '04',
            'merk_nama'     => 'YT'
        ]);

        Merk::create([
            'merk_id'       => 210114005,
            'merk_kode'     => '05',
            'merk_nama'     => 'LL'
        ]);
    }
}
