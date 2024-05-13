<?php

namespace Database\Seeders;

use App\Models\Appointment;
use App\Models\Location;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        // Generate location
        Location::factory(10)->create();

        /*// Generate customer
        User::factory(10)->create([
            'role' => Role::CUSTOMER,
            'password' => bcrypt('123456')
        ])->each(function ($user) {
            $user->customer()->create(Customer::factory()->raw());
        });

        // Generate user
        User::factory(10)->create([
            'password' => bcrypt('123456')
        ]);

        User::factory(
            [
                'email' => 'admin@gmail.com',
                'role' => Role::ADMIN,
                'password' => bcrypt('123456'),
                'email_verified_at' => now(),
            ]
        )->create();*/


        // Generate user
        User::factory(10)->create([
            'password' => bcrypt('123456')
        ]);

        User::factory(
            [
                'email' => 'admin@gmail.com',
                'role' => Role::ADMIN,
                'password' => bcrypt('123456'),
                'email_verified_at' => now(),
            ]
        )->create();

        Appointment::factory(20)->create();

    }
}
