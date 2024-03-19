<?php

declare(strict_types=1);

namespace Arcanedev\Html\Tests\Elements;

use Arcanedev\Html\Elements\Legend;
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
    public function it_can_create(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<legend></legend>',
            Legend::make()
        );
    }
}
