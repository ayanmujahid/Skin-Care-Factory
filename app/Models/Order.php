<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
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
    ];

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}
