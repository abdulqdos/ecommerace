<?php

namespace App\Livewire\Admin;

use App\Models\Order;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\Component;

class SearchOrders extends Component
{

    #[Url(as: 'q',except: '')]
    public $searchText;
    public $placeholder ;
    public $status = ' ';

    #[On('search:clear')]
    public function clear() {
        $this->reset( 'searchText');
    }


    public function setStatus($status = ' ')
    {
        $this->status = $status;
    }

    public function delete(Order $order)
    {
        $order->delete();
    }

    public function render()
    {
        $query = Order::query();

        if (!empty($this->searchText)) {
            $query->whereHas('customer', function ($q) {
                $q->where('first_name', 'LIKE', '%' . $this->searchText . '%');
            });
        }



        if ($this->status === 'pending') {
            $query->where('status', 'pending');
        } elseif ($this->status === 'shipped') {
            $query->where('status', 'shipped');
        } elseif ($this->status === 'delivered') {
            $query->where('status', 'delivered');
        } else {
            $this->status = ' ';
        }

        return view('livewire.admin.search-orders', [
            'orders' => $query->get(),
        ]);



    }
}
