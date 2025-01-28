<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /** @use HasFactory<\Database\Factories\OrderFactory> */
    use HasFactory;

    protected $guarded = [];

    public function items() {
        return $this->belongsToMany(Item::class, 'order_items')->withPivot('quantity' , 'id');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

}
