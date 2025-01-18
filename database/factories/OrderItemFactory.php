<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\Item;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderItemFactory extends Factory
{
    public function definition(): array
    {
        return [
            'order_id' => Order::factory(),
            'item_id' => Item::factory(),
            'quantity' => $this->faker->numberBetween(1, 5),
            'price' => $this->faker->randomFloat(2, 10, 100),
            'total' => function (array $attributes) {
                return $attributes['quantity'] * $attributes['price'];
            },
        ];
    }
}
