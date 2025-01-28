<?php

namespace App\Livewire\Admin;

use App\Models\Customer;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\Component;

class SearchCustomers extends Component
{
    #[Url(as: 'q',except: '')]
    public $searchText;
    public $placeholder ;
    public $status = ' ';
    public $all = true ;

    #[On('search:clear')]
    public function clear() {
        $this->reset( 'searchText');
        $this->all = true ;
    }


    public function render()
    {
        $query = Customer::query();

        if (!empty($this->searchText))
        {
            $query->where(function ($subQuery) {
                $subQuery->where('first_name', 'LIKE', '%' . $this->searchText . '%')
                    ->orWhere('last_name', 'LIKE', '%' . $this->searchText . '%');
            });

            $this->all = false;
        }

        return view('livewire.admin.search-customers' ,
        [
            'customers' => $query->get(),
        ]);
    }
}
