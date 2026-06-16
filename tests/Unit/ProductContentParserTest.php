<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Services\ProductContentParser;

class ProductContentParserTest extends TestCase
{
    public function test_parse_extracts_sections_from_html()
    {
        $html = <<<'HTML'
            <div>
                <h2>Ingredients</h2>
                <ul>
                    <li>Water</li>
                    <li>Glycerin</li>
                </ul>
                <h2>Benefits</h2>
                <p>Hydrates and smooths skin.</p>
                <h2>Pro Tip</h2>
                <p>Apply before moisturizer.</p>
                <h2>How To Use</h2>
                <p>Use twice daily.</p>
            </div>
        HTML;

        $parser = new ProductContentParser();
        $result = $parser->parse($html);

        $this->assertSame('Water Glycerin', $result['ingredients']);
        $this->assertSame('Hydrates and smooths skin.', $result['benefits']);
        $this->assertSame('Apply before moisturizer.', $result['pro_tip']);
        $this->assertSame('Use twice daily.', $result['how_to_use']);
    }

    public function test_parse_returns_null_for_missing_sections()
    {
        $html = '<div><p>No product sections here.</p></div>';

        $parser = new ProductContentParser();
        $result = $parser->parse($html);

        $this->assertNull($result['ingredients']);
        $this->assertNull($result['benefits']);
        $this->assertNull($result['pro_tip']);
        $this->assertNull($result['how_to_use']);
    }
}
