<?php

namespace Database\Factories;

use App\Models\Client;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClientFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Client::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'firstname' => $this->faker->firstName,
            'lastname' => $this->faker->lastName,
            'adresse' => $this->faker->address,
            'tel' => $this->faker->phoneNumber,
            'email' => $this->faker->unique()->safeEmail,
            'password' => bcrypt('password'), // You can customize this as per your password policy
        ];
    }

    /**
     * Configure the model factory.
     *
     * @return $this
     */
    public function configure()
    {
        return $this->afterCreating(function (Client $client) {
            // Create a user with the client's information
            User::factory()->create([
                'firstname' => $client->firstname,
                'lastname' => $client->lastname,
                'email' => $client->email,
                'password' => $client->password,
                'role' => 'user', // Assuming you have a 'role' column in your users table
            ]);
        });
    }
}
