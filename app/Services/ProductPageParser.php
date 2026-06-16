<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use DOMDocument;
use DOMXPath;

class ProductPageParser
{
    private const UPPERCASE = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    private const LOWERCASE = 'abcdefghijklmnopqrstuvwxyz';

    public function parse(string $url)
    {
        try {
            $html = Http::timeout(30)
                ->withHeaders([
                    'User-Agent' => 'Mozilla/5.0',
                ])
                ->get($url)
                ->body();

            return $this->parseHtml($html);
        } catch (\Exception $e) {
            logger()->error('Page Parser Error', [
                'url' => $url,
                'error' => $e->getMessage(),
            ]);

            return [];
        }
    }

    public function parseHtml(string $html): array
    {
        $cleanHtml = $this->sanitizeHtml($html);

        $sections = $this->extractSectionsFromDom($cleanHtml);

        if (empty($sections['ingredients'])
            || empty($sections['benefits'])
            || empty($sections['how_to_use'])
            || empty($sections['pro_tip'])
        ) {
            $fallback = app(ProductContentParser::class)->parse($cleanHtml);
            $sections = array_merge($fallback, array_filter($sections));
        }

        return $sections;
    }

    private function sanitizeHtml(string $html): string
    {
        $html = preg_replace('#<(script|style|noscript|iframe|svg|template)[^>]*>.*?</\1>#is', '', $html);
        $html = preg_replace('/<!--.*?-->/s', '', $html);

        return $html;
    }

    private function extractSectionsFromDom(string $html): array
    {
        libxml_use_internal_errors(true);

        $dom = new DOMDocument();
        @$dom->loadHTML(mb_convert_encoding($html, 'HTML-ENTITIES', 'UTF-8'));

        $xpath = new DOMXPath($dom);

        return [
            'ingredients' => $this->extractSectionByKeywords($xpath, [
                'ingredients',
                'full ingredient list',
                'ingredient list',
                'active ingredients',
            ]),
            'benefits' => $this->extractSectionByKeywords($xpath, [
                'benefits',
                'why you will love it',
                'why we love it',
            ]),
            'how_to_use' => $this->extractSectionByKeywords($xpath, [
                'how to use',
                'directions',
                'usage',
                'how to apply',
            ]),
            'pro_tip' => $this->extractSectionByKeywords($xpath, [
                'pro tip',
                'esthetician note',
                'expert tip',
            ]),
            'key_ingredients' => $this->extractSectionByKeywords($xpath, [
                'key ingredients',
            ]),
        ];
    }

    private function extractSectionByKeywords(DOMXPath $xpath, array $keywords): ?string
    {
        foreach ($this->findSectionCandidates($xpath, $keywords) as $candidate) {
            $content = $this->extractAriaControlledContent($candidate['node'], $xpath);

            if (empty($content)) {
                $content = $candidate['mode'] === 'self'
                    ? $this->normalizeText($this->getCleanText($candidate['node']))
                    : $this->collectFollowingText($candidate['node']);
            }

            if (!empty($content)) {
                return $content;
            }
        }

        return null;
    }

    private function extractAriaControlledContent($node, DOMXPath $xpath): ?string
    {
        $current = $node;

        while ($current && $current->nodeType === XML_ELEMENT_NODE) {
            if ($current->hasAttribute('aria-controls')) {
                $targetId = trim($current->getAttribute('aria-controls'));

                if ($targetId !== '') {
                    $target = $xpath->query(sprintf('//*[@id=%s]', $this->xpathLiteral($targetId)))->item(0);

                    if ($target) {
                        return $this->normalizeText($this->getCleanText($target));
                    }
                }
            }

            $current = $current->parentNode;
        }

        return null;
    }

    private function findSectionCandidates(DOMXPath $xpath, array $keywords): array
    {
        $candidates = [];

        foreach ($keywords as $keyword) {
            $keywordLiteral = $this->xpathLiteral(strtolower($keyword));

            foreach (['h1','h2','h3','h4','h5','h6','strong','b'] as $tag) {
                $query = sprintf(
                    '//%s[contains(translate(normalize-space(.), "%s", "%s"), %s)]',
                    $tag,
                    self::UPPERCASE,
                    self::LOWERCASE,
                    $keywordLiteral
                );

                foreach ($xpath->query($query) as $node) {
                    $candidates[] = ['node' => $node, 'mode' => 'follow'];
                }
            }

            foreach (['button','summary','label'] as $tag) {
                $query = sprintf(
                    '//%s[contains(translate(normalize-space(.), "%s", "%s"), %s)]',
                    $tag,
                    self::UPPERCASE,
                    self::LOWERCASE,
                    $keywordLiteral
                );

                foreach ($xpath->query($query) as $node) {
                    $candidates[] = ['node' => $node, 'mode' => 'follow'];
                }
            }

            foreach (['div','section','article','aside','ul','ol','dl'] as $tag) {
                $query = sprintf(
                    '//%s[contains(translate(@class, "%s", "%s"), %s) or contains(translate(@id, "%s", "%s"), %s)]',
                    $tag,
                    self::UPPERCASE,
                    self::LOWERCASE,
                    $keywordLiteral,
                    self::UPPERCASE,
                    self::LOWERCASE,
                    $keywordLiteral
                );

                foreach ($xpath->query($query) as $node) {
                    $candidates[] = ['node' => $node, 'mode' => 'self'];
                }
            }
        }

        return $candidates;
    }

    private function collectFollowingText($node): string
    {
        $content = '';
        $sibling = $node->nextSibling;

        while ($sibling) {
            if ($this->isHeadingNode($sibling) || $this->isSectionBreakpoint($sibling)) {
                break;
            }

            $content .= ' ' . $this->getCleanText($sibling);
            $sibling = $sibling->nextSibling;
        }

        if (trim($content) === '' && $node->parentNode && $node->parentNode->nodeName !== 'body') {
            $content = '';
            $sibling = $node->parentNode->nextSibling;

            while ($sibling) {
                if ($this->isHeadingNode($sibling) || $this->isSectionBreakpoint($sibling)) {
                    break;
                }

                $content .= ' ' . $this->getCleanText($sibling);
                $sibling = $sibling->nextSibling;
            }
        }

        if (trim($content) === '' && $node->parentNode && $node->parentNode->nodeName !== 'body') {
            $content = $this->getCleanText($node->parentNode);
        }

        return $this->normalizeText($content);
    }

    private function isSectionBreakpoint($node): bool
    {
        if ($node->nodeType !== XML_ELEMENT_NODE) {
            return false;
        }

        $text = strtolower(trim($this->getCleanText($node)));
        $labels = [
            'ingredients',
            'benefits',
            'pro tip',
            'how to use',
            'usage',
            'directions',
            'expert tip',
            'esthetician note',
            'key ingredients',
        ];

        foreach ($labels as $label) {
            if (str_starts_with($text, $label) || str_contains($text, $label . ':')) {
                return true;
            }

            $class = strtolower($node->getAttribute('class') ?? '');
            $id = strtolower($node->getAttribute('id') ?? '');

            if (str_contains($class, str_replace(' ', '-', $label))
                || str_contains($id, str_replace(' ', '-', $label))
                || str_contains($class, $label)
                || str_contains($id, $label)
            ) {
                return true;
            }
        }

        return false;
    }

    private function isHeadingNode($node): bool
    {
        return $node->nodeType === XML_ELEMENT_NODE
            && in_array(strtolower($node->nodeName), ['h1','h2','h3','h4','h5','h6']);
    }

    private function getCleanText($node): string
    {
        if ($node->nodeType === XML_TEXT_NODE) {
            return $node->nodeValue;
        }

        if ($node->nodeType !== XML_ELEMENT_NODE) {
            return '';
        }

        if (in_array(strtolower($node->nodeName), ['script','style','noscript','iframe','template','svg'])) {
            return '';
        }

        $text = '';

        foreach ($node->childNodes as $child) {
            $text .= ' ' . $this->getCleanText($child);
        }

        return $text;
    }

    private function normalizeText(string $text): string
    {
        return trim(preg_replace('/\s+/u', ' ', $text));
    }

    private function xpathLiteral(string $value): string
    {
        if (strpos($value, "'") === false) {
            return "'$value'";
        }

        $parts = explode("'", $value);
        $literal = [];

        foreach ($parts as $index => $part) {
            if ($part !== '') {
                $literal[] = "'$part'";
            }

            if ($index !== count($parts) - 1) {
                $literal[] = '"\'"';
            }
        }

        return 'concat(' . implode(', ', $literal) . ')';
    }
}
