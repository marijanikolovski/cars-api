<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'brand' => $this->faker->randomElement(['Alfa Romeo', 'Ferrari', 'McLaren']),
            'model' =>  $this->faker->text($maxNbChars = 20),
            'year' => $this->faker->numberBetween(1990, 2022),
            'max_speed' => $this->faker->numberBetween(0, 400),
            'is_automatic' => $this->faker->boolean(),
            'engine' => $this->faker->randomElement(['diesel', 'electric', 'petrol', 'hybird']),
            'number_of_doors' =>  $this->faker->numberBetween(2, 10),
        ];
    }
}
