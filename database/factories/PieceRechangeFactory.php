<?php

namespace Database\Factories;

use App\Models\PieceRechange;
use Illuminate\Database\Eloquent\Factories\Factory;

class PieceRechangeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PieceRechange::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nom_piece' => $this->faker->words(3, true),
            'référence_piece' => $this->faker->unique()->word,
            'fournisseur' => $this->faker->company,
            'prix' => $this->faker->randomFloat(2, 10, 100),
        ];
    }
}
