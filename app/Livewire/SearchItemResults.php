<?php

namespace App\Livewire;

use Livewire\Attributes\Reactive;
use Livewire\Component;

class SearchItemResults extends Component
{
    #[Reactive]
    public $results = [];

    #[Reactive]
    public $show ;


    public function render()
    {
        return view('livewire.search-item-results');
    }
}
