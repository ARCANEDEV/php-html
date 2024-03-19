<?php

declare(strict_types=1);

namespace Arcanedev\Html\Tests\Html;

use PHPUnit\Framework\Attributes\Test;

/**
 * Class     SubmitTest
 *
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class SubmitTest extends TestCase
{
    /* -----------------------------------------------------------------
     |  Tests
     | -----------------------------------------------------------------
     */

    #[Test]
    public function it_can_create_a_submit_button(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<button type="submit"></button>',
            $this->html->submit()
        );
    }

    #[Test]
    public function it_can_create_a_submit_button_with_contents(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<button type="submit">Send</button>',
            $this->html->submit('Send')
        );
    }
}
