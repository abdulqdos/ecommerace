<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Item;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        Order::factory()->count(5)->create();
        OrderItem::factory()->count(20)->create();
    }
}
