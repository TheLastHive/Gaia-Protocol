<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Token;

class TokensTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::first(); // Get the first user to associate with the token

        Token::create([
            'name' => 'Pedrito',
            'symbol' => 'PDT',
            'total_supply' =>  1000000.00,
            'user_id' => $user->id,
        ]);
    }
}
