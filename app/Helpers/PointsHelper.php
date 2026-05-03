<?php

namespace App\Helpers;

use App\Models\PointsTransaction;

class PointsHelper
{
    public static function balance($userId)
    {
        return PointsTransaction::where('professional_id', $userId)->sum('points');
    }
}
