<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'product_name' => $this->faker->unique()->name(),
            'category_id' => 1,
            'price' => 10000,
            'image' => "product_image/contoh.jpg",
        ];
    }
}
