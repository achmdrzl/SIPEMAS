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
            'merk_nama'       => 'test merk 1'
        ]);

        Merk::create([
            'merk_nama'       => 'test merk 2'
        ]);

        Merk::create([
            'merk_nama'       => 'test merk 3'
        ]);
    }
}
