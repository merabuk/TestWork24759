<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $nameOfProduct = $this->faker->word;
        $slug = Str::slug($nameOfProduct);
        return [
            'name' => $nameOfProduct,
            'slug' => $slug,
            'description' => $this->faker->sentences(4, true),
            'price' => $this->faker->randomFloat(2, 100, 9999),
        ];
    }
}
