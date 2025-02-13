<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    /** @use HasFactory<\Database\Factories\CartFactory> */
    use HasFactory;

    protected $fillable = ['user_id' , 'total'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function items() {
        return $this->belongsToMany(Item::class, 'cart_items')->withPivot('quantity' , 'id');
    }
}
