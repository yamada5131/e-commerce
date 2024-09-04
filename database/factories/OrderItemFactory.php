<?php

namespace Database\Factories;

use App\Models\OrderDetail;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;

/**
 * @extends Factory<OrderItem>
 */
class OrderItemFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<Model>
     */
    protected $model = OrderItem::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'order_detail_id' => OrderDetail::factory(),
            'product_id' => Product::factory(),
            'qty' => fake()->numberBetween(1, 10),
            'price' => fake()->randomFloat(2, 10, 100),
        ];
    }
}
