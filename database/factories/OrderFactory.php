<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    public function definition(): array
    {
        return [
            'customer_id' => Customer::factory()->create()->id,
            'total' => $this->faker->randomFloat(2, 20, 500),
            'status' => $this->faker->randomElement(['pending', 'shipped', 'delivered']),
            'order_date' => now(),
        ];
    }
}
