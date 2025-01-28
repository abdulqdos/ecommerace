<?php

namespace App\Livewire\Admin;

use App\Livewire\Admin;
use App\Models\Category;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\WithFileUploads;
use Livewire\Component;

class AddCategory extends Admin
{
    use withFileUploads;
    #[title('add category')]

    #[validate('required|regex:/^[a-zA-Z0-9\s,.-]+$/|max:255')]
    public $name ;

    #[validate('nullable|string|max:1000')]
    public $description ;

    #[validate('required|image|max:1024')]
    public $img = '';

    public $img_url = '';


    protected $messages = [
        'name.regex' => 'The name can only contain letters  numbers and special chars .',
    ];

    public function store()
    {
        $this->validate();

        if($this->img) {
            $this->img_url = $this->img->storePublicly('categories_photos' , ['disk' => 'public']);
        }

        Category::create([
            'name' => $this->name,
            'description' => $this->description,
            'img_url' => $this->img_url,
        ]);

        session()->flash('success', 'Category Added successfully!');
        $this->redirectRoute( 'admin.categories' , navigate: true);
    }
    public function render()
    {
        return view('livewire.admin.add-category');
    }
}
