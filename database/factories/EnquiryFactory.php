<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class EnquiryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'firstname' => fake()->firstName(),
            'lastname' => fake()->lastName(),
            'email' => fake()->unique()->safeEmail(),
            'barangay' => fake()->randomElement(['West Tapinac', 'East Tapinac', 'Gordon Heights']),
            'gender' => fake()->randomElement(['Male', 'Female']),
            'occupation' => fake()->randomElement(['Student', 'Self-Employed', 'Professional']),
            'start_by' => fake()->date(),
            'reason' => fake()->randomElement(['Build Muscle', 'Lose Weight', 'Lower Blood Pressure',  'Boost Mental Focus']),
        ];
    }
}
