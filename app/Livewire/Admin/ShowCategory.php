<?php

namespace App\Livewire\Admin;

use App\Livewire\Admin;
use App\Models\Category;
use Livewire\Component;

class ShowCategory extends Admin
{
    public ?Category $category ;
    public function mount(Category $category)
    {
        $this->category = $category ;
    }
    public function render()
    {
        return view('livewire.admin.show-category',
            [
                'category' => $this->category,
            ]);
    }
}
