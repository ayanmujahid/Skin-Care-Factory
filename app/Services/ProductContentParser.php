<?php

namespace App\Services;

class ProductContentParser
{
    public function parse($html)
    {
        if (empty($html)) {
            return [
                'ingredients' => null,
                'benefits' => null,
                'how_to_use' => null,
                'pro_tip' => null,
            ];
        }

        $html = $this->sanitizeHtml($html);
        $text = $this->normalizeText(
            preg_replace('/<(br|li|p|div|section|article|h[1-6])[^>]*>/i', "\n", $html)
        );

        return [
            'ingredients' => $this->extractSection(
                $text,
                [
                    'Ingredients',
                    'Ingredient List',
                    'Active Ingredients',
                    'Full Ingredient List',
                ]
            ),
            'benefits' => $this->extractSection(
                $text,
                [
                    'Benefits',
                    'Why You Will Love It',
                    'Why We Love It',
                ]
            ),
            'how_to_use' => $this->extractSection(
                $text,
                [
                    'How To Use',
                    'Directions',
                    'Usage',
                    'How to Apply',
                ]
            ),
            'pro_tip' => $this->extractSection(
                $text,
                [
                    'Pro Tip',
                    'Expert Tip',
                    'Esthetician Note',
                ]
            ),
        ];
    }

    private function sanitizeHtml(string $html): string
    {
        $html = preg_replace('#<(script|style|noscript|iframe|svg|template)[^>]*>.*?</\1>#is', '', $html);
        $html = preg_replace('/<!--.*?-->/s', '', $html);

        return $html;
    }

    private function normalizeText(string $text): string
    {
        $text = strip_tags($text);
        $text = preg_replace('/\s+/u', ' ', $text);

        return trim($text);
    }

    private function extractSection(
        string $text,
        array $keywords
    ): ?string {
        $stopWords = [
            'Ingredients',
            'Ingredient List',
            'Active Ingredients',
            'Full Ingredient List',
            'Benefits',
            'Why You Will Love It',
            'Why We Love It',
            'How To Use',
            'Directions',
            'Usage',
            'How to Apply',
            'Pro Tip',
            'Expert Tip',
            'Esthetician Note',
            'Instructions',
        ];

        foreach ($keywords as $keyword) {
            $pattern = '/'.preg_quote($keyword, '/').'\s*[:\-–]?\s*(.*?)(?=(?:'.implode('|', array_map('preg_quote', $stopWords)).')|$)/is';

            if (preg_match($pattern, $text, $matches)) {
                $section = trim($matches[1]);
                return $section !== '' ? $section : null;
            }
        }

        return null;
    }
}