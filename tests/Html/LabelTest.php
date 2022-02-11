<?php

declare(strict_types=1);

namespace Arcanedev\Html\Tests\Html;

/**
 * Class     LabelTest
 *
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class LabelTest extends TestCase
{
    /* -----------------------------------------------------------------
     |  Tests
     | -----------------------------------------------------------------
     */

    /** @test */
    public function it_can_create_a_label(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<label></label>',
            $this->html->label()
        );
    }

    /** @test */
    public function it_can_create_a_label_with_contents(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<label>Hi</label>',
            $this->html->label('Hi')
        );
    }

    /** @test */
    public function it_can_create_a_label_with_html_contents(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<label><em>Hi</em></label>',
            $this->html->label('<em>Hi</em>')
        );
    }

    /** @test */
    public function it_can_create_a_label_with_a_custom_for_attribute(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<label for="some_input_id">Hi</label>',
            $this->html->label('Hi', 'some_input_id')
        );
    }

    /** @test */
    public function it_can_create_a_label_with_integer_content(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<label>5000</label>',
            $this->html->label(5000)
        );
    }

    /** @test */
    public function it_can_create_a_label_with_float_content()
    {
        static::assertHtmlStringEqualsHtmlString(
            '<label>5000.5</label>',
            $this->html->label(5000.5)
        );
    }

    /** @test */
    public function it_can_create_a_label_with_hexadecimal_content(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<label>291</label>',
            $this->html->label(0x123)
        );
    }

    /** @test */
    public function it_can_create_a_label_with_octal_content(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<label>209</label>',
            $this->html->label(0321)
        );
    }
}
