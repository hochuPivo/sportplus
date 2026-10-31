<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'brand',
        'price',
        'badge',
        'image',
        'category',
        'in_stock',
    ];

    public function getFormattedPriceAttribute(): string
    {
        return number_format($this->price, 0, '.', ' ') . ' ₽';
    }
}
