<?php

namespace App\Livewire;

use App\Models\cartItem;
use Livewire\Component;
use App\Models\Cart;
use App\Models\User;
use App\Models\Item;

class AddToCart extends Component
{
    public $user ;
    public $item ;
    public $cart;
    public $flag = false;

    public function mount($user, $item)
    {
        $this->user = $user;
        $this->item = $item;
        $this->checkCartStatus();
    }

    public function checkCartStatus()
    {
        if($this->user->cart != null)
        {
            foreach($this->user->cart->items as $item)
            {
                if($item->id == $this->item->id) {
                    $this->flag = true;
                }
            }
        }
    }

    public function addToCart()
    {
        if($this->user->cart == null)
        {
            $this->cart = Cart::create([
                'user_id' => $this->user->id,
            ]);
        } else {
            $this->cart = $this->user->cart;
        }
        CartItem::create([
            'cart_id' => $this->cart->id,
            'item_id' => $this->item->id,
            'quantity' => 1,
            'price' => $this->item->price,
        ]);

        $this->flag = true;

        $this->dispatch('cart-updated');
    }

    public function render()
    {
        return view('livewire.add-to-cart');
    }
}
