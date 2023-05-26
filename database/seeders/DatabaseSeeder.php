<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        // \App\Models\User::factory(10)->create();

        $user = \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
         ]);

        $token = $user->createToken('api_token')->plainTextToken;

        $user->update(['api_token' => $token]);

         $user = \App\Models\User::factory()->create([
             'name' => 'Admin User',
             'email' => 'admin@example.com',
             'is_admin' => true,
         ]);

        $token = $user->createToken('api_token')->plainTextToken;

        $user->update(['api_token' => $token]);

         $this->call([
             DrinkSeeder::class
         ]);
    }
}
