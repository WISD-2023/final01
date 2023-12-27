<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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
        return [
            //
            'name' => fake()->word,
            'description' => fake()->sentence,
            'price' => fake()->numberBetween(10, 5000),
            'stock' => fake()->numberBetween(0, 10),
            'status' => fake()->randomElement(['進貨中', '已入庫']),
            'pic' => 'https://hips.hearstapps.com/hmg-prod/images/new-project-2-1594617464.jpg?crop=0.505xw:1.00xh;0.0228xw,0&resize=640:*',
        ];
    }
}
