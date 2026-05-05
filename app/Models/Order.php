<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'email',
        'phone',
        'address',
        'apartment',
        'city',
        'state',
        'zip',
        'notes',
        'total',

        'status',
        'payment_method',
        'payment_intent_id',
        'transaction_id',
        'paid_at',
        'is_locked',
        'professional_id',
        'shared_cart_id',
        'is_shared_cart',
    ];

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function user()
{
    return $this->belongsTo(User::class);
}

public function professional()
{
    return $this->belongsTo(User::class, 'professional_id');
}
}
