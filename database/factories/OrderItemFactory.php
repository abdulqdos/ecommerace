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
            'order_id' => $this->faker->randomElement([1 , 2 , 3 , 4 , 5 , 6 , 7]),
            'item_id' => $this->faker->numberBetween(51, 100),
            'quantity' => $this->faker->numberBetween(1, 5),
            'price' => 100,
            'total' => function (array $attributes) {
                return $attributes['quantity'] * $attributes['price'];
            },
        ];
    }
}
