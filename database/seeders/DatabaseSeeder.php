<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\Doctor;
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
        // Generate customer
        User::factory(10)->create(['role' => Role::CUSTOMER])->each(function ($user) {
            $user->customer()->create(Customer::factory()->raw());
        });

        // Generate user
        User::factory(10)->create();

        User::factory(
            [
                'email' => 'admin@gmail.com',
                'role' => Role::ADMIN,
                'password' => bcrypt('123456'),
                'email_verified_at' => now(),
            ]
        )->create();


        // Generate doctor
        Doctor::factory(30)->create();
    }
}
