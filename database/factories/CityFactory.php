<?php

namespace Database\Factories;

use App\Models\City;
use App\Models\Country;
use Illuminate\Database\Eloquent\Factories\Factory;

class CityFactory extends Factory
{
    public function definition(): array
    {
        $countries = Country::pluck('id')->toArray();

        return [
            'title' => fake()->city(),
            'description' => fake()->text(),
            'country_id' => fake()->randomElement($countries),
            'population' => fake()->randomNumber(5, true),
        ];
    }
}
