<?php

declare(strict_types=1);

namespace Arcanedev\Html\Tests\Elements;

use Arcanedev\Html\Elements\Input;

/**
 * Class     InputTest
 *
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class InputTest extends TestCase
{
    /* -----------------------------------------------------------------
     |  Tests
     | -----------------------------------------------------------------
     */

    /** @test */
    public function it_can_create(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<input>',
            Input::make()
        );
    }

    /** @test */
    public function it_can_create_with_a_custom_type(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<input type="text">',
            Input::make()->type('text')
        );
    }

    /** @test */
    public function it_can_create_with_a_name(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<input name="foo">',
            Input::make()->name('foo')
        );
    }

    /** @test */
    public function it_can_create_with_a_value(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<input value="bar">',
            Input::make()->value('bar')
        );
    }

    /** @test */
    public function it_can_create_with_a_placeholder(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<input placeholder="Foo bar">',
            Input::make()->placeholder('Foo bar')
        );
    }

    /** @test */
    public function it_can_create_that_is_required(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<input required>',
            Input::make()->required()
        );
    }

    /** @test */
    public function it_can_create_that_is_required_when_passing_true(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<input required>',
            Input::make()->required(true)
        );
    }

    /** @test */
    public function it_wont_create_that_is_required_when_passing_false(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<input>',
            Input::make()->required(false)
        );
    }

    /** @test */
    public function it_can_create_that_has_autofocus(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<input autofocus>',
            Input::make()->autofocus()
        );
    }

    /** @test */
    public function it_can_create_an_input_that_has_autofocus_when_passing_true(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<input autofocus>',
            Input::make()->autofocus(true)
        );
    }

    /** @test */
    public function it_wont_create_an_input_that_has_autofocus_when_passing_false(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<input>',
            Input::make()->autofocus(false)
        );
    }

    /** @test */
    public function it_can_check(): void
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
    public function it_can_uncheck(): void
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
    public function it_can_create_with_builder(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<input type="text" name="foo" id="foo" value="bar">',
            Input::make()->type('text')->name('foo')->id('foo')->value('bar')
        );
    }

    /** @test */
    public function it_can_create_an_input_that_is_readonly(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<input readonly>',
            Input::make()->isReadonly()
        );
    }

    /** @test */
    public function it_can_create_a_date_input(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<input type="date">',
            Input::make()->type('date')
        );
    }

    /** @test */
    public function it_can_create_a_time_input(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<input type="time">',
            Input::make()->type('time')
        );
    }

    /** @test */
    public function it_can_create_a_number_input(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<input type="number">',
            Input::make()->type('number')
        );
    }

    /** @test */
    public function it_can_create_a_button_input(): void
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

    /** @test */
    public function it_can_create_an_input_with_maxlength(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<input type="text" maxlength="25">',
            Input::make()->type('text')->maxlength(25)
        );
    }

    /** @test */
    public function it_can_create_an_input_with_minlength(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<input type="text" minlength="25">',
            Input::make()->type('text')->minlength(25)
        );
    }
}
