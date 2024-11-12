<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\FAQ;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Faq::create([
            'category_id' => 1,
            'question' => 'Wat zijn de openingstijden van de sportclub?',
            'answer' => 'De sportclub is geopend van maandag tot en met vrijdag van 6:00 tot 22:00 uur en in het weekend van 8:00 tot 20:00 uur.',
        ]);

        Faq::create([
            'category_id' => 2,
            'question' => 'Hoe kan ik lid worden van de sportclub?',
            'answer' => 'U kunt lid worden door het inschrijfformulier op onze website in te vullen of door langs te komen bij de receptie van de sportclub.',
        ]);

        Faq::create([
            'category_id' => 3,
            'question' => 'Welke faciliteiten biedt de sportclub?',
            'answer' => 'Onze sportclub biedt een fitnessruimte, een zwembad, groepslessen, een sauna en een café.',
        ]);
    }
}
