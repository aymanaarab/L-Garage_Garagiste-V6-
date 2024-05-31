<?php

namespace Database\Factories;

use App\Models\Vehicule;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class VehiculeFactory extends Factory
{
    protected $model = Vehicule::class;

    public function definition()
    {
        return [
            'marque' => $this->faker->company,
            'modèle' => $this->faker->word,
            'type_carburant' => $this->faker->randomElement(['Diesel', 'Petrol', 'Electric', 'Hybrid']),
            'immatriculation' => strtoupper(Str::random(10)),
            'photos' => json_encode([
                'photos/photo1.jpg',
                'photos/photo2.jpg',
                'photos/photo3.jpg'
            ]),
            'clientID' => \App\Models\Client::factory(), // Ensure you have a ClientFactory
        ];
    }
}
