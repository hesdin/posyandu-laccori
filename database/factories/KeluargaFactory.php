<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Keluarga>
 */
class KeluargaFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition()
  {
    return [
      'no_kk' => random_int(1000000000000000, 9999999999999999),
      'nama' => $this->faker->name(),
      'alamat' => $this->faker->address(),
      'password' => bcrypt('password'),
    ];
  }
}
