<?php

namespace App\Livewire;

use App\Models\cartItem;
use Livewire\Attributes\On;
use Livewire\Component;
use App\Models\Cart;
use App\Models\User;
use App\Models\Item;

class AddToCart extends Component
{
    public $user ;
    public $item ;
    public $cart;
    public $addedToCart = false;

    public function mount($user, $item)
    {
        $this->user = $user;
        $this->item = $item;
        $this->checkIfItemInCart();
    }

    #[on('addedToCart')]
    public function checkIfItemInCart()
    {
        $this->addedToCart = $this->user->cart->items->contains($this->item->id);
    }

    public function addToCart()
    {
        if($this->user->cart == null)
        {
            $this->cart = Cart::create([
                'user_id' => $this->user->id,
                'total' => $this->item->price,
            ]);
        } else {
            $this->cart = $this->user->cart;
            $this->cart->total += $this->item->price;
            $this->cart->save();
        }

        CartItem::create([
            'cart_id' => $this->cart->id,
            'item_id' => $this->item->id,
            'quantity' => 1,
            'price' => $this->item->price,
        ]);

        $this->addedToCart = true;

        $this->dispatch('cart-updated');
    }

    public function render()
    {
        return view('livewire.add-to-cart' );
    }
}
