<?php

namespace Database\Factories;

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
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'firstName' => fake()->firstName(),
            'lastName' => fake()->lastName(),
            'sigla' => fake()->word(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'admin' => '0',
            'picture' => 'assets/img/avatars/5.png',
            'contact' => '911222333',
            'ativo' => '1',
            'role' => 'Pentester'
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }


    public function admin()
    {
        return $this->state(function (array $attributes) {
            return [
              'firstName' => 'Daniel',
              'lastName' => 'Reis',
              'sigla' => $this->faker->str_limit($this->faker->word(), 3, ''),
              'email' => 'admin@admin.pt',
              'email_verified_at' => now(),
              'password' => bcrypt('admin'), // password
              'remember_token' => Str::random(10),
              'admin' => 1,
              'manager' => 0,
              'picture' => 'assets/img/avatars/5.png',
              'contact' => '911222333',
              'ativo' => '1',
              'role' => 'Head of IT'
            ];
        });
    }

    /*php artisan tinker -> app/models/user::factory()->admin()->create()*/

    public function manager()
    {
        return $this->state(function (array $attributes) {
            return [
              'firstName' => 'Daniel',
              'lastName' => 'Reis',
              'sigla' => fake()->word(),
              'email' => 'manager@manager.pt',
              'email_verified_at' => now(),
              'password' => bcrypt('manager'), // password
              'remember_token' => Str::random(10),
              'admin' => 0,
              'manager' => 1,
              'picture' => 'assets/img/avatars/5.png',
              'contact' => '911222333',
              'ativo' => '1',
              'role' => 'Team Lead'
            ];
        });
    }
}
