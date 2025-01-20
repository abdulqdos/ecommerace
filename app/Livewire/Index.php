<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;

class Index extends Component
{
    #[Title('Style Fusion')]
    public function render()
    {
        return view('livewire.index');
    }
}
