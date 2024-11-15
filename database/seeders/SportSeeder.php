<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Sport;

class SportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sports = [
            'Football',
            'Basketball',
            'Tennis',
            'Swimming',
            'Running',
            'Cycling',
            'Baseball',
            'Volleyball',
            'Hockey',
            'Golf'
        ];

        foreach ($sports as $sport) {
            Sport::create(['name' => $sport]);
        }
    }
}
