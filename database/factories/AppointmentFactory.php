<?php

namespace Database\Factories;

use App\Models\Customer;
use App\Models\Doctor;
use App\Models\User;
use DateTime;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Appointment>
 */
class AppointmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $doctor = Doctor::factory()->create();
        $patient = Customer::factory()->create();
        return [
            'doctor_id' => $doctor->id,
            'patient_id' => $patient,
            'appointment_date' => $this->faker->dateTimeBetween(
                (new DateTime())->modify('-' . rand(1, 30) . ' days'),
                '+' . rand(1, 12) . ' months'
            ),
            'amount' => $doctor->fee,
            'status' => $this->faker->randomElement(['pending', 'approved', 'rejected']),
        ];
    }
}
