<?php

namespace Database\Factories;

use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClientFactory extends Factory
{
    protected $model = Client::class;
    public function definition()
    {
      $lastCode = 0;
      return [
          'name' => $this->faker->company,
          'tin' => $this->faker->unique()->randomNumber(9),
          'code' => 'RSC: ' . str_pad(++$lastCode, 4, '0', STR_PAD_LEFT),
          'address' => $this->faker->address,
          'phone' => $this->faker->phoneNumber(),
          'created_at' => now()
        ];
    }

}
