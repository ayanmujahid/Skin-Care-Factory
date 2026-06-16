<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'user_id',
        'email',
        'product_id',
        'rating',
        'content',
        'status'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

      public function files()
    {
        return $this->morphMany(File::class, 'fileable');
    }
}
