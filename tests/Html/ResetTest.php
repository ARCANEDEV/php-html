<?php namespace Arcanedev\Html\Tests\Html;

/**
 * Class     ResetTest
 *
 * @package  Arcanedev\Html\Tests\Html
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class ResetTest extends TestCase
{
    /* -----------------------------------------------------------------
     |  Tests
     | -----------------------------------------------------------------
     */

    /** @test */
    public function it_can_create_a_reset_button()
    {
        static::assertHtmlStringEqualsHtmlString(
            '<button type="reset"></button>',
            $this->html->reset()
        );
    }

    /** @test */
    public function it_can_create_a_reset_button_with_contents()
    {
        static::assertHtmlStringEqualsHtmlString(
            '<button type="reset">Reset</button>',
            $this->html->reset('Reset')
        );
    }
}
