<?php

namespace App\Livewire\Forms;

use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Form;

class customerForm extends Form
{
    public ?customer $customer ;

    public $cart ;
    #[validate('required|min:4|string|regex:/^[a-zA-Z ]+$/')]
    public $firstName;

    #[validate('required|min:4|string|regex:/^[a-zA-Z ]+$/')]
    public $lastName;

    #[validate('required|numeric')]
    public $phone;

    #[validate('required|min:5|string')]
    public $address;

    #[validate('required|min:2|string|regex:/^[a-zA-Z ]+$/')]
    public $city;

    #[validate('nullable|email')]
    public $email;



    public function store()
    {
        $this->cart = Auth::user()->cart;

        $this->validate();

        $customer = Customer::create([
            'first_name' => $this->firstName,
            'last_name' => $this->lastName,
            'phone' => $this->phone,
            'address' => $this->address,
            'city' => $this->city,
            'email' => $this->email
        ]);


        $order = order::create([
            'customer_id' => $customer->id,
            'status' => 'pending',
            'total' => $this->cart->total
        ]);

        foreach ($this->cart->items as $cartItem) {
             OrderItem::create([
                'order_id' => $order->id,
                'item_id' => $cartItem->pivot->item_id,
                'quantity' => $cartItem->pivot->quantity,
                'price' => $cartItem->price,
                'total' => $cartItem->price * $cartItem->pivot->quantity
            ]);
        }


        $this->cart->items()->detach();

        $this->cart->update(['total' => 0]);
    }
}
