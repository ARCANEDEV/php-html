<?php namespace Arcanedev\Html\Tests\Html;

/**
 * Class     SubmitTest
 *
 * @package  Arcanedev\Html\Tests\Html
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class SubmitTest extends TestCase
{
    /* -----------------------------------------------------------------
     |  Tests
     | -----------------------------------------------------------------
     */

    /** @test */
    public function it_can_create_a_submit_button()
    {
        static::assertHtmlStringEqualsHtmlString(
            '<button type="submit"></button>',
            $this->html->submit()
        );
    }

    /** @test */
    public function it_can_create_a_submit_button_with_contents()
    {
        static::assertHtmlStringEqualsHtmlString(
            '<button type="submit">Send</button>',
            $this->html->submit('Send')
        );
    }
}
