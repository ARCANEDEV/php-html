<?php

declare(strict_types=1);

namespace Arcanedev\Html\Tests\Html;

use PHPUnit\Framework\Attributes\Test;

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

    #[Test]
    public function it_can_create_a_label(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<label></label>',
            $this->html->label()
        );
    }

    #[Test]
    public function it_can_create_a_label_with_contents(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<label>Hi</label>',
            $this->html->label('Hi')
        );
    }

    #[Test]
    public function it_can_create_a_label_with_html_contents(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<label><em>Hi</em></label>',
            $this->html->label('<em>Hi</em>')
        );
    }

    #[Test]
    public function it_can_create_a_label_with_a_custom_for_attribute(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<label for="some_input_id">Hi</label>',
            $this->html->label('Hi', 'some_input_id')
        );
    }

    #[Test]
    public function it_can_create_a_label_with_integer_content(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<label>5000</label>',
            $this->html->label(5000)
        );
    }

    #[Test]
    public function it_can_create_a_label_with_float_content()
    {
        static::assertHtmlStringEqualsHtmlString(
            '<label>5000.5</label>',
            $this->html->label(5000.5)
        );
    }

    #[Test]
    public function it_can_create_a_label_with_hexadecimal_content(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<label>291</label>',
            $this->html->label(0x123)
        );
    }

    #[Test]
    public function it_can_create_a_label_with_octal_content(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<label>209</label>',
            $this->html->label(0321)
        );
    }
}
