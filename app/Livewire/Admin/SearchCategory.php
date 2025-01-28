<?php

namespace App\Livewire\Admin;

use App\Models\Category;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\Component;

class SearchCategory extends Component
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

    public function delete(Category $category)
    {
        $category->delete();
    }
    public function render()
    {
        $query = Category::query();

        if(!empty($this->searchText))
        {
            $query->where('name', 'LIKE', '%' . $this->searchText . '%');
            $this->all = false ;
        }

        return view('livewire.admin.search-category' ,
        [
            'categories' => $query->get(),
        ]);
    }
}
