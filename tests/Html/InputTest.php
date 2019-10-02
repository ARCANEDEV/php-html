<?php namespace Arcanedev\Html\Tests\Html;

/**
 * Class     InputTest
 *
 * @package  Arcanedev\Html\Tests\Html
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class InputTest extends TestCase
{
    /* -----------------------------------------------------------------
     |  Tests
     | -----------------------------------------------------------------
     */

    /** @test */
    public function it_can_make_an_input()
    {
        static::assertHtmlStringEqualsHtmlString(
            '<input>',
            $this->html->input()
        );
    }

    /** @test */
    public function it_can_make_an_input_with_a_custom_type()
    {
        static::assertHtmlStringEqualsHtmlString(
            '<input type="text">',
            $this->html->input('text')
        );
    }

    /** @test */
    public function it_can_make_an_input_with_a_name()
    {
        static::assertHtmlStringEqualsHtmlString(
            '<input id="foo" type="text" name="foo">',
            $this->html->input('text', 'foo')
        );
    }

    /** @test */
    public function it_can_make_an_input_with_a_value()
    {
        static::assertHtmlStringEqualsHtmlString(
            '<input id="foo" type="text" name="foo" value="bar">',
            $this->html->input('text', 'foo', 'bar')
        );
    }

    /** @test */
    public function it_can_make_an_input_with_a_placeholder()
    {
        static::assertHtmlStringEqualsHtmlString(
            '<input placeholder="Foo bar">',
            $this->html->input()->placeholder('Foo bar')
        );
    }

    /** @test */
    public function it_can_make_an_input_that_is_required()
    {
        static::assertHtmlStringEqualsHtmlString(
            '<input required>',
            $this->html->input()->required()
        );
    }

    /** @test */
    public function it_can_make_an_input_that_has_autofocus()
    {
        static::assertHtmlStringEqualsHtmlString(
            '<input autofocus>',
            $this->html->input()->autofocus()
        );
    }

    /** @test */
    public function it_can_make_checkbox_input()
    {
        static::assertHtmlStringEqualsHtmlString(
            '<input id="is_checked" name="is_checked" type="checkbox" value="1">',
            $this->html->checkbox('is_checked')
        );

        static::assertHtmlStringEqualsHtmlString(
            '<input checked="checked" id="is_checked" name="is_checked" type="checkbox" value="1">',
            $this->html->checkbox('is_checked', true)
        );

        static::assertHtmlStringEqualsHtmlString(
            '<input id="is_checked" name="is_checked" type="checkbox" value="yes">',
            $this->html->checkbox('is_checked', false, 'yes')
        );
    }

    /** @test */
    public function it_can_check_an_input()
    {
        static::assertHtmlStringEqualsHtmlString(
            '<input type="checkbox" checked="checked">',
            $this->html->input('checkbox')->checked(true)
        );

        static::assertHtmlStringEqualsHtmlString(
            '<input type="checkbox" checked="checked">',
            $this->html->input('checkbox')->checked(true)
        );
    }

    /** @test */
    public function it_can_uncheck_an_input()
    {
        static::assertHtmlStringEqualsHtmlString(
            '<input type="checkbox">',
            $this->html->input('checkbox')->checked()->checked(false)
        );

        static::assertHtmlStringEqualsHtmlString(
            '<input type="checkbox">',
            $this->html->input('checkbox')->checked()->unchecked()
        );
    }

    /** @test */
    public function it_can_make_an_input_that_is_readonly()
    {
        static::assertHtmlStringEqualsHtmlString(
            '<input readonly>',
            $this->html->input()->readonly()
        );
    }

    /** @test */
    public function it_can_make_a_date_input()
    {
        static::assertHtmlStringEqualsHtmlString(
            '<input type="date">',
            $this->html->date()
        );
    }

    /** @test */
    public function it_can_make_a_date_input_with_blank_date()
    {
        static::assertHtmlStringEqualsHtmlString(
            '<input id="test_date" name="test_date" type="date" value=""/>',
            $this->html->date('test_date', '')
        );
    }

    /** @test */
    public function it_can_make_a_date_input_and_format_date()
    {
        static::assertHtmlStringEqualsHtmlString(
            '<input id="test_date" name="test_date" type="date" value="2017-09-04"/>',
            $this->html->date('test_date', '2017-09-04T23:33:32')
        );
    }

    /** @test */
    public function it_can_make_a_date_input_with_invalid_date()
    {
        static::assertHtmlStringEqualsHtmlString(
            '<input id="test_date" name="test_date" type="date" value="notadate"/>',
            $this->html->date('test_date', 'notadate')
        );
    }

    /** @test */
    public function it_can_make_a_time_input()
    {
        static::assertHtmlStringEqualsHtmlString(
            '<input type="time">',
            $this->html->time()
        );
    }

    /** @test */
    public function it_can_make_a_time_input_with_blank_value()
    {
        static::assertHtmlStringEqualsHtmlString(
            '<input id="test_time" name="test_time" type="time" value=""/>',
            $this->html->time('test_time', '')
        );
    }

    /** @test */
    public function it_can_make_a_time_input_with_time_string_and_format()
    {
        static::assertHtmlStringEqualsHtmlString(
            '<input id="test_time" name="test_time" type="time" value="11:30:00"/>',
            $this->html->time('test_time', '11:30')
        );
    }

    /** @test */
    public function it_can_make_a_time_input_with_string_and_format()
    {
        static::assertHtmlStringEqualsHtmlString(
            '<input id="test_time" name="test_time" type="time" value="23:33:32"/>',
            $this->html->time('test_time', '2017-09-04T23:33:32')
        );
    }

    /** @test */
    public function it_can_make_a_time_input_with_invalid_time()
    {
        static::assertHtmlStringEqualsHtmlString(
            '<input id="test_time" name="test_time" type="time" value="timeoclock"/>',
            $this->html->time('test_time', 'timeoclock')
        );
    }

    /** @test */
    public function it_can_make_a_hidden_input()
    {
        static::assertHtmlStringEqualsHtmlString(
            '<input type="hidden" id="_token" name="_token" value="12345">',
            $this->html->hidden('_token', '12345')
        );
    }

    /** @test */
    public function it_can_make_text_input()
    {
        static::assertHtmlStringEqualsHtmlString(
            '<input type="text" id="title" name="title" value="Hello there">',
            $this->html->text('title', 'Hello there')
        );
    }

    /** @test */
    public function it_can_make_number_input()
    {
        static::assertHtmlStringEqualsHtmlString(
            '<input type="number">',
            $this->html->number()
        );

        static::assertHtmlStringEqualsHtmlString(
            '<input type="number" id="price" name="price" value="120">',
            $this->html->number('price', 120)
        );
    }

    /** @test */
    public function it_can_make_a_number_input_with_min_max_step()
    {
        static::assertHtmlStringEqualsHtmlString(
            '<input type="number" name="percentage" id="percentage" value="0" min="0" max="100">',
            $this->html->number('percentage', '0', '0', '100')
        );

        static::assertHtmlStringEqualsHtmlString(
            '<input type="number" name="percentage" id="percentage" value="0" min="0" max="100" step="10">',
            $this->html->number('percentage', '0', '0', '100', '10')
        );

        static::assertHtmlStringEqualsHtmlString(
            '<input type="number" name="percentage" id="percentage" value="30" max="100" step="10">',
            $this->html->number('percentage', '30', null, '100', '10')
        );
    }

    /** @test */
    public function it_avoids_fill_value_for_password_input()
    {
        static::assertHtmlStringEqualsHtmlString(
            '<input id="password" name="password" type="password"/>',
            $this->html->input('password', 'password', 'secret')
        );
    }

    /** @test */
    public function it_can_make_a_range_input()
    {
        static::assertHtmlStringEqualsHtmlString(
            '<input type="range">',
            $this->html->range()
        );
    }

    /** @test */
    public function it_can_make_a_range_input_with_min_max()
    {
        static::assertHtmlStringEqualsHtmlString(
            '<input type="range" name="test" id="test" value="0" min="0" max="100">',
            $this->html->range('test', '0', '0', '100')
        );
    }

    /** @test */
    public function it_can_make_a_range_input_with_min_max_step()
    {
        static::assertHtmlStringEqualsHtmlString(
            '<input type="range" name="test" id="test" value="0" min="0" max="100" step="10">',
            $this->html->range('test', '0', '0', '100', '10')
        );
    }

    /** @test */
    public function it_can_make_a_range_input_with_max_step()
    {
        static::assertHtmlStringEqualsHtmlString(
            '<input type="range" name="test" id="test" value="30" max="100" step="10">',
            $this->html->range('test', '30', null, '100', '10')
        );
    }
}
