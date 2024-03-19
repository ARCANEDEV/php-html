<?php

declare(strict_types=1);

namespace Arcanedev\Html\Tests\Elements;

use Arcanedev\Html\Elements\Link;
use PHPUnit\Framework\Attributes\Test;

/**
 * Class     LinkTest
 *
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class LinkTest extends TestCase
{
    /* -----------------------------------------------------------------
     |  Tests
     | -----------------------------------------------------------------
     */

    #[Test]
    public function it_can_make(): void
    {
        $link = Link::make();

        static::assertHtmlStringEqualsHtmlString(
            '<link>',
            $link->render()
        );
    }

    #[Test]
    public function it_can_make_stylesheet_link(): void
    {
        $link = Link::make()->stylesheet('/style.css');

        static::assertHtmlStringEqualsHtmlString(
            '<link rel="stylesheet" href="/style.css">',
            $link->render()
        );
    }

    #[Test]
    public function it_can_make_favicon_link(): void
    {
        $link = Link::make()->icon('/favicon.ico');

        static::assertHtmlStringEqualsHtmlString(
            '<link rel="icon" href="/favicon.ico">',
            $link->render()
        );
    }
}
