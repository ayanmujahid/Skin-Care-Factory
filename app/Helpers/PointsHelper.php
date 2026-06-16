<?php

namespace App\Helpers;

use App\Models\PointsTransaction;

class PointsHelper
{
    public static function balance($userId)
    {
        return PointsTransaction::where('professional_id', $userId)
            ->selectRaw("
                SUM(
                    CASE
                        WHEN type = 'earn' THEN points
                        WHEN type = 'spend' THEN -points
                        WHEN type = 'adjust' THEN points
                        ELSE 0
                    END
                ) as balance
            ")
            ->value('balance') ?? 0;
    }
}