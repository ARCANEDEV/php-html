<?php namespace Arcanedev\Html\Tests\Html;

/**
 * Class     OptionTest
 *
 * @package  Arcanedev\Html\Tests\Html
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class OptionTest extends TestCase
{
    /* -----------------------------------------------------------------
     |  Tests
     | -----------------------------------------------------------------
     */

    /** @test */
    public function it_can_create_an_empty_option()
    {
        static::assertHtmlStringEqualsHtmlString(
            '<option value=""></option>',
            $this->html->option()
        );
    }

    /** @test */
    public function it_can_create_an_option_with_text()
    {
        static::assertHtmlStringEqualsHtmlString(
            '<option value="">Hi</option>',
            $this->html->option('Hi')
        );
    }

    /** @test */
    public function it_can_create_an_option_with_text_and_a_value()
    {
        static::assertHtmlStringEqualsHtmlString(
            '<option value="1">Hi</option>',
            $this->html->option('Hi', 1)
        );
    }

    /** @test */
    public function it_can_create_a_selected_option_with_text_and_a_value()
    {
        static::assertHtmlStringEqualsHtmlString(
            '<option selected value="1">Hi</option>',
            $this->html->option('Hi', 1, true)
        );
    }
}
