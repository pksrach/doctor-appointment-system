<?php

namespace Database\Factories;

use App\Models\Gender;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'firstname' => $this->faker->firstName(),
            'lastname' => $this->faker->lastName(),
            'gender' => $this->faker->randomElement([Gender::MALE => '1', Gender::FEMALE => '2', Gender::OTHER => '0']),
            'dob' => $this->faker->dateTimeBetween('-60 years', '-18 years'),
            'phone' => '855' . $this->faker->randomElement(['97', '88', '96', '90', '12', '11', '69', '78', '76', '60']) . $this->faker->numerify('######'),
            'location_id' => $this->faker->numberBetween(1, 10),
            'user_id' => User::factory()->create([
                'role' => 'customer',
                'password' => bcrypt('123456')
            ])->id,
        ];
    }
}
