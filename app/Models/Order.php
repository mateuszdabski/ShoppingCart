<?php

namespace Cart\Models;

use Illuminate\Database\Eloquent\Model;
use Cart\Models\Address;

class Order extends Model
{
    protected $fillable = [
        'hash',
        'total',
        'paid',
        'address_id',
    ];

    public function address()
    {
        return $this->belongsTo(Address::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::Class, 'orders_products')->withPivot('quantity');
    }
}