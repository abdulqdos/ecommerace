<?php

namespace App\Livewire\Admin;

use App\Livewire\Admin;
use App\Models\Customer;
use Livewire\Attributes\Title;
use Livewire\Component;

class ShowCustomer extends Admin
{
    public ?Customer $customer ;
    #[title('Show Customer details')]
    public function moount(Customer $customer)
    {
        $this->customer = $customer;
    }

    public function render()
    {
        return view('livewire.admin.show-customer');
    }
}
