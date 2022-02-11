<?php

declare(strict_types=1);

namespace Arcanedev\Html\Tests\Html;

/**
 * Class     SpanTest
 *
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class SpanTest extends TestCase
{
    /* -----------------------------------------------------------------
     |  Tests
     | -----------------------------------------------------------------
     */

    /** @test */
    public function it_can_create_a_span(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<span></span>',
            $this->html->span()
        );
    }

    /** @test */
    public function it_can_create_a_span_with_contents(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<span>Hi</span>',
            $this->html->span('Hi')
        );
    }

    /** @test */
    public function it_can_create_a_span_with_html_contents(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<span><em>Hi</em></span>',
            $this->html->span('<em>Hi</em>')
        );
    }

    /** @test */
    public function it_can_create_a_span_with_integer_content(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<span>50</span>',
            $this->html->span(50)
        );
    }

    /** @test */
    public function it_can_create_a_span_with_float_content(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<span>50.5</span>',
            $this->html->span(50.5)
        );
    }

    /** @test */
    public function it_can_create_a_span_with_hexadecimal_content(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<span>1337</span>',
            $this->html->span(0x539)
        );
    }

    /** @test */
    public function it_can_create_a_span_with_octal_content(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<span>83</span>',
            $this->html->span(0123)
        );
    }
}
