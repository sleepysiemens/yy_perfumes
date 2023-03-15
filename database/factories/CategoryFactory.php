<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
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
            'title' => $title,
            'description' => $description,

            'seo_title' => $title,
            'seo_description' => $description,
        ];
    }
}
