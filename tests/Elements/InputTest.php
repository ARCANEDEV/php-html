<?php namespace Arcanedev\Html\Tests\Elements;

use Arcanedev\Html\Elements\Input;

/**
 * Class     InputTest
 *
 * @package  Arcanedev\Html\Tests\Elements
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class InputTest extends TestCase
{
    /* -----------------------------------------------------------------
     |  Tests
     | -----------------------------------------------------------------
     */

    /** @test */
    public function it_can_create()
    {
        static::assertHtmlStringEqualsHtmlString(
            '<input>',
            Input::make()
        );
    }

    /** @test */
    public function it_can_create_with_a_custom_type()
    {
        static::assertHtmlStringEqualsHtmlString(
            '<input type="text">',
            Input::make()->type('text')
        );
    }

    /** @test */
    public function it_can_create_with_a_name()
    {
        static::assertHtmlStringEqualsHtmlString(
            '<input name="foo">',
            Input::make()->name('foo')
        );
    }

    /** @test */
    public function it_can_create_with_a_value()
    {
        static::assertHtmlStringEqualsHtmlString(
            '<input value="bar">',
            Input::make()->value('bar')
        );
    }

    /** @test */
    public function it_can_create_with_a_placeholder()
    {
        static::assertHtmlStringEqualsHtmlString(
            '<input placeholder="Foo bar">',
            Input::make()->placeholder('Foo bar')
        );
    }

    /** @test */
    public function it_can_create_that_is_required()
    {
        static::assertHtmlStringEqualsHtmlString(
            '<input required>',
            Input::make()->required()
        );
    }

    /** @test */
    public function it_can_create_that_is_required_when_passing_true()
    {
        static::assertHtmlStringEqualsHtmlString(
            '<input required>',
            Input::make()->required(true)
        );
    }

    /** @test */
    public function it_wont_create_that_is_required_when_passing_false()
    {
        static::assertHtmlStringEqualsHtmlString(
            '<input>',
            Input::make()->required(false)
        );
    }

    /** @test */
    public function it_can_create_that_has_autofocus()
    {
        static::assertHtmlStringEqualsHtmlString(
            '<input autofocus>',
            Input::make()->autofocus()
        );
    }

    /** @test */
    public function it_can_check()
    {
        static::assertHtmlStringEqualsHtmlString(
            '<input type="checkbox" checked="checked">',
            Input::make()->type('checkbox')->checked(true)
        );

        static::assertHtmlStringEqualsHtmlString(
            '<input type="checkbox" checked="checked">',
            Input::make()->type('checkbox')->checked()
        );
    }

    /** @test */
    public function it_can_uncheck()
    {
        static::assertHtmlStringEqualsHtmlString(
            '<input type="checkbox">',
            Input::make()->type('checkbox')->checked()->checked(false)
        );

        static::assertHtmlStringEqualsHtmlString(
            '<input type="checkbox">',
            Input::make()->type('checkbox')->checked()->unchecked()
        );
    }

    /** @test */
    public function it_can_create_with_builder()
    {
        static::assertHtmlStringEqualsHtmlString(
            '<input type="text" name="foo" id="foo" value="bar">',
            Input::make()->type('text')->name('foo')->id('foo')->value('bar')
        );
    }

    /** @test */
    public function it_can_create_an_input_that_is_readonly()
    {
        static::assertHtmlStringEqualsHtmlString(
            '<input readonly>',
            Input::make()->readonly()
        );
    }

    /** @test */
    public function it_can_create_a_date_input()
    {
        static::assertHtmlStringEqualsHtmlString(
            '<input type="date">',
            Input::make()->type('date')
        );
    }

    /** @test */
    public function it_can_create_a_time_input()
    {
        static::assertHtmlStringEqualsHtmlString(
            '<input type="time">',
            Input::make()->type('time')
        );
    }

    /** @test */
    public function it_can_create_a_number_input()
    {
        static::assertHtmlStringEqualsHtmlString(
            '<input type="number">',
            Input::make()->type('number')
        );
    }

    /** @test */
    public function it_can_create_a_button_input()
    {
        static::assertHtmlStringEqualsHtmlString(
            '<input type="button">',
            Input::make()->type('button')
        );

        static::assertHtmlStringEqualsHtmlString(
            '<input type="button" disabled="disabled">',
            Input::make()->type('button')->disabled()
        );
    }
}
