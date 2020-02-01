<?php

declare(strict_types=1);

namespace Arcanedev\Html\Tests\Html;

/**
 * Class     RadioTest
 *
 * @package  Arcanedev\Html\Tests\Html
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class RadioTest extends TestCase
{
    /* -----------------------------------------------------------------
     |  Tests
     | -----------------------------------------------------------------
     */

    /** @test */
    public function it_can_create_a_radio_button(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<input type="radio">',
            $this->html->radio()
        );
    }

    /** @test */
    public function it_can_create_a_radio_button_with_a_name(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<input type="radio" name="my_radio" id="my_radio">',
            $this->html->radio('my_radio')
        );
    }

    /** @test */
    public function it_can_create_a_checked_radio_button_with_a_name(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<input type="radio" name="my_radio" id="my_radio" checked="checked">',
            $this->html->radio('my_radio', true)
        );
    }

    /** @test */
    public function it_can_create_a_radio_button_with_a_name_and_value(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<input type="radio" name="my_radio" id="my_radio_1" checked="checked" value="1">',
            $this->html->radio('my_radio', true, 1)
        );
    }

    /** @test */
    public function it_can_create_a_radio_button_with_a_name_and_a_zero_value(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<input type="radio" name="my_radio" id="my_radio_0" checked="checked" value="0">',
            $this->html->radio('my_radio', true, 0)
        );
    }
}
