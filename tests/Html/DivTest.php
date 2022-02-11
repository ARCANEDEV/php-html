<?php

declare(strict_types=1);

namespace Arcanedev\Html\Tests\Html;

/**
 * Class     DivTest
 *
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class DivTest extends TestCase
{
    /* -----------------------------------------------------------------
     |  Tests
     | -----------------------------------------------------------------
     */

    /** @test */
    public function it_can_create_a_div(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<div></div>',
            $this->html->div()
        );
    }

    /** @test */
    public function it_can_create_a_div_with_integer_content(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<div>500</div>',
            $this->html->div(500)
        );
    }

    /** @test */
    public function it_can_create_a_div_with_float_content(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<div>500.5</div>',
            $this->html->div(500.5)
        );
    }

    /** @test */
    public function it_can_create_a_div_with_hexadecimal_content(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<div>420</div>',
            $this->html->div(0x1A4)
        );
    }

    /** @test */
    public function it_can_create_a_div_with_octal_content(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<div>420</div>',
            $this->html->div(0644)
        );
    }
}
