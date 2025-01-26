<?php

namespace App\Livewire\Admin;

use App\Livewire\Admin;
use App\Models\Category;
use App\Models\Item;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditProduct extends Admin
{
    use withFileUploads;
    public ?Item $product  ;
    #[title('Add Product')]

    #[validate('required|regex:/^[a-zA-Z0-9\s]+$/|max:255')]
    public $name ;

    #[validate('nullable|string|max:1000')]
    public $description ;

    #[validate('required|integer|min:1')]
    public $stock ;

    #[validate('required|numeric')]
    public $price ;

    public $featured = false ;

    #[validate('required|image|max:1024')]
    public $img ;

    public $img_url = '';

    // Categories
    public $categories ;

    public $category_id ;

    public function mount(Item $product)
    {
        $this->categories = Category::all();
        $this->setProduct($product);
    }

    protected $messages = [
        'name.regex' => 'The name can only contain letters and numbers.',
    ];

    public function setProduct(Item $product)
    {
        $this->name = $product->name;
        $this->description = $product->description;
        $this->stock = $product->stock ;
        $this->price = $product->price ;
        $this->featured = $product->featured ;
        $this->img_url = $product->img_url;
        $this->category_id = $product->category->id;
        $this->product = $product;
    }

    public function edit()
    {
        $this->validate();


        if($this->img) {
            $this->img_url = $this->img->storePublicly('products_photos' , ['disk' => 'public']);
        }

        $this->product->update([
            'name' => $this->name,
            'description' => $this->description,
            'stock' => $this->stock,
            'price' => $this->price,
            'img_url' => $this->img_url,
            'category_id' => $this->category_id,
            'featured' => $this->featured,
        ]);

        session()->flash('success', 'Product Edited successfully!');
        $this->redirectRoute( 'admin.products' , navigate: true);
    }

    public function render()
    {
        return view('livewire.admin.edit-product' , [
            'categories' => Category::all(),
        ]);
    }
}
