<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\User;
use App\Models\ViewedProduct;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;

/**
 * @extends Factory<ViewedProduct>
 */
class ViewedProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<Model>
     */
    protected $model = ViewedProduct::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'product_id' => Product::factory(),
            'viewed_at' => fake()->dateTimeBetween('-1 year'),
        ];
    }
}
