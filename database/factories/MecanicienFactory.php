<?php

namespace Database\Factories;

use App\Models\Mecanicien;
use App\Models\User;
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

        /**
     * Configure the model factory.
     *
     * @return $this
     */
    public function configure()
    {
        return $this->afterCreating(function (Mecanicien $mecanicien) {
            // Create a user with the client's information
            User::factory()->create([
                'name' => $mecanicien['firstname'] . ' ' . $mecanicien['lastname'],
                'email' => $mecanicien->email,
                'password' => $mecanicien->password,
                'role' => 'editor',
            ]);
        });
    }
}
