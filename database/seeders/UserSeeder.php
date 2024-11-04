<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Carbon\Carbon;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $user = User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@ehb.be',
            'password' => bcrypt('123'),
            'role' => 'admin',
        ]);

        \App\Models\Profile::factory()->create([
            'user_id' => $user->id,
            'birthday' => Carbon::now()->subYears(rand(18, 50))->format('Y-m-d'),
            'foto' => 'foto/test.jpg', 
            'bio' => 'Dit is een voorbeeld bio.',
        ]);
    }
}
