<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Item;
use Livewire\Component;
use Livewire\WithPagination;

class CategoryItems extends Component
{
    use WithPagination;

    public $category;


    public $header = '';
    public $pageName = 'Category';

    public function mount(Category $category) {
        $this->category = $category;
        $this->header = $category->name . 'قسم';

    }

    public function render()
    {
        $items = $this->category->items()->paginate(9, ['*'], $this->pageName);
        return view('livewire.category-items' , [
            'items' =>  $items,
        ]);
    }
}
