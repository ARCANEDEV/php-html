<?php namespace Arcanedev\Html\Tests\Elements;

use Arcanedev\Html\Elements\Span;

/**
 * Class     SpanTest
 *
 * @package  Arcanedev\Html\Tests\Elements
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class SpanTest extends TestCase
{
    /* -----------------------------------------------------------------
    |  Tests
    | -----------------------------------------------------------------
    */

    /** @test */
    public function it_can_create_an_span_element()
    {
        static::assertHtmlStringEqualsHtmlString(
            '<span></span>',
            Span::make()
        );
    }

    /** @test */
    public function it_can_create_a_span_with_content()
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

    /** @test */
    public function it_can_create_an_span_element_with_classes()
    {
        static::assertHtmlStringEqualsHtmlString(
            '<span class="fa fa-fw fa-plus"></span>',
            Span::make()->class(['fa', 'fa-fw', 'fa-plus'])
        );
    }
}
