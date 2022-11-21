<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Puskesmas>
 */
class PuskesmasFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition()
  {
    return [
      'username' => 'puskesmas',
      'nama' => 'admin puskesmas',
      'password' => bcrypt('pass123'),
    ];
  }
}
