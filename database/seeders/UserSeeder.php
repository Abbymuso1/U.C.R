<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        User::truncate();

        User::insert([
            [
                'name' => "Admin1",
                'email' => "admin@gmail.com",
                'user_type' => "admin",
                'email_verified_at' => now(),
                'password' => Hash::make('password123'), // password
                'remember_token' => Str::random(10),
                'created_at' => now()
            ],
            [
                'name' => "user1",
                'email' => "user1@gmail.com",
                'user_type' => "user",
                'email_verified_at' => now(),
                'password' => Hash::make('password123'), // password
                'remember_token' => Str::random(10),
                'created_at' => now()
            ],

        ]);
    }
}
