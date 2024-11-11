<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\News;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::first();

        if (!$user) {
            $user = User::factory()->create();
        }

        $imagePath1 = 'news/test.png';
        $imagePath2 = 'news/test2.png';

        News::create([
            'title' => 'Eerste Nieuwsbericht',
            'image_path' => $imagePath1,
            'content' => 'Dit is de inhoud van het eerste nieuwsbericht.',
            'published_at' => Carbon::now()->toDateString(),
            'user_id' => $user->id,
        ]);

        News::create([
            'title' => 'Tweede Nieuwsbericht',
            'image_path' => $imagePath2,
            'content' => 'Dit is de inhoud van het tweede nieuwsbericht.',
            'published_at' => Carbon::now()->subDays(1)->toDateString(),
            'user_id' => $user->id,
        ]);
    }
}
