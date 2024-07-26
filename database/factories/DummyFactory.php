<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Dummy>
 */
class DummyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'column_one' => fake()->sentence(2),
            'column_two' => fake()->sentence(2),
            'column_three' => fake()->sentence(2),
            'column_four' => fake()->sentence(2),
        ];
    }
}
