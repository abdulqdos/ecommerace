<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Item as ModelsItem;
use Livewire\WithPagination;
class Item extends Component
{
    use WithPagination;
    public $header;
    public $flag = false ;

    public function mount($header = 'none' , $flag = false)
    {
        $this->header = $header;
        $this->flag = $flag ;
    }
    public function render()
    {
        $query = ModelsItem::query();

        $featured = $query->where('featured' , 1)->latest()->paginate(6);
        return view('livewire.item' , [
            'items' => ModelsItem::paginate(6),
            'featuredItems' => $featured,
        ]);
    }
}
