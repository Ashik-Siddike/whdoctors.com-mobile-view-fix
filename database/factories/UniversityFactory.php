<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\University>
 */
class UniversityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'type' => fake()->randomElement(['public', 'private']),
            'image' => fake()->imageUrl(),
            'name' => fake()->company(),
            'location' => fake()->address(),
            'program' => fake()->sentence(),
            'tuition_fee' => fake()->numberBetween(1000, 10000),
            'living_cost' => fake()->numberBetween(1000, 10000),
            'application_date' => fake()->date(),
            'admission_requirements' => fake()->paragraph(),
        ];
    }
}
