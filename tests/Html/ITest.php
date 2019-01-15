<?php namespace Arcanedev\Html\Tests\Html;

/**
 * Class     ITest
 *
 * @package  Arcanedev\Html\Tests\Html
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
            $this->html->i()
        );
    }
}
