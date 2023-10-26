<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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
        return [
            "home_address" => $this->faker->address(),
            "home_latitude" => $this->faker->latitude(),
            "home_longitude" => $this->faker->longitude(),
            "district" => $this->faker->city(),
            "road" => $this->faker->streetName(),
        ];
    }
}
