<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Category;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Category::factory(5)->create();

        $user = User::factory()->create([
            'name' => 'John Doe'
        ]);

        Article::factory(20)->create([
            'user_id' => $user->id
        ]);

        Comment::factory(60)->create();
    }
}
