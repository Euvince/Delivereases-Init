<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory()->count(15)->create()->each(function ($user) {
            \App\Models\Comment::factory()->count(rand(2, 3))->create([
                'user_id' => $user->id
            ]);
            \App\Models\Order::factory()->count(rand(2, 5))->create([
                'user_id' => $user->id
            ])->each(function ($commande) {
                \App\Models\Product::factory()->count(rand(5, 10))->create([
                    'commande_id' => $commande->id
                ]);
            });
        });
    }
}
