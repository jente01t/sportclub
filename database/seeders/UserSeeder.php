<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Profile;
use App\Models\Sport;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Admin user
        $adminUser = User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@ehb.be',
            'password' => bcrypt('Password!321'),
            'role' => 'admin',
        ]);

        $adminFotoPath = 'foto/profiel1.png';
        $adminFotoStoragePath = 'public/' . $adminFotoPath;

        $adminProfile = Profile::factory()->create([
            'user_id' => $adminUser->id,
            'birthday' => Carbon::now()->subYears(rand(18, 50))->format('Y-m-d'),
            'foto' => $adminFotoPath, 
            'bio' => 'Ik ben de beheerder van Sportclub en ik zorg ervoor dat alles soepel verloopt.',
        ]);

        // Regular user
        $regularUser = User::factory()->create([
            'name' => 'TestUser',
            'email' => 'user@ehb.be',
            'password' => bcrypt('123'),
            'role' => 'user',
        ]);

        $userFotoPath = 'foto/profiel2.png';
        $userFotoStoragePath = 'public/' . $userFotoPath;

        $regularProfile = Profile::factory()->create([
            'user_id' => $regularUser->id,
            'birthday' => Carbon::now()->subYears(rand(18, 50))->format('Y-m-d'),
            'foto' => $userFotoPath, 
            'bio' => 'Ik ben een enthousiaste sporter die graag deelneemt aan verschillende activiteiten.',
        ]);

        $sports = Sport::all();

        $adminProfile->sports()->attach($sports->random(rand(1, 3)));
        $regularProfile->sports()->attach($sports->random(rand(1, 3)));
    }
}