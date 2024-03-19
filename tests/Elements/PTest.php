<?php

declare(strict_types=1);

namespace Arcanedev\Html\Tests\Elements;

use Arcanedev\Html\Elements\P;
use PHPUnit\Framework\Attributes\Test;

/**
 * Class     PTest
 *
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class PTest extends TestCase
{
    /* -----------------------------------------------------------------
     |  Tests
     | -----------------------------------------------------------------
     */

    #[Test]
    public function it_can_create_an_i_element(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<p></p>',
            P::make()
        );
    }
}
