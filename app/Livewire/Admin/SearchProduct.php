<?php

namespace App\Livewire\Admin;

use App\Models\Item;
use Livewire\Attributes\Isolate;
use Livewire\Attributes\On;
use Livewire\Attributes\Session;
use Livewire\Attributes\Url;
use Livewire\Attributes\Validate;
use Livewire\Component;


#[Isolate]
class SearchProduct extends Component
{
//    use withPagination ;
    #[Url(as: 'q',except: '')]
    public $searchText;
    public $placeholder ;
    public $featured = false ;


    #[On('search:clear')]
    public function clear() {
        $this->reset( 'searchText');
    }

    public function setFeatured(bool $featured)
    {
        $this->featured = $featured;
    }


    public function delete(Item $product)
    {
        $product->delete();
    }

    public function render()
    {
        $query = Item::query();

        if (!empty($this->searchText)) {
            $query->where('name', 'LIKE', '%' . $this->searchText . '%');
        }

        if ($this->featured) {
            $query->where('featured', true);
        }

        return view('livewire.admin.search-product', [
            'products' => $query->get(),
        ]);
    }
}
