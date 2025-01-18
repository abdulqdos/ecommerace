<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->randomElement([
                'Men\'s Clothing',
                'Women\'s Clothing',
                'Kids\' Clothing',
                'Accessories',
                'Shoes',
                'Sportswear',
            ]),
            'img_url' => $this->faker->imageUrl(),
        ];
    }
}
