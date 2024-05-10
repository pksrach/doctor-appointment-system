<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Doctor>
 */
class DoctorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'speciality' => $this->faker->word(),
            'member_since' => $this->faker->date(),
            'phone' => $this->faker->phoneNumber(),
            'address' => $this->faker->address(),
            'status' => $this->faker->randomElement([0, 1]),
        ];
    }
}
