<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class PostFactory extends Factory
{
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $posts= Category::pluck('id')->toArray();

        return [
            'title' => fake()->word(),
            'description' => fake()->text(),
            'slug'  => fake()->slug(),
            'domain' => fake('en')->domainName,
            'likes' => fake()->numberBetween(1,100),
            'category_id' => fake()->randomElement($posts),
            'is_banned' => fake()->boolean(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
