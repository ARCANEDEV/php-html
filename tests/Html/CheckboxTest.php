<?php

declare(strict_types=1);

namespace Arcanedev\Html\Tests\Html;

/**
 * Class     CheckboxTest
 *
 * @package  Arcanedev\Html\Tests\Html
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class CheckboxTest extends TestCase
{
    /* -----------------------------------------------------------------
     |  Tests
     | -----------------------------------------------------------------
     */

    /** @test */
    public function it_can_create_a_checkbox(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<input type="checkbox" value="1">',
            $this->html->checkbox()
        );
    }

    /** @test */
    public function it_can_create_a_checkbox_with_a_name(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<input type="checkbox" name="my_checkbox" id="my_checkbox" value="1">',
            $this->html->checkbox('my_checkbox')
        );
    }

    /** @test */
    public function it_can_create_a_checked_checkbox_with_a_name(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<input type="checkbox" name="my_checkbox" id="my_checkbox" checked="checked" value="1">',
            $this->html->checkbox('my_checkbox', true)
        );
    }

    /** @test */
    public function it_can_create_a_checkbox_with_a_name_and_a_custom_value(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<input type="checkbox" name="my_checkbox" id="my_checkbox" checked="checked" value="foo">',
            $this->html->checkbox('my_checkbox', true, 'foo')
        );
    }

    /** @test */
    public function it_can_create_a_checkbox_with_a_name_and_a_zero_value(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<input type="checkbox" name="my_checkbox" id="my_checkbox" checked="checked" value="0">',
            $this->html->checkbox('my_checkbox', true, 0)
        );
    }
}
