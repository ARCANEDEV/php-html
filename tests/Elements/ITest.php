<?php namespace Arcanedev\Html\Tests\Elements;

use Arcanedev\Html\Elements\I;

/**
 * Class     ITest
 *
 * @package  Arcanedev\Html\Tests\Elements
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class ITest extends TestCase
{
    /* -----------------------------------------------------------------
     |  Tests
     | -----------------------------------------------------------------
     */

    /** @test */
    public function it_can_create_an_i_element()
    {
        static::assertHtmlStringEqualsHtmlString(
            '<i></i>',
            I::make()
        );
    }
}
