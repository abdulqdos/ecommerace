<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Attributes\Title;
use Livewire\Component;

class ShowCategory extends Component
{
    #[Title('Category')]
    public $category;

    public function mount(Category $category) {
        $this->category = $category;
    }
    public function render()
    {
        return view('livewire.show-category');
    }
}
