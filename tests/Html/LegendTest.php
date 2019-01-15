<?php namespace Arcanedev\Html\Tests\Html;

/**
 * Class     LegendTest
 *
 * @package  Arcanedev\Html\Tests\Html
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class LegendTest extends TestCase
{
    /* -----------------------------------------------------------------
     |  Tests
     | -----------------------------------------------------------------
     */

    /** @test */
    public function it_can_create_a_legend()
    {
        static::assertHtmlStringEqualsHtmlString(
            '<legend></legend>',
            $this->html->legend()
        );
    }

    /** @test */
    public function it_can_create_a_legend_with_contents()
    {
        static::assertHtmlStringEqualsHtmlString(
            '<legend>Hi</legend>',
            $this->html->legend('Hi')
        );
    }
}
