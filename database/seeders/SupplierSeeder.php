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
            'supplier_id'        => 210115002,
            'supplier_kode'      => '1',
            'supplier_nama'      => 'BINTANG MAS',
            'supplier_alamat'    => 'MICHAEL',
            'supplier_no_telp'   => '-',
            'supplier_kota'      => '-'
        ]);

        Supplier::create([
            'supplier_id'        => 210115003,
            'supplier_kode'      => '2',
            'supplier_nama'      => 'MUSTIKA',
            'supplier_alamat'    => 'BENTAR',
            'supplier_no_telp'   => '-',
            'supplier_kota'      => '-'
        ]);

        Supplier::create([
            'supplier_id'        => 210115004,
            'supplier_kode'      => '3',
            'supplier_nama'      => 'CUSTOM',
            'supplier_alamat'    => '-',
            'supplier_no_telp'   => '-',
            'supplier_kota'      => '-'
        ]);

        Supplier::create([
            'supplier_id'        => 210115005,
            'supplier_kode'      => '4',
            'supplier_nama'      => 'ASG',
            'supplier_alamat'    => 'HENGKY',
            'supplier_no_telp'   => '-',
            'supplier_kota'      => '-'
        ]);

        Supplier::create([
            'supplier_id'        => 210115006,
            'supplier_kode'      => '5',
            'supplier_nama'      => 'LEO',
            'supplier_alamat'    => 'DEDY',
            'supplier_no_telp'   => '-',
            'supplier_kota'      => 'KEDIRI'
        ]);

        Supplier::create([
            'supplier_id'        => 210318001,
            'supplier_kode'      => '6',
            'supplier_nama'      => 'LAIN-LAIN',
            'supplier_alamat'    => '-',
            'supplier_no_telp'   => '-',
            'supplier_kota'      => '-'
        ]);

        Supplier::create([
            'supplier_id'        => 210524001,
            'supplier_kode'      => '7',
            'supplier_nama'      => 'AWE',
            'supplier_alamat'    => 'filbert',
            'supplier_no_telp'   => '-',
            'supplier_kota'      => '-'
        ]);

        Supplier::create([
            'supplier_id'        => 210812001,
            'supplier_kode'      => '8',
            'supplier_nama'      => 'KKG',
            'supplier_alamat'    => 'PETRUS',
            'supplier_no_telp'   => '-',
            'supplier_kota'      => '-'
        ]);

        Supplier::create([
            'supplier_id'        => 220419001,
            'supplier_kode'      => '9',
            'supplier_nama'      => 'SARI MULIA SENTOSA',
            'supplier_alamat'    => 'SURYA',
            'supplier_no_telp'   => '-',
            'supplier_kota'      => '-'
        ]);
    }
}
