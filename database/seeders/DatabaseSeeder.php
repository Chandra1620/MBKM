<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\CutiSisa;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(RolePermissionSeeder::class);

        $this->call(UserSeeder::class);
        $this->call(JabatanStrukturalSeeder::class);
        // $this->call(JabatanFungsionalSeeder::class);
        $this->call(UnitKerjaSeeder::class);
        $this->call(JenisCutiSeeder::class);
        $this->call(BeritaSeeder::class);
        $this->call(AbsensiPegawaiSeeder::class);
        $this->call(AtasanLangsungSeeder::class);
<<<<<<< HEAD
=======
        $this->call(CutiSisaSeeder::class);
>>>>>>> 7eb0631e9b143be0630eed30a5bf72013bf2730a
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
