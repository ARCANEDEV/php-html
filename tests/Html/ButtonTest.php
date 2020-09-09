<?php

declare(strict_types=1);

namespace Arcanedev\Html\Tests\Html;

/**
 * Class     ButtonTest
 *
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class ButtonTest extends TestCase
{
    /* -----------------------------------------------------------------
     |  Tests
     | -----------------------------------------------------------------
     */

    /** @test */
    public function it_can_create_a_button(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<button></button>',
            $this->html->button()
        );
    }

    /** @test */
    public function it_can_create_a_button_with_contents(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<button>Hi</button>',
            $this->html->button('Hi')
        );
    }

    /** @test */
    public function it_can_create_a_button_with_html_contents(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<button><em>Hi</em></button>',
            $this->html->button('<em>Hi</em>')
        );
    }

    /** @test */
    public function it_can_create_a_button_with_a_type(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<button type="submit">Hi</button>',
            $this->html->button('Hi', 'submit')
        );
    }
}
