<?php

namespace Database\Factories;
use App\Models\Market;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Seller>
 */
class SellerFactory extends Factory
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
            'type' => fake()->randomElement(['個人賣家', '企業賣家']),
            'status' => fake()->randomElement(['線上', '離線']),
            'rating' => fake()->randomFloat(1, 0, 5),

        ];
    }
}
