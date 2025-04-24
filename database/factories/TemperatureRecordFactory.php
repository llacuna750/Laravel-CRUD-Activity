<?php

namespace Database\Factories;

use App\Models\TemperatureRecord;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TemperatureRecord>
 */
class TemperatureRecordFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'temperature' => $this->faker->randomFloat(2, -10, 50), // Random temperature between -10 and 50
            'humidity' => $this->faker->randomFloat(2, 0, 100), // Random humidity between 0 and 100
            'recorded_at' => $this->faker->dateTimeThisYear(), // Random timestamp this year
        ];
    }
}
