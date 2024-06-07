<?php

namespace Database\Seeders;

use App\Models\PieceRechange;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PieceRechangeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PieceRechange::factory()->count(10)->create();
    }
}
