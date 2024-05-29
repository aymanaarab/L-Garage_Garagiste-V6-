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
            'email' => 'editor@test.com',
            'name' => "editor",
            "password" => Hash::make('password'),
            "role" => "editor"

        ]);
    }
}
