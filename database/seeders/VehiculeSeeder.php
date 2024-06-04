<?php

namespace Database\Seeders;

use App\Models\Vehicule;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class VehiculeSeeder extends Seeder
{
    public function run()
    {
        $vehicules = [
            [
                'marque' => 'Toyota',
                'modèle' => 'Corolla',
                'type_carburant' => 'Essence',
                'immatriculation' => 'ABC123',
                'photo' => 'photos/toyota_corolla.jpg',
                'clientID' => 1,
            ],
            [
                'marque' => 'Honda',
                'modèle' => 'Civic',
                'type_carburant' => 'Essence',
                'immatriculation' => 'XYZ789',
                'photo' => 'photos/honda_civic.jpg',
                'clientID' => 1,
            ],
            // Add more vehicules as needed
        ];

        foreach ($vehicules as $vehiculeData) {
            $photoPath = null;
            if (isset($vehiculeData['photo'])) {
                $photoPath = Storage::disk('public')->putFile('', $vehiculeData['photo']);
            }

            Vehicule::create([
                'marque' => $vehiculeData['marque'],
                'modèle' => $vehiculeData['modèle'],
                'type_carburant' => $vehiculeData['type_carburant'],
                'immatriculation' => $vehiculeData['immatriculation'],
                'photo' => $photoPath,
                'clientID' => $vehiculeData['clientID'],
            ]);
        }
    }
}
