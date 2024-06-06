<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Empty the table first
        DB::table('users')->delete();

        User::create([
            'email' => 'admin@test.com',
            'name' => "admin",
            "password" => Hash::make('123456AA'),
            "role" => "admin"

        ]);
        User::create([
            'email' => 'admin2@test.com',
            'name' => "admin",
            "password" => Hash::make('123456AA'),
            "role" => "admin"

        ]);
        User::create([
            'email' => 'client@test.com',
            'name' => "client",
            "password" => Hash::make('123456AA'),
            "role" => "user"

        ]);
        User::create([
            'email' => 'mecanic@test.com',
            'name' => "mecanic",
            "password" => Hash::make('123456AA'),
            "role" => "editor"

        ]);
    }

}
