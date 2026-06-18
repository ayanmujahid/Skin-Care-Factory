<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CouponUsage extends Model
{
    use HasFactory;

    protected $fillable = [
        'coupon_id',
        'user_id',
        'email',
        'phone',
        'ip_address',
        'guest_token',
        'order_id'
    ];

    public function coupon()
    {
        return $this->belongsTo(Coupon::class);
    }
}
