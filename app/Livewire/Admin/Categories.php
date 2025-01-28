<?php

namespace App\Livewire\Admin;

use App\Livewire\Admin;
use App\Models\Category;
use Livewire\Attributes\Title;
use Livewire\Component;

class Categories extends Admin
{
    #[title('categories')]


    public function render()
    {
        return view('livewire.admin.categories' ,
            [
                'categories' => Category::all(),
            ]);
    }
}
