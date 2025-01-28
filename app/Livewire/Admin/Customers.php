<?php

namespace App\Livewire\Admin;

use App\Livewire\Admin;
use App\Models\Customer;
use Livewire\Attributes\Title;
use Livewire\Component;

class Customers extends Admin
{
    #[title('customers')]
    public function render()
    {
        return view('livewire.admin.customers' ,
        [
            'customers' => Customer::all(),
        ]);
    }
}
