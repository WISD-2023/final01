<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MembersFriend>
 */
class MembersFriendFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // 生成隨機的建立日期，限制在 2023 年到 2024 年之間
        $createdDate = fake()->dateTimeBetween('2023-01-01', '2024-12-31');

        return [
            //
            'date' => $createdDate,
        ];
    }
}
