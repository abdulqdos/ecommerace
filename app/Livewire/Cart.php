<?php

namespace App\Livewire;

use App\Models\cartItem;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Title;
use Livewire\Component;

class Cart extends Component
{
    #[Title('Cart')]
    public $user ;
    public $cart ;
    public $items ;

    public function mount()
    {
        $this->user = Auth::user();
        $this->cart = $this->user->cart;
        $this->items = $this->user->cart->items;
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

    public function decreaseQuantity(cartItem $item)
    {
        if ($item->quantity > 1) {
            $item->quantity--;
            $item->save();
            $this->items = $this->user->cart->items;
            $this->dispatch('cart-updated');
        } else {
            session()->flash('error', 'Quantity cannot be less than 1.');
        }
    }

    public function increaseQuantity(cartItem $cartItem)
    {
        $cartItem->quantity++;
        $cartItem->save();
        $this->items = $this->user->cart->items;
        $this->dispatch('cart-updated');
    }

    public function render()
    {
        return view('livewire.cart' , [
            'items' => $this->items,
        ]);
    }
}
