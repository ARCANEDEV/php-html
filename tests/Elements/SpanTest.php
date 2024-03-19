<?php

declare(strict_types=1);

namespace Arcanedev\Html\Tests\Elements;

use Arcanedev\Html\Elements\Span;
use PHPUnit\Framework\Attributes\Test;

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

    #[Test]
    public function it_can_create_an_span_element(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<span></span>',
            Span::make()
        );
    }

    #[Test]
    public function it_can_create_a_span_with_content(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<span>Hi</span>',
            Span::make()->html('Hi')
        );


        $this->assertHtmlStringEqualsHtmlString(
            '<span><em>Hi</em></span>',
            Span::make()->html('<em>Hi</em>')
        );
    }

    #[Test]
    public function it_can_create_an_span_element_with_classes(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<span class="fa fa-fw fa-plus"></span>',
            Span::make()->class(['fa', 'fa-fw', 'fa-plus'])
        );
    }
}
