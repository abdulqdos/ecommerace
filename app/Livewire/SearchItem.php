<?php

namespace App\Livewire;

use App\Models\Item;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\Component;

class SearchItem extends Component
{

    #[Url(as: 'q',except: '')]
    public $searchText ;
    public $placeholder ;
    public $featured = false ;


    #[On('search:clear')]
    public function clear() {
        $this->reset( 'searchText');
    }



    public function render()
    {
        $query = Item::query();

        if (!empty($this->searchText)) {
            $query->where('name', 'LIKE', '%' . $this->searchText . '%');
        }


        return view('livewire.search-item',[
            'results' => $query->get(),
        ]);
    }


}
