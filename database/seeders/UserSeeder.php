<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Admin user
        $adminUser = User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@ehb.be',
            'password' => bcrypt('123'),
            'role' => 'admin',
        ]);

        $adminFotoPath = 'foto/test.png';
        $adminFotoStoragePath = 'public/' . $adminFotoPath;


        \App\Models\Profile::factory()->create([
            'user_id' => $adminUser->id,
            'birthday' => Carbon::now()->subYears(rand(18, 50))->format('Y-m-d'),
            'foto' => $adminFotoPath, 
            'bio' => 'Dit is een voorbeeld bio voor de admin.',
        ]);

        // Regular user
        $regularUser = User::factory()->create([
            'name' => 'User',
            'email' => 'user@ehb.be',
            'password' => bcrypt('123'),
            'role' => 'user',
        ]);

        $userFotoPath = 'foto/test.png';
        $userFotoStoragePath = 'public/' . $userFotoPath;


        \App\Models\Profile::factory()->create([
            'user_id' => $regularUser->id,
            'birthday' => Carbon::now()->subYears(rand(18, 50))->format('Y-m-d'),
            'foto' => $userFotoPath, 
            'bio' => 'Dit is een voorbeeld bio voor de gebruiker.',
        ]);
    }
}
