<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Carrier>
 */
class CarrierFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id' => Str::uuid(),
            'name' => $this->faker->company,
            'price' => $this->faker->numberBetween(1000, 10000),
            'city' => $this->faker->city,
            'limit' => $this->faker->numberBetween(1, 100),
        ];
    }
}
