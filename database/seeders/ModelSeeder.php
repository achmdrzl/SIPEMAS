<?php

namespace Database\Seeders;

use App\Models\ModelBarang;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ModelBarang::create([
            'model_nama'       => 'test model 1'
        ]);

        ModelBarang::create([
            'model_nama'       => 'test model 2'
        ]);

        ModelBarang::create([
            'model_nama'       => 'test model 3'
        ]);
 
    }
}
