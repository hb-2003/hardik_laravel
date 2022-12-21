<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Faker\Factory;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        User::create([
            'first_name' => $faker->firstName,
            'last_name' => $faker->lastName,
            'user_name' => 'admin',
            'email' => 'admin@mailinator.com',
            'email_verified_at' => now(),
            'role' => 1,
            'password' => Hash::make('password')
        ]);
        User::create([
            'first_name' => $faker->firstName,
            'last_name' => $faker->lastName,
            'user_name' => 'user',
            'email' => 'user@mailinator.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password')
        ]);
        User::factory(2)->create();
    }
}
