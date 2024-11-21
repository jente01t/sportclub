<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Message;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Message::create([
            'chat_id' => 1,
            'user_id' => 1,
            'content' => 'Hallo, hoe gaat het?',
        ]);

        Message::create([
            'chat_id' => 1,
            'user_id' => 2,
            'content' => 'Goed, met jou?',
        ]);

        Message::create([
            'chat_id' => 1,
            'user_id' => 1,
            'content' => 'Ook goed, bedankt.',
        ]);

        Message::create([
            'chat_id' => 1,
            'user_id' => 1,
            'content' => 'Vanavond gaan sporten?',
        ]);

        Message::create([
            'chat_id' => 1,
            'user_id' => 2,
            'content' => 'Is goed, hoe laat?',
        ]);

        Message::create([
            'chat_id' => 1,
            'user_id' => 1,
            'content' => 'Om 19:00 uur?',
        ]);

        Message::create([
            'chat_id' => 1,
            'user_id' => 2,
            'content' => 'Prima, tot dan!',
        ]);
    }
}
