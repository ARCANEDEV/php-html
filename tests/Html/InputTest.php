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
    public function it_can_create_an_input()
    {
        static::assertHtmlStringEqualsHtmlString(
            '<input>',
            $this->html->input()
        );
    }

    /** @test */
    public function it_can_create_an_input_with_a_custom_type()
    {
        static::assertHtmlStringEqualsHtmlString(
            '<input type="text">',
            $this->html->input('text')
        );
    }

    /** @test */
    public function it_can_create_an_input_with_a_name()
    {
        static::assertHtmlStringEqualsHtmlString(
            '<input id="foo" type="text" name="foo">',
            $this->html->input('text', 'foo')
        );
    }

    /** @test */
    public function it_can_create_an_input_with_a_value()
    {
        static::assertHtmlStringEqualsHtmlString(
            '<input id="foo" type="text" name="foo" value="bar">',
            $this->html->input('text', 'foo', 'bar')
        );
    }

    /** @test */
    public function it_can_create_an_input_with_a_placeholder()
    {
        static::assertHtmlStringEqualsHtmlString(
            '<input placeholder="Foo bar">',
            $this->html->input()->placeholder('Foo bar')
        );
    }

    /** @test */
    public function it_can_create_an_input_that_is_required()
    {
        static::assertHtmlStringEqualsHtmlString(
            '<input required>',
            $this->html->input()->required()
        );
    }

    /** @test */
    public function it_can_create_an_input_that_has_autofocus()
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
    public function it_can_create_an_input_that_is_readonly()
    {
        static::assertHtmlStringEqualsHtmlString(
            '<input readonly>',
            $this->html->input()->readonly()
        );
    }

    /** @test */
    public function it_can_create_a_date_input()
    {
        static::assertHtmlStringEqualsHtmlString(
            '<input type="date">',
            $this->html->date()
        );
    }

    /** @test */
    public function it_can_create_a_time_input()
    {
        static::assertHtmlStringEqualsHtmlString(
            '<input type="time">',
            $this->html->time()
        );
    }

    /** @test */
    public function it_can_create_a_hidden_input()
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
            '<input type="number" id="price" name="price" value="120">',
            $this->html->number('price', 120)
        );
    }
}
