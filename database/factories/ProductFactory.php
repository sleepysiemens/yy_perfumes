<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Person;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->name;
        $description = fake()->text;

        return [
            'slug' => Str::slug($title),
            'img' => 'none',
            'category_id' => Category::inRandomOrder()->first()->id,
            'people_id' => Person::inRandomOrder()->first()->id,
            'title' => [
                'en' => $title,
                'ru' => $title,
            ],
            'description' => [
                'en' => $description,
                'ru' => $description,
            ],
            'cost' => rand(150, 300),
            'cost_dealer' => rand(120, 140),
            'cost_vip_dealer' => rand(70, 120),
        ];
    }
}
