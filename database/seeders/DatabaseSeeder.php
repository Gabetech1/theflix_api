<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        User::create([
             'name' => 'Gabe',
             'email' => 'gabrielabk1@gmail.com',
             'password' => '0546747672'
         ]);

        User::create([
             'name' => 'Flix',
             'email' => 'info@flixshipping.com',
             'password' => 'Flix@Ship23'
         ]);
    }
}