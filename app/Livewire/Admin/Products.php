<?php

namespace App\Livewire\Admin;

use App\Livewire\Admin;
use Livewire\Attributes\Title;
use Livewire\Component;
use App\Models\Item;

class Products extends Admin
{
    #[title('products')]



    public function render()
    {
        return view('livewire.admin.products' ,
           [
               'products' => Item::all(),
           ]
        );
    }
}
