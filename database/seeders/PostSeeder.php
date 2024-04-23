<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Post::query()->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        Category::query()
            ->each(fn($category) => Post::factory(5)
                ->create()
                ->each(function ($post) use ($category) {
                    $post->categories()->sync($category);
                })
            );

//        Post::factory(20)->create();
    }
}
