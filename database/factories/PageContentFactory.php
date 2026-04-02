<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PageContent>
 */
class PageContentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'page_id' => fake()->numberBetween(1, 5),
            'type' => fake()->randomElement(['text', 'image', 'video']),
            'title' => fake()->sentence(),
            'subtitle' => fake()->sentence(),
            'image' => fake()->imageUrl(),
            'description' => fake()->paragraph(),
            'number' => fake()->numberBetween(1, 500),
            'button_text' => fake()->sentence(),
            'button_link' => fake()->url(),
        ];
    }
}
