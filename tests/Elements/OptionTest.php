<?php namespace Arcanedev\Html\Tests\Elements;

use Arcanedev\Html\Elements\Option;

/**
 * Class     OptionTest
 *
 * @package  Arcanedev\Html\Tests\Elements
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class OptionTest extends TestCase
{
    /* -----------------------------------------------------------------
     |  Tests
     | -----------------------------------------------------------------
     */

    /** @test */
    public function it_can_render_an_empty_version_itself()
    {
        static::assertHtmlStringEqualsHtmlString(
            '<option></option>',
            Option::make()->render()
        );
    }

    /** @test */
    public function it_can_render_itself_with_a_text_and_a_value()
    {
        static::assertHtmlStringEqualsHtmlString(
            '<option value="0">Choose...</option>',
            Option::make()->value('0')->text('Choose...')->render()
        );
    }

    /** @test */
    public function it_can_render_itself_in_a_selected_state()
    {
        static::assertHtmlStringEqualsHtmlString(
            '<option selected value="0">Choose...</option>',
            Option::make()->value('0')->text('Choose...')->selected()
        );
    }

    /** @test */
    public function it_can_unselect_itself()
    {
        static::assertHtmlStringEqualsHtmlString(
            '<option value="0">Choose...</option>',
            Option::make()->value('0')->text('Choose...')->selected()->unselected()
        );
    }

    /** @test */
    public function it_can_conditionally_select_itself()
    {
        static::assertHtmlStringEqualsHtmlString(
            '<option selected value="0">Choose...</option>',
            Option::make()->value('0')->text('Choose...')->selectedIf(true)
        );

        static::assertHtmlStringEqualsHtmlString(
            '<option value="0">Choose...</option>',
            Option::make()->value('0')->text('Choose...')->selectedIf(false)
        );
    }
}
