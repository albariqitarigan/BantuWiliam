<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'product_name' => $this->faker->words(3, true),
            'description'  => $this->faker->sentence(),
            'price'        => $this->faker->numberBetween(10000, 1000000),
            'stock'        => $this->faker->numberBetween(1, 100),
        ];
    }
}
