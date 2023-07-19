<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(PabrikSeeder::class);
        $this->call(KadarSeeder::class);
        $this->call(SupplierSeeder::class);
        $this->call(ModelSeeder::class);
        $this->call(MerkSeeder::class);
        $this->call(BarangSeeder::class);
    }
}
