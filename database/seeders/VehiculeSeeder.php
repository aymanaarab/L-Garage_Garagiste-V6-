<?php 

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Vehicule;

class VehiculeSeeder extends Seeder
{
    public function run()
    {
        Vehicule::factory()->count(10)->create();
    }
}
