<?php

namespace Database\Factories;

use App\Models\Mecanicien;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class MecanicienFactory extends Factory
{
    protected $model = Mecanicien::class;

    public function definition()
    {
        return [
            'firstname' => $this->faker->firstName,
            'lastname' => $this->faker->lastName,
            'email' => $this->faker->unique()->safeEmail,
            'password' => bcrypt('password'), // Change this if you want different passwords
            'adresse' => $this->faker->address,
            'tel' => $this->faker->phoneNumber,
        ];
    }
}
