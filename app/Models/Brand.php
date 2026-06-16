<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'slug', 'is_featured'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function files()
    {
        return $this->morphMany(File::class, 'fileable');
    }
    public function file()
    {
        return $this->morphOne(File::class, 'fileable');
    }
}
