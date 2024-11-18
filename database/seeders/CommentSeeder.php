<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Comment;
use App\Models\News;
use App\Models\User;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $newsItems = News::all();
        $users = User::all();

        foreach ($newsItems as $news) {
            foreach ($users as $user) {
                Comment::create([
                    'news_id' => $news->id,
                    'user_id' => $user->id,
                    'content' => 'This is a comment from ' . $user->name,
                ]);
            }
        }
    }
}
