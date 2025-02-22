<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\City;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Address>
 */
class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $city = City::factory()->create();
        return [
            'address' => $this->faker->address,
            'post' => $this->faker->postcode,
            'name' => $this->faker->name,
            'latitude' => $this->faker->latitude,
            'longitude' => $this->faker->longitude,
            'status' => $this->faker->boolean,
            'plaque' => $this->faker->boolean,
            'city_id' => $city->id,
            'unit' => $this->faker->optional()->randomNumber(2), 
            'number' => $this->faker->phoneNumber,
        ];
    }
}
