<?php namespace Arcanedev\Html\Tests\Html;

/**
 * Class     PasswordTest
 *
 * @package  Arcanedev\Html\Tests\Html
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class PasswordTest extends TestCase
{
    /* -----------------------------------------------------------------
     |  Tests
     | -----------------------------------------------------------------
     */

    /** @test */
    public function it_can_create_a_password_input()
    {
        static::assertHtmlStringEqualsHtmlString(
            '<input type="password">',
            $this->html->password()
        );
    }

    /** @test */
    public function it_can_create_a_password_input_with_a_name()
    {
        static::assertHtmlStringEqualsHtmlString(
            '<input id="confirm_password" type="password" name="confirm_password">',
            $this->html->password('confirm_password')
        );
    }
}
