<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    /** @use HasFactory<\Database\Factories\ItemFactory> */
    use HasFactory;

    public $fillable = ['name' , 'description' , 'price' , 'stock' , 'img_url' , 'category_id' , 'featured'];
    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function carts() {
        return $this->belongsToMany(Cart::class, 'cart_items')->withPivot('quantity' , 'id');
    }
}
