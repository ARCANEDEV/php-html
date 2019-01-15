<?php namespace Arcanedev\Html\Tests\Html;

/**
 * Class     SpanTest
 *
 * @package  Arcanedev\Html\Tests\Html
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class SpanTest extends TestCase
{
    /* -----------------------------------------------------------------
     |  Tests
     | -----------------------------------------------------------------
     */

    /** @test */
    public function it_can_create_a_span()
    {
        static::assertHtmlStringEqualsHtmlString(
            '<span></span>',
            $this->html->span()
        );
    }

    /** @test */
    public function it_can_create_a_span_with_contents()
    {
        static::assertHtmlStringEqualsHtmlString(
            '<span>Hi</span>',
            $this->html->span('Hi')
        );
    }

    /** @test */
    public function it_can_create_a_span_with_html_contents()
    {
        static::assertHtmlStringEqualsHtmlString(
            '<span><em>Hi</em></span>',
            $this->html->span('<em>Hi</em>')
        );
    }
}
