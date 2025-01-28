<?php

namespace App\Livewire\Admin;

use App\Livewire\Admin;
use App\Models\Item;
use Livewire\Attributes\Title;
use Livewire\Component;

class ShowProduct extends Admin
{
    #[title('Show - product')]
    public ?Item $product ;

    public function mount(Item $product)
    {
        $this->product = $product;
    }
    public function render()
    {
        return view('livewire.admin.show-product' ,
        [
            'product' => $this->product,
        ]);
    }
}
