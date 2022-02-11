<?php

declare(strict_types=1);

namespace Arcanedev\Html\Tests\Html;

/**
 * Class     ATest
 *
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class ATest extends TestCase
{
    /* -----------------------------------------------------------------
     |  Tests
     | -----------------------------------------------------------------
     */

    /** @test */
    public function it_can_create_an_a_element(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<a></a>',
            $this->html->a()
        );
    }

    /** @test */
    public function it_can_create_an_a_element_with_a_href(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<a href="https://github.com"></a>',
            $this->html->a('https://github.com')
        );
    }

    /** @test */
    public function it_can_create_an_a_element_with_a_href_and_text_contents(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<a href="https://github.com">ARCANEDEV</a>',
            $this->html->a('https://github.com', 'ARCANEDEV')
        );
    }

    /** @test */
    public function it_can_create_an_a_element_with_a_href_and_html_contents(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<a href="https://github.com/ARCANEDEV">ARCANEDEV <em>(Github)</em></a>',
            $this->html->a('https://github.com/ARCANEDEV', 'ARCANEDEV <em>(Github)</em>')
        );
    }

    /** @test */
    public function it_can_create_an_a_element_with_a_target(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<a target="_blank"></a>',
            $this->html->a()->target('_blank')
        );
    }

    /** @test */
    public function it_can_create_an_a_element_with_a_href_and_a_target(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<a href="https://github.com/ARCANEDEV" target="_blank">ARCANEDEV <em>(Github)</em></a>',
            $this->html->a('https://github.com/ARCANEDEV', 'ARCANEDEV <em>(Github)</em>')->target('_blank')
        );
    }
}
