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

      $rand = null;
      do {
          $rand = random_int(1, 12);
      } while ($rand == 4 || $rand == 5);

      return [
          'firstName' => $this->faker->firstName(),
          'lastName' => $this->faker->lastName(),
          'sigla' => Str::limit($this->faker->word(), 3, ''),
          'email' => $this->faker->unique()->safeEmail(),
          'email_verified_at' => now(),
          'password' => bcrypt('password'),
          'remember_token' => Str::random(10),
          'admin' => '0',
          'picture' => 'assets/img/avatars/' . $rand . '.png',
          'phone' => $this->faker->phoneNumber,
          'force_password_reset' => '0',
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
  do {
    $rand = random_int(1, 12);
 } while ($rand == 4 || $rand == 5);
    return $this->state([
        'firstName' => 'Daniel',
        'lastName' => 'ADM',
        'sigla' => Str::limit($this->faker->word(), 3, ''),
        'email' => 'admin@admin.pt',
        'email_verified_at' => now(),
        'password' => 'admin', // password
        'remember_token' => Str::random(10),
        'admin' => '2',
        'picture' => 'assets/img/avatars/' . $rand . '.png',
        'phone' => '911222333',
        'force_password_reset' => '0',
        'ativo' => '1',
        'role' => 'Head of IT'
    ]);
}

    /*php artisan tinker -> app/models/user::factory()->admin()->create()*/

    public function manager()
    {
        return $this->state(function (array $attributes) {
            return [
              'firstName' => 'Daniel',
              'lastName' => 'MNGR',
              'sigla' => Str::limit($this->faker->word(), 3, ''),
              'email' => 'manager@manager.pt',
              'email_verified_at' => now(),
              'password' => 'manager', // password
              'remember_token' => Str::random(10),
              'admin' => '1',
              'picture' => 'assets/img/avatars/5.png',
              'phone' => '911222333',
              'force_password_reset' => '0',
              'ativo' => '1',
              'role' => 'Team Lead'
            ];
        });
    }

        /*php artisan tinker -> app/models/user::factory()->manager()->create()*/

    public function pentester()
    {
      do {
        $rand = random_int(1, 12);
     } while ($rand == 4 || $rand == 5);
        return $this->state([
            'firstName' => 'Daniel',
            'lastName' => 'PTSTR',
            'sigla' => Str::limit($this->faker->word(), 3, ''),
            'email' => 'pentester@pentester.pt',
            'email_verified_at' => now(),
            'password' => 'pentester', // password
            'remember_token' => Str::random(10),
            'admin' => '0',
            'picture' => 'assets/img/avatars/' . $rand . '.png',
            'phone' => '911222333',
            'force_password_reset' => '0',
            'ativo' => '1',
            'role' => 'Pentester'
        ]);
    }

        /*php artisan tinker -> app/models/user::factory()->pentester()->create()*/
}
