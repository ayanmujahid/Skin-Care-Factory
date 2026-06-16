<?php

namespace App\Helpers;

class PointsDiscountHelper
{
    /**
     * Calculate discount percentage from points
     */
    public static function calculateDiscountPercent($points): float
    {
        return min(($points / 1000) * 10, 10);
    }

    /**
     * Calculate discount amount from total
     */
    public static function calculateDiscountAmount($total, $points): float
    {
        $percent = self::calculateDiscountPercent($points);

        return ($total * $percent) / 100;
    }

    /**
     * Calculate final total after discount
     */
    public static function calculateFinalTotal($total, $points): float
    {
        $discount = self::calculateDiscountAmount($total, $points);

        return max($total - $discount, 0);
    }
}