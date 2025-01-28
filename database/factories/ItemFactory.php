<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ItemFactory extends Factory
{
    public function definition(): array
    {
        return [
                'name' => $this->faker->randomElement([
                    'T-Shirt',
                    'Jeans',
                    'Hoodie',
                    'Sneakers',
                    'Jacket',
                    'Scarf',
                    'Sunglasses',
                    'Cap',
                    'Leather Belt',
                    'Formal Shoes',
                    'Sweater',
                    'Blazer',
                    'Maxi Dress',
                    'Athletic Shorts',
                    'Backpack',
                    'Polo Shirt',
                    'Skirt',
                    'Sandals',
                    'Tracksuit',
                    'Winter Coat',
                ]),

                'description' => $this->faker->sentence(10),
                'price' => $this->faker->numberBetween(1, 1000),
                'stock' => $this->faker->numberBetween(1, 100),
                'category_id' => $this->faker->numberBetween(1, 3),
                'featured' => $this->faker->numberBetween(0,1),
                'img_url' => 'categories_photos/ifSrWthVOoAQbcf8f472CjrjxoNrsDUNrtvwnfgf.jpg',
                'created_at' => now(),
                'updated_at' => now(),
        ];
    }
}
