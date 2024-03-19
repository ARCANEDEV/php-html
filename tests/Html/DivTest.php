<?php

declare(strict_types=1);

namespace Arcanedev\Html\Tests\Html;

use PHPUnit\Framework\Attributes\Test;

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

    #[Test]
    public function it_can_create_a_div(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<div></div>',
            $this->html->div()
        );
    }

    #[Test]
    public function it_can_create_a_div_with_integer_content(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<div>500</div>',
            $this->html->div(500)
        );
    }

    #[Test]
    public function it_can_create_a_div_with_float_content(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<div>500.5</div>',
            $this->html->div(500.5)
        );
    }

    #[Test]
    public function it_can_create_a_div_with_hexadecimal_content(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<div>420</div>',
            $this->html->div(0x1A4)
        );
    }

    #[Test]
    public function it_can_create_a_div_with_octal_content(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<div>420</div>',
            $this->html->div(0644)
        );
    }
}
