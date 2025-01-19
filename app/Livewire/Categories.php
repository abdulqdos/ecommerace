<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Attributes\Title;
use Livewire\Component;

class Categories extends Component
{
    public $header = 'أقسامنا';
    #[Title("Categories")]
    public function render()
    {
        return view('livewire.categories' ,
        [
            'categories' => Category::all(),
        ]);
    }
}
