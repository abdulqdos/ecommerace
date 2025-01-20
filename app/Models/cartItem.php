<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cartItem extends Model
{
    /** @use HasFactory<\Database\Factories\CartItemFactory> */
    use HasFactory;
    protected $guarded = [];

    public function items() {
        return $this->belongsTo(Item::class);
    }

    public function cart() {
        return $this->belongsTo(cart::class);
    }
}
