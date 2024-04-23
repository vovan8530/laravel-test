<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        Category::factory(10)->create();
        $tags = Tag::factory(50)->create();
        $posts = Post::factory(200)->create();

        foreach ($posts as $post) {
            $tagIds = $tags->random(2)->pluck('id');
            $post->tags()->sync($tagIds);
        }
    }
}
