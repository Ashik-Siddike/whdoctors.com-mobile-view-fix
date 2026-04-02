<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Apply>
 */
class ApplyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->email(),
            'phone' => fake()->phoneNumber(),
            'address' => fake()->address(),
            'passport_front_image' => fake()->imageUrl(),
            'passport_back_image' => fake()->imageUrl(),
            'document' => fake()->imageUrl(),
            'cv' => fake()->imageUrl(),
            'country' => fake()->country(),
            'university' => fake()->company(),
            'course_name' => fake()->jobTitle(),
            'year' => fake()->year(),
        ];
    }
}
