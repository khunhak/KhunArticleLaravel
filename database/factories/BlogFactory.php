<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blog>
 */
class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'category_id'=>Category::factory(),
            'user_id'=>User::factory(),
            'title'=>fake()->sentence(),
            'intro'=>fake()->sentence(),
            'slug'=>fake()->slug(),
            'body'=>fake()->paragraph()

        ];
    }
}
