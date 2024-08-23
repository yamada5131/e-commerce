<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;

/**
 * @extends Factory<Product>
 */
class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<Model>
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->word,
            'description' => fake()->sentence,
            'price' => fake()->randomFloat(2, 10, 100),
            'image_url' => fake()->imageUrl(),
            'qty_in_stock' => fake()->numberBetween(1, 100),
            'product_category_id' => ProductCategory::factory()
        ];
    }
}
