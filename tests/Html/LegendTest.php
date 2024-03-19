<?php

declare(strict_types=1);

namespace Arcanedev\Html\Tests\Html;

use PHPUnit\Framework\Attributes\Test;

/**
 * Class     LegendTest
 *
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class LegendTest extends TestCase
{
    /* -----------------------------------------------------------------
     |  Tests
     | -----------------------------------------------------------------
     */

    #[Test]
    public function it_can_create_a_legend(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<legend></legend>',
            $this->html->legend()
        );
    }

    #[Test]
    public function it_can_create_a_legend_with_contents(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<legend>Hi</legend>',
            $this->html->legend('Hi')
        );
    }
}
