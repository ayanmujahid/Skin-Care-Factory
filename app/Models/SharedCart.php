<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SharedCart extends Model
{
    use HasFactory;
    protected $fillable = [
        'professional_id',
        'token',
        'discount_percent',
        'points_used',
        'status',
        'expires_at',
        'share_link',
        'locked_at',
        'is_locked',
        'is_paid',
        'paid_at'
    ];

    public function items()
    {
        return $this->hasMany(SharedCartItem::class);
    }

    public function professional()
    {
        return $this->belongsTo(User::class, 'professional_id');
    }
}
