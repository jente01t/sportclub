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
                $commentContent = $this->generateCommentContent($news->title, $user->name);
                Comment::create([
                    'news_id' => $news->id,
                    'user_id' => $user->id,
                    'content' => $commentContent,
                ]);
            }
        }
    }
    private function generateCommentContent($newsTitle, $userName)
    {
        switch ($newsTitle) {
            case 'Nieuwe Dumbbells Beschikbaar':
                return "Geweldig nieuws! Ik kan niet wachten om de nieuwe dumbbells uit te proberen. - $userName";
            case 'Marathon Evenement':
                return "Ik heb me net ingeschreven voor de marathon. Dit wordt een geweldige uitdaging! - $userName";
            default:
                return "Interessant nieuws! - $userName";
        }
    }
}