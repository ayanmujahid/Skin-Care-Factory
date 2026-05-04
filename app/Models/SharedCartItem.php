<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SharedCartItem extends Model
{
    use HasFactory;
    protected $fillable = [
        'shared_cart_id',
        'variant_id',
        'quantity'
    ];

    public function cart()
    {
        return $this->belongsTo(SharedCart::class, 'shared_cart_id');
    }

    public function variant()
    {
        return $this->belongsTo(ProductVariant::class, 'variant_id');
    }
}
