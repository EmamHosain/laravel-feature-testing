<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {


        if (!User::count() > 0) {
            User::create([
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => 'password'
            ]);
        }
        Product::factory()->count(10)->create();




    }
}
