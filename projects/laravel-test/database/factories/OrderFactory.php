<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
            'user_id'      => random_int(1, 10),
            'code'         => Str::random(24),
            'note'         => fake()->paragraph,
            'total_amount' => mt_rand(100 * 100, 1000 * 100) / 100,
            'status'       => random_int(0, 1)
        ];
    }
}
