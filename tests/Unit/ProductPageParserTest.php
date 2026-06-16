<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Services\ProductPageParser;

class ProductPageParserTest extends TestCase
{
    public function test_parse_html_extracts_sections_from_page_markup()
    {
        $html = <<<'HTML'
            <html>
                <body>
                    <script>console.log('ignore me');</script>
                    <div class="product-content">
                        <h2>Benefits</h2>
                        <p>Soothes skin.</p>
                        <p>Reduces redness.</p>
                        <h2>Ingredients</h2>
                        <p>Water, Glycerin, Aloe Vera</p>
                        <div id="product-pro-tip">
                            Pro Tip: Use before sun exposure.
                        </div>
                        <div class="usage">How To Use: Apply daily.</div>
                    </div>
                </body>
            </html>
        HTML;

        $parser = new ProductPageParser();
        $result = $parser->parseHtml($html);

        $this->assertSame('Soothes skin. Reduces redness.', $result['benefits']);
        $this->assertSame('Water, Glycerin, Aloe Vera', $result['ingredients']);
        $this->assertSame('Use before sun exposure.', $result['pro_tip']);
        $this->assertSame('How To Use: Apply daily.', $result['how_to_use']);
    }

    public function test_parse_html_extracts_accordion_content_by_aria_controls()
    {
        $html = <<<'HTML'
            <div class="accordion">
                <div class="accordion__inner">
                    <button class="accordion__label" aria-controls="how-to-use-content">
                        <h3>How to Use</h3>
                    </button>
                    <div id="how-to-use-content" class="accordion__content">
                        <p>Apply in the morning and evening.</p>
                    </div>
                </div>
            </div>
        HTML;

        $parser = new ProductPageParser();
        $result = $parser->parseHtml($html);

        $this->assertSame('Apply in the morning and evening.', $result['how_to_use']);
    }

    public function test_parse_html_falls_back_to_plain_text_when_headings_are_missing()
    {
        $html = <<<'HTML'
            <div>
                <p><strong>Benefits:</strong> Brightens skin and improves texture.</p>
                <p><strong>Ingredients:</strong> Vitamin C, Hyaluronic Acid.</p>
                <p><strong>Pro Tip:</strong> Store in a cool place.</p>
            </div>
        HTML;

        $parser = new ProductPageParser();
        $result = $parser->parseHtml($html);

        $this->assertSame('Brightens skin and improves texture.', $result['benefits']);
        $this->assertSame('Vitamin C, Hyaluronic Acid.', $result['ingredients']);
        $this->assertSame('Store in a cool place.', $result['pro_tip']);
    }
}
