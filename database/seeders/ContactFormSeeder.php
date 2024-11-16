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
            'message' => 'This is a test message from John Doe.',
            'answered' => false,
        ]);

        ContactForm::create([
            'name' => 'Jane Smith',
            'email' => 'jane@example.com',
            'message' => 'This is a test message from Jane Smith.',
            'answered' => true,
        ]);

        ContactForm::create([
            'name' => 'Alice Johnson',
            'email' => 'alice@example.com',
            'message' => 'This is a test message from Alice Johnson.',
            'answered' => false,
        ]);
    }
}
