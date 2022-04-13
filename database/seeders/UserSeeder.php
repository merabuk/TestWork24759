<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Product;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory(50)->create()->each(function ($user)
        {
            $products = Product::all()->random(10);
            $user->products()->attach($products);
        });
    }
}
