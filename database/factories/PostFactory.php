<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class PostFactory extends Factory
{
    protected $model = Post::class;

    public function definition(): array
    {
        return [
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'title' => $this->faker->word(),
            'description' => $this->faker->text(),
            'likes' => $this->faker->randomNumber(),
            'is_published' => $this->faker->numberBetween(0, 1),
            'category_id' => $this->faker->numberBetween(1, 10),
        ];
    }
}
