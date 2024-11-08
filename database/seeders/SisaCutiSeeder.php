<?php

namespace Database\Seeders;

use App\Models\sisaCuti;
use App\Models\User;
use Illuminate\Database\Seeder;

class SisaCutiSeeder extends Seeder
{
    public function run()
    {
        $users = User::all();

        foreach ($users as $user) {
            SisaCuti::create([
                'user_id' => $user->id,
                'n' => 12,
                'n_minus_1' => 0,
                'n_minus_2' => 0,
            ]);
        }
    }
}
