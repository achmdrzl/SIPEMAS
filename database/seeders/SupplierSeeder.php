<?php

namespace Database\Seeders;

use App\Models\Supplier;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Supplier::create([
            'supplier_kode'      =>  '01',
            'supplier_nama'      =>  'CIT',
            'supplier_alamat' => 'Jl. wua wua',
            'supplier_no_telp' => '08182312319',
            'supplier_kota' => 'kendari'
        ]);
    }
}
