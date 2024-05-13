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
            'fee' => $this->faker->randomFloat(2, 0, 500),
            'member_since' => $this->faker->date(),
            'phone' => '855' . $this->faker->randomElement(['97', '88', '96', '90', '12', '11', '69', '78', '76', '60']) . $this->faker->numerify('######'),
            'address' => $this->faker->address(),
            'status' => $this->faker->randomElement([0, 1]),
        ];
    }
}
