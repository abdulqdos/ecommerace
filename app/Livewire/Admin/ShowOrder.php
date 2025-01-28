<?php

namespace App\Livewire\Admin;

use App\Livewire\Admin;
use App\Models\Order;
use Livewire\Component;

class ShowOrder extends Admin
{
    public ?Order $order;
    public function mount(Order $order)
    {
        $this->order = $order;
    }

    public function render()
    {
        return view('livewire.admin.show-order'
        , [
            'order' => $this->order,
            ]);
    }
}
