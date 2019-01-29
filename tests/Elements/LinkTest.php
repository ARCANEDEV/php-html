<?php namespace Arcanedev\Html\Tests\Elements;

use Arcanedev\Html\Elements\Link;

/**
 * Class     LinkTest
 *
 * @package  Arcanedev\Html\Tests\Elements
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class LinkTest extends TestCase
{
    /* -----------------------------------------------------------------
     |  Tests
     | -----------------------------------------------------------------
     */

    /** @test */
    public function it_can_make()
    {
        $link = Link::make();

        static::assertHtmlStringEqualsHtmlString(
            '<link>',
            $link->render()
        );
    }

    /** @test */
    public function it_can_make_stylesheet_link()
    {
        $link = Link::make()->stylesheet('/style.css');

        static::assertHtmlStringEqualsHtmlString(
            '<link rel="stylesheet" href="/style.css">',
            $link->render()
        );
    }

    /** @test */
    public function it_can_make_favicon_link()
    {
        $link = Link::make()->icon('/favicon.ico');

        static::assertHtmlStringEqualsHtmlString(
            '<link rel="icon" href="/favicon.ico">',
            $link->render()
        );
    }
}
