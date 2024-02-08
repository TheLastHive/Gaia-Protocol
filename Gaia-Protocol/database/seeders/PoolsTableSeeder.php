<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Pool;

class PoolsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::first(); // Get the first user to associate with the pool

        Pool::create([
            'name' => 'Pabloria',
            'description' => 'Mi primera chamba',
            'total_liquidity' =>  1000.00,
            'user_id' => $user->id,
        ]);
    }
}
