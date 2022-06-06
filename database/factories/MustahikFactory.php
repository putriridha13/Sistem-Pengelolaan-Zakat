<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MustahikFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'  => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'address' => $this->faker->address(),
            'phone_number' => $this->faker->numberBetween(0, 999999999999)
        ];
    }
}
