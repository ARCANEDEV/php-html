<?php namespace Arcanedev\Html\Tests\Html;

/**
 * Class     DivTest
 *
 * @package  Arcanedev\Html\Tests\Html
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class DivTest extends TestCase
{
    /* -----------------------------------------------------------------
     |  Tests
     | -----------------------------------------------------------------
     */

    /** @test */
    public function it_can_create_a_div()
    {
        static::assertHtmlStringEqualsHtmlString(
            '<div></div>',
            $this->html->div()
        );
    }
}
