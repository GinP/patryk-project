<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\User::create([
            'name' => 'admin',
            'surname' => 'admin',
            'nick' => 'admin',
            'city' => 'test',
            'email' => 'admin@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password')
        ]);
        factory(\App\User::class, 25)->create();
        factory(\App\Category::class, 5)->create();
        factory(\App\Advert::class, 100)->create();
    }
}
