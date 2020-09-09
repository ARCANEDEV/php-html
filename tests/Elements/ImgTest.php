<?php

declare(strict_types=1);

namespace Arcanedev\Html\Tests\Elements;

use Arcanedev\Html\Elements\Img;

/**
 * Class     ImgTest
 *
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class ImgTest extends TestCase
{
    /* -----------------------------------------------------------------
     |  Tests
     | -----------------------------------------------------------------
     */

    /** @test */
    public function it_can_create(): void
    {
        $expected = '<img>';

        static::assertHtmlStringEqualsHtmlString($expected, Img::make());
    }

    /** @test */
    public function it_can_create_with_an_alt_attribute(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<img alt="Image title">',
            Img::make()->alt('Image title')
        );
    }

    /** @test */
    public function it_can_create_with_a_src_attribute(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<img src="logo.jpg">',
            Img::make()->src('logo.jpg')
        );
    }

    /** @test */
    public function it_can_create_with_builder(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<img src="logo.jpg" alt="ARCANEDEV">',
            Img::make()->src('logo.jpg')->alt('ARCANEDEV')
        );
    }
}
