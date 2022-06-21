<?php

namespace Taheri\Todolist\Database\Factories;

use Orchestra\Testbench\Factories\UserFactory as TestbenchUserFactory;
use Taheri\Todolist\Tests\User;


class UserFactory extends User
{
  protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
            'remember_token' => \Illuminate\Support\Str::random(10),
            'token'=> \Illuminate\Support\Str::random(10)
        ];
    }
}