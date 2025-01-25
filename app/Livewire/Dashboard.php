<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;

class Dashboard extends Admin
{
    #[title('dashboard')]
    public function render()
    {
        return view('livewire.dashboard');
    }
}
