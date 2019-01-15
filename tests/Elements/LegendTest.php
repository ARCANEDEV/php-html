<?php namespace Arcanedev\Html\Tests\Elements;

use Arcanedev\Html\Elements\Legend;

/**
 * Class     LegendTest
 *
 * @package  Arcanedev\Html\Tests\Elements
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class LegendTest extends TestCase
{
    /* -----------------------------------------------------------------
     |  Tests
     | -----------------------------------------------------------------
     */

    /** @test */
    public function it_can_create()
    {
        static::assertHtmlStringEqualsHtmlString(
            '<legend></legend>',
            Legend::make()
        );
    }
}
