<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;
use App\Models\Item;

class ShowItem extends Component
{
    public $item;

    public function mount(Item $item)
    {
        $this->item = $item;
    }
    public function render()
    {
        return view('livewire.show-item');
    }
}
