<?php

namespace App\Livewire\Admin;

use App\Livewire\Admin;
use App\Models\Category;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditCategory extends Admin
{
    public ?Category $category ;

    use withFileUploads;
    #[title('edit category')]

    #[validate('required|regex:/^[a-zA-Z0-9\s,.-]+$/|max:255')]
    public $name ;

    #[validate('nullable|string|max:1000')]
    public $description ;

    #[validate('required|image|max:1024')]
    public $img = '';

    public $img_url = '';
    public function mount(Category $category)
    {
        $this->setCategory($category);
    }

    public function setCategory(Category $category)
    {
        $this->name = $category->name ;
        $this->description = $category->description ;
        $this->img_url = $category->img_url;
        $this->category = $category ;
    }

    public function edit()
    {
        $this->validate();

        if($this->img) {
            $this->img_url = $this->img->storePublicly('categories_photos' , ['disk' => 'public']);
        }

        $this->category->update([
            'name' => $this->name,
            'description' => $this->description,
            'img_url' => $this->img_url,
        ]);

        session()->flash('success', 'Category Edited successfully!');
        $this->redirectRoute( 'admin.categories' , navigate: true);
    }

    public function render()
    {
        return view('livewire.admin.edit-category' ,
            [
                'category' => $this->category,
            ]);
    }
}
