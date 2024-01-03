<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
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
            'payment_method' => fake()->randomElement(['貨到府款', '線上支付', '銀行轉帳', '信用卡']),
            'is_paid' => fake()->randomElement(['已付款', '未付款']),
            'receiver_name' => fake()->name,
            'status' => fake()->randomElement(['審核中', '出貨中', '已出貨', '已送達', '已完成', '已取消']),
        ];
    }
}
