<?php

declare(strict_types=1);

namespace Arcanedev\Html\Tests\Html;

use PHPUnit\Framework\Attributes\Test;

/**
 * Class     MailToTest
 *
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class MailToTest extends TestCase
{
    /* -----------------------------------------------------------------
     |  Tests
     | -----------------------------------------------------------------
     */

    #[Test]
    public function it_can_create_a_mailto_link(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<a href="mailto:hello@example.com">hello@example.com</a>',
            $this->html->mailto('hello@example.com')
        );
    }

    #[Test]
    public function it_can_create_a_mailto_link_with_contents(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<a href="mailto:hello@example.com">E-mail</a>',
            $this->html->mailto('hello@example.com', 'E-mail')
        );
    }
}
