<?php

namespace App\Livewire;

use App\Livewire\Forms\customerForm;
use Livewire\Attributes\Title;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
class Checkout extends Component
{
    #[title('checkout')]
    public $cart ;

    public ?customerForm $form ;

    public function mount()
    {
        $this->cart = Auth::user()->cart;
    }

    public function save()
    {
        $this->form->store();
        session()->flash('success', 'Your order has been placed successfully!');
        $this->redirect('/', navigate: true);
    }
    public function render()
    {
        return view('livewire.checkout');
    }
}
