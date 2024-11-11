<?php

namespace Database\Seeders;

use App\Models\CutiSisa;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CutiSisaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();

        foreach ($users as $user) {
            CutiSisa::create([
                'user_id' => $user->id,
                'n' => 12,
                'n_minus_1' => 0,
                'n_minus_2' => 0,
            ]);
        }
    }
}