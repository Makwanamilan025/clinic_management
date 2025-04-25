<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\clinic>
 */
class ClinicFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'=> $this->faker->company(),
            'address_1'=> $this->faker->city(),
            'address_2'=> $this->faker->streetAddress(),
            'opening_time' => $this->faker->time('H:i'),
            'closing_time' => $this->faker->time('H:i'),
        ];
    }
}
