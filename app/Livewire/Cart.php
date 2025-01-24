<?php
namespace App\Livewire;

use App\Models\CartItem;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Title;
use Livewire\Component;

class Cart extends Component
{
    #[Title('Cart')]
    public $user;
    public $cartItems;

    public function mount()
    {
        $this->user = Auth::user();
        $this->authorize('view', $this->user->cart);
        $this->cartItems = $this->user->cart->items()->withPivot('quantity', 'price')->get();
//        dd($this->cartItems);

    }

    public function deleteItem(CartItem $item)
    {
        if ($item) {
            $this->user->cart->total -= $item->quantity * $item->price;
            $this->user->cart->save();
            $item->delete(); // حذف العنصر من الجدول `cart_items`

            $this->cartItems = $this->user->cart->items;
            $this->dispatch('cart-updated');
        }
    }

    public function calculateTotal()
    {
        $total = 0;

        foreach ($this->cartItems as $cartItem) {
            $total += $cartItem->pivot->quantity * $cartItem->pivot->price;
        }

        $this->user->cart->total = $total;
        $this->user->cart->save();

        return $total;
    }

    public function decreaseQuantity(CartItem $item)
    {
        if ($item->quantity > 1) {
            $item->quantity--;
            $item->save();
            $this->cartItems = $this->user->cart->items()->withPivot('quantity', 'price')->get();
            $this->calculateTotal();
            $this->dispatch('cart-updated');
        } else {
            session()->flash('error', 'Quantity cannot be less than 1.');
        }
    }

    public function increaseQuantity(CartItem $item)
    {
        $item->quantity++;
        $item->save();

        $this->cartItems = $this->user->cart->items()->withPivot('quantity', 'price')->get();
        $this->calculateTotal();
        $this->dispatch('cart-updated');
    }

    public function save()
    {
        session()->put('cart', $this->user->cart);
        $this->redirectRoute('checkout');
    }

    public function render()
    {
        return view('livewire.cart', [
            'items' => $this->cartItems,
        ]);
    }
}
