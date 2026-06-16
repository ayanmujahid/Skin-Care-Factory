<?php

namespace App\Services;

class ProductContentParser
{
    public function parse($html)
    {
        $text = strip_tags($html);

        return [

            'ingredients' =>
                $this->extractSection(
                    $text,
                    [
                        'Ingredients',
                        'Ingredient List',
                        'Active Ingredients'
                    ]
                ),

            'benefits' =>
                $this->extractSection(
                    $text,
                    [
                        'Benefits',
                        'Why You Will Love It',
                        'Why We Love It'
                    ]
                ),

            'how_to_use' =>
                $this->extractSection(
                    $text,
                    [
                        'How To Use',
                        'Directions',
                        'Usage'
                    ]
                ),

            'pro_tip' =>
                $this->extractSection(
                    $text,
                    [
                        'Pro Tip',
                        'Expert Tip'
                    ]
                ),
        ];
    }

    private function extractSection(
        $text,
        $keywords
    ) {
        foreach ($keywords as $keyword) {

            if (
                preg_match(
                    '/'
                    . preg_quote($keyword, '/')
                    . '(.*?)(Ingredients|Benefits|Directions|How To Use|Usage|Pro Tip|$)/is',
                    $text,
                    $matches
                )
            ) {
                return trim($matches[1]);
            }
        }

        return null;
    }
}