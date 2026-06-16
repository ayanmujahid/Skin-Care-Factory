<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use DOMDocument;
use DOMXPath;

class ProductPageParser
{
    public function parse(string $url)
    {
        try {

            $html = Http::timeout(30)
                ->withHeaders([
                    'User-Agent' => 'Mozilla/5.0'
                ])
                ->get($url)
                ->body();

            return $this->extractSections($html);

        } catch (\Exception $e) {

            logger()->error('Page Parser Error', [
                'url' => $url,
                'error' => $e->getMessage()
            ]);

            return [];
        }
    }

    private function extractSections($html)
    {
        libxml_use_internal_errors(true);

        $dom = new DOMDocument();

        @$dom->loadHTML($html);

        $xpath = new DOMXPath($dom);

        $headings = $xpath->query('//h1|//h2|//h3|//h4|//h5|//strong');

        $sections = [];

        foreach ($headings as $heading) {

            $title = trim($heading->textContent);

            $content = '';

            $node = $heading->nextSibling;

            while ($node) {

                if (
                    in_array(
                        strtolower($node->nodeName),
                        ['h1','h2','h3','h4','h5']
                    )
                ) {
                    break;
                }

                $content .= ' ' . trim($node->textContent);

                $node = $node->nextSibling;
            }

            $sections[strtolower($title)] = trim($content);
        }

        return [

            'ingredients' =>
                $this->findSection(
                    $sections,
                    [
                        'ingredients',
                        'full ingredient list',
                        'ingredient list',
                        'active ingredients'
                    ]
                ),

            'benefits' =>
                $this->findSection(
                    $sections,
                    [
                        'benefits',
                        'why you will love it',
                        'why we love it'
                    ]
                ),

            'how_to_use' =>
                $this->findSection(
                    $sections,
                    [
                        'how to use',
                        'directions',
                        'usage'
                    ]
                ),

            'pro_tip' =>
                $this->findSection(
                    $sections,
                    [
                        'pro tip',
                        'esthetician note',
                        'expert tip'
                    ]
                ),

            'key_ingredients' =>
                $this->findSection(
                    $sections,
                    [
                        'key ingredients'
                    ]
                )
        ];
    }

    private function findSection(
        array $sections,
        array $keywords
    ) {
        foreach ($sections as $title => $content) {

            foreach ($keywords as $keyword) {

                if (
                    str_contains(
                        strtolower($title),
                        strtolower($keyword)
                    )
                ) {
                    return $content;
                }
            }
        }

        return null;
    }
}