<?php

namespace App\Livewire\Admin;
use App\Livewire\Admin;
use App\Models\Order;
use Livewire\Attributes\Title;
use Livewire\Component;

class Orders extends Admin
{
    #[title('Orders')]
    public function render()
    {
        return view('livewire.admin.orders',
        [
            'orders' => Order::all(),
        ]
        );
    }
}
