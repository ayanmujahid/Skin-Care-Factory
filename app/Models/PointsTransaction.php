<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PointsTransaction extends Model
{
    use HasFactory;
    protected $fillable = [
        'professional_id',
        'points',
        'type',
        'reference'
    ];

    public function professional()
    {
        return $this->belongsTo(User::class, 'professional_id');
    }
    
}
