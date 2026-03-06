<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVariant extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'sku',
        'price',
        'compare_price',
        'stock',
        'is_active'
    ];


    protected $casts = [
        'price' => 'decimal:2',
        'discounted_price' => 'decimal:2',
        'stock' => 'integer',
    ];

    // Relationships
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    // Helper: Check if the variant is in stock
    public function isInStock(): bool
    {
        return $this->stock > 0;
    }

    // Helper: Get the final price (discounted or regular)
    public function getFinalPrice(): float
    {
        return $this->discounted_price ?? $this->price;
    }
    public function attributes()
    {
        return $this->belongsToMany(
            AttributeValue::class,
            'variant_attribute_values',
            'product_variant_id',
            'attribute_value_id'
        );
    }

    public function variantAttributes()
    {
        return $this->hasMany(VariantAttributeValue::class, 'product_variant_id');
    }

}
