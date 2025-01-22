<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;

class Checkout extends Component
{
    #[title('checkout')]
    public $cart ;

    public function mount()
    {
        $this->cart = session()->get('cart');
    }


    public function render()
    {
        return view('livewire.checkout');
    }
}
