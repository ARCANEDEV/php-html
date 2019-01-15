<?php namespace Arcanedev\Html\Tests\Html;

/**
 * Class     FormTest
 *
 * @package  Arcanedev\Html\Tests\Html
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class FormTest extends TestCase
{
    /* -----------------------------------------------------------------
     |  Tests
     | -----------------------------------------------------------------
     */

    /** @test */
    public function it_can_create_a_form()
    {
        static::assertHtmlStringEqualsHtmlString(
            '<form method="POST"></form>',
            $this->html->form()
        );
    }

    /** @test */
    public function it_can_create_a_form_with_a_custom_action()
    {
        static::assertHtmlStringEqualsHtmlString(
            '<form method="POST" action="/submit"></form>',
            $this->html->form('POST', '/submit')
        );
    }
}
