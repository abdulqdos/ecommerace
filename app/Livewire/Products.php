<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;
use App\Models\Item;
use Livewire\WithPagination;

class Products extends Component
{
    use WithPagination;
    #[Title('Products')]
    public $header ;

    public function mount($header = 'none')
    {
        $this->header = 'كل المنتجات';
    }

    public $pageName = 'product';

    public function render()
    {
        return view('livewire.products' ,
        [
            'items' =>  Item::paginate(9, ['*'], $this->pageName),
        ]);
    }
}
