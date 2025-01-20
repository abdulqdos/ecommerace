<?php

namespace App\Livewire;

use App\Models\cartItem;
use App\Models\User;
use Livewire\Attributes\Title;
use Livewire\Component;

class Cart extends Component
{
    #[Title('Cart')]
    public $items ;
    public $user ;


    public function mount(User $user)
    {
        $this->user = $user;
        $this->items = $user->cart->items;
    }

    public function deleteItem(cartItem $item)
    {
        if ($item) {
            $item->delete();
        }

        $this->items = $this->user->cart->items;

        $this->dispatch('cart-updated');
        session()->flash('success', 'Item deleted successfully.');
    }


    public function render()
    {
        return view('livewire.cart' , [
            'items' => $this->items,
        ]);
    }
}
