<?php

declare(strict_types=1);

namespace Arcanedev\Html\Tests\Elements;

use Arcanedev\Html\Elements\Img;
use PHPUnit\Framework\Attributes\Test;

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

    #[Test]
    public function it_can_create(): void
    {
        $expected = '<img>';

        static::assertHtmlStringEqualsHtmlString($expected, Img::make());
    }

    #[Test]
    public function it_can_create_with_an_alt_attribute(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<img alt="Image title">',
            Img::make()->alt('Image title')
        );
    }

    #[Test]
    public function it_can_create_with_a_src_attribute(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<img src="logo.jpg">',
            Img::make()->src('logo.jpg')
        );
    }

    #[Test]
    public function it_can_create_with_builder(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<img src="logo.jpg" alt="ARCANEDEV">',
            Img::make()->src('logo.jpg')->alt('ARCANEDEV')
        );
    }
}
