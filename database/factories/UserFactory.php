<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    public function definition(): array
    {
        return [
            'username' => $this->faker->userName(),
            'email' => $this->faker->unique()->safeEmail(),
            'password' => bcrypt('password'),
            'role' => $this->faker->randomElement(['user', 'editor', 'admin']),
        ];
    }

    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => []);
    }
}
