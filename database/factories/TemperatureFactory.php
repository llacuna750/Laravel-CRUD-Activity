<?php

namespace Database\Factories;
use App\Models\Temperature;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Temperature>
 */
class TemperatureFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'sensor_name' => $this->faker->word,
            'temperature' => $this->faker->randomFloat(2, 15, 35),
        ];
    }
}
    