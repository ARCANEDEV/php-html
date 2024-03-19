<?php

declare(strict_types=1);

namespace Arcanedev\Html\Tests\Html;

use PHPUnit\Framework\Attributes\Test;

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

    #[Test]
    public function it_can_create_a_button(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<button></button>',
            $this->html->button()
        );
    }

    #[Test]
    public function it_can_create_a_button_with_contents(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<button>Hi</button>',
            $this->html->button('Hi')
        );
    }

    #[Test]
    public function it_can_create_a_button_with_html_contents(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<button><em>Hi</em></button>',
            $this->html->button('<em>Hi</em>')
        );
    }

    #[Test]
    public function it_can_create_a_button_with_a_type(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<button type="submit">Hi</button>',
            $this->html->button('Hi', 'submit')
        );
    }
}
