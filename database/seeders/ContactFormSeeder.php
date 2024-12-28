<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ContactForm;

class ContactFormSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ContactForm::create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'message' => 'Dit is een bericht van John Doe.',
            'answered' => false,
        ]);

        ContactForm::create([
            'name' => 'Jane Smith',
            'email' => 'jane@example.com',
            'message' => 'Dit is een bericht van Jane Smith.',
            'answered' => true,
        ]);

        ContactForm::create([
            'name' => 'Alice Johnson',
            'email' => 'alice@example.com',
            'message' => 'Dit is een bericht van Alice Johnson.',
            'answered' => false,
        ]);
    }
}
