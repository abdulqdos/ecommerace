<?php

namespace App\Livewire;

use Livewire\Attributes\On;
use Livewire\Component;

class Counter extends Component
{
    public $cartItems;
    public $user;

    public function mount()
    {
        $this->user = auth()->user();
        if($this->user->cart != null){
            $this->cartItems = $this->user->cart->items;
        }
    }

    #[on('cart-updated')]
    public  function updateCart()
    {
        if($this->user->cart != null){
            $this->cartItems = $this->user->cart->items;
        }
    }


    public function render()
    {
        return view('livewire.counter');
    }
}
