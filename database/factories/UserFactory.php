<?php

namespace Database\Factories;

use App\Models\Department;
use App\Models\WorkPosition;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'role' => $this->faker->randomElement(['user', 'worker', 'admin']),
            'department_id' => Department::get()->random()->id,
            'position_id' => WorkPosition::get()->random()->id,
            'about' => $this->faker->word(),
            'type' => $this->faker->randomElement(['front', 'back']),
            'github' => $this->faker->word(),
            'city' => $this->faker->city(),
            'phone' => $this->faker->phoneNumber(),
            'birthday' => now(),
            'email_verified_at' => now(),
            'password' => Str::random(50),
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
