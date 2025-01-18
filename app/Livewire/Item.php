<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Item as ModelsItem;
use Livewire\WithPagination;
class Item extends Component
{
    use WithPagination;
    public $header;

    public function mount($header = 'none')
    {
        $this->header = $header;
    }
    public function render()
    {
        return view('livewire.item' , [
            'items' => ModelsItem::paginate(6),
        ]);
    }
}
