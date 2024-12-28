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

        $imagePath1 = 'news/news1.png';
        $imagePath2 = 'news/news2.png';

        News::create([
            'title' => 'Nieuwe Dumbbells Beschikbaar',
            'image_path' => $imagePath1,
            'content' => 'We hebben nieuwe dumbbells beschikbaar in onze fitnessruimte. Kom langs en probeer ze uit!',
            'published_at' => Carbon::now()->toDateString(),
            'user_id' => $user->id,
        ]);

        News::create([
            'title' => 'Marathon Evenement',
            'image_path' => $imagePath2,
            'content' => 'Doe mee aan onze jaarlijkse marathon! Het evenement vindt plaats op 25 juni. Schrijf je nu in!',
            'published_at' => Carbon::now()->subDays(1)->toDateString(),
            'user_id' => $user->id,
        ]);
    }
}
