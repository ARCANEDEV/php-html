<?php

declare(strict_types=1);

namespace Arcanedev\Html\Tests\Elements;

use Arcanedev\Html\Elements\Div;

/**
 * Class     DivTest
 *
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class DivTest extends TestCase
{
    /* -----------------------------------------------------------------
     |  Tests
     | -----------------------------------------------------------------
     */

    /** @test */
    public function it_can_create(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<div></div>',
            Div::make()
        );
    }

    /**
     * @test
     *
     * @dataProvider getCustomStylesDP
     *
     * @param  array   $styles
     * @param  string  $expected
     */
    public function it_can_create_with_custom_styles(array $styles, string $expected): void
    {
        static::assertHtmlStringEqualsHtmlString(
            $expected,
            Div::make()->styleIf( ! empty($styles), $styles)->toHtml()
        );

        static::assertHtmlStringEqualsHtmlString(
            $expected,
            Div::make()->styleUnless(empty($styles), $styles)->toHtml()
        );
    }

    /* -----------------------------------------------------------------
     |  Data Providers
     | -----------------------------------------------------------------
     */

    /**
     * Get the custom styles (data provider).
     *
     * @return array
     */
    public function getCustomStylesDP(): array
    {
        return [
            [
                [],
                '<div></div>'
            ],
            [
                ['width' => '20px', 'background-color' => 'red'],
                '<div style="width: 20px; background-color: red"></div>'
            ],
        ];
    }
}
