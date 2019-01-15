<?php namespace Arcanedev\Html\Tests\Html;

/**
 * Class     MailToTest
 *
 * @package  Arcanedev\Html\Tests\Html
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class MailToTest extends TestCase
{
    /* -----------------------------------------------------------------
     |  Tests
     | -----------------------------------------------------------------
     */

    /** @test */
    public function it_can_create_a_mailto_link()
    {
        static::assertHtmlStringEqualsHtmlString(
            '<a href="mailto:hello@example.com">hello@example.com</a>',
            $this->html->mailto('hello@example.com')
        );
    }

    /** @test */
    public function it_can_create_a_mailto_link_with_contents()
    {
        static::assertHtmlStringEqualsHtmlString(
            '<a href="mailto:hello@example.com">E-mail</a>',
            $this->html->mailto('hello@example.com', 'E-mail')
        );
    }
}
