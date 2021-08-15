<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
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
        \App\Models\User::insert([
            'name' => 'Nurlanbek Musaev',
            'email' => 'nurlanbek1@gmail.com',
            'email_verified_at' => now(),
            'type' => 'admin',
            'password' => '123456', // password
            'remember_token' => Str::random(10),
        ]);


        \App\Models\User::factory(1)->create();
    }
}
