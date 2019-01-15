<?php namespace Arcanedev\Html\Tests\Html;

/**
 * Class     ATest
 *
 * @package  Arcanedev\Html\Tests\Html
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class ATest extends TestCase
{
    /* -----------------------------------------------------------------
     |  Tests
     | -----------------------------------------------------------------
     */

    /** @test */
    public function it_can_create_an_a_element()
    {
        static::assertHtmlStringEqualsHtmlString(
            '<a></a>',
            $this->html->a()
        );
    }

    /** @test */
    public function it_can_create_an_a_element_with_a_href()
    {
        static::assertHtmlStringEqualsHtmlString(
            '<a href="https://github.com"></a>',
            $this->html->a('https://github.com')
        );
    }

    /** @test */
    public function it_can_create_an_a_element_with_a_href_and_text_contents()
    {
        static::assertHtmlStringEqualsHtmlString(
            '<a href="https://github.com">ARCANEDEV</a>',
            $this->html->a('https://github.com', 'ARCANEDEV')
        );
    }

    /** @test */
    public function it_can_create_an_a_element_with_a_href_and_html_contents()
    {
        static::assertHtmlStringEqualsHtmlString(
            '<a href="https://github.com/ARCANEDEV">ARCANEDEV <em>(Github)</em></a>',
            $this->html->a('https://github.com/ARCANEDEV', 'ARCANEDEV <em>(Github)</em>')
        );
    }
}
