<?php

declare(strict_types=1);

namespace Arcanedev\Html\Tests\Html;

use PHPUnit\Framework\Attributes\Test;

/**
 * Class     TelTest
 *
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class TelTest extends TestCase
{
    /* -----------------------------------------------------------------
     |  Tests
     | -----------------------------------------------------------------
     */

    #[Test]
    public function it_can_create_a_tel_link(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<a href="tel:+19999999999">+19999999999</a>',
            $this->html->telLink('+19999999999')
        );
    }

    #[Test]
    public function it_can_create_a_tel_link_with_contents(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<a href="tel:+19999999999">Call me</a>',
            $this->html->telLink('+19999999999', 'Call me')
        );
    }
}
