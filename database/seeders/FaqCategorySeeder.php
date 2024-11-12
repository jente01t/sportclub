<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\FaqCategory;

class FaqCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FaqCategory::create(['name' => 'Algemeen']);
        FaqCategory::create(['name' => 'Lidmaatschap']);
        FaqCategory::create(['name' => 'Faciliteiten']);
    }
}
