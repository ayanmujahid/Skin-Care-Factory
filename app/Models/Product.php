<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id',
        'sub_category_id',
        'name',
        'short_description',
        'long_description',
        'price',
        'discounted_price',
        'stock',
    ];

    // Relationship to files
    public function files()
    {
        return $this->morphMany(File::class, 'fileable');
    }

    public function mainImage()
    {
        return $this->morphOne(File::class, 'fileable')->where('table_name', 'main_image');
    }

    public function gallery()
    {
        return $this->morphMany(File::class, 'fileable')->where('table_name', 'gallery');
    }


    public function category()
    {
        return $this->belongsTo(ProductCategory::class);
    }

    public function subCategory()
    {
        return $this->belongsTo(ProductSubCategory::class);
    }
}
