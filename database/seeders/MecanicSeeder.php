<?php

namespace Database\Seeders;

use App\Models\Mecanicien;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class MecanicSeeder extends Seeder
{
    public function run()
    {
        $mecaniciens = [
            [
                'firstname' => 'John',
                'lastname' => 'Doe',
                'email' => 'john.doe@example.com',
                'password' => bcrypt('password123'),
                'adresse' => '123 Main St',
                'tel' => '1234567890',
            ],
            [
                'firstname' => 'Jane',
                'lastname' => 'Smith',
                'email' => 'jane.smith@example.com',
                'password' => 'password456',
                'adresse' => '456 Elm St',
                'tel' => '9876543210',
            ],
            // Add more mecaniciens as needed
        ];

        foreach ($mecaniciens as $mecanicienData) {
            $user = User::create([
                'name' => $mecanicienData['firstname'] . ' ' . $mecanicienData['lastname'],
                'email' => $mecanicienData['email'],
                'password' => Hash::make($mecanicienData['password']),
                'role' => 'editor',
            ]);

            Mecanicien::create([
                'firstname' => $mecanicienData['firstname'],
                'lastname' => $mecanicienData['lastname'],
                'email' => $mecanicienData['email'],
                'password' => $mecanicienData['password'],
                'adresse' => $mecanicienData['adresse'],
                'tel' => $mecanicienData['tel'],
                'userId' => $user->id,
            ]);
        }
    }
}
