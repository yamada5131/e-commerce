<?php

namespace Database\Factories;

use App\Models\Address;
use App\Models\OrderDetail;
use App\Models\OrderStatus;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;

/**
 * @extends Factory<OrderDetail>
 */
class OrderDetailFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<Model>
     */
    protected $model = OrderDetail::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'order_date' => fake()->dateTimeThisYear,
            'address_id' => Address::factory(),
            'order_total' => fake()->randomFloat(2, 100, 1000),
            'order_status_id' => OrderStatus::factory(),
        ];
    }
}
