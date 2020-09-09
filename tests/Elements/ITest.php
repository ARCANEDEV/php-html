<?php

declare(strict_types=1);

namespace Arcanedev\Html\Tests\Elements;

use Arcanedev\Html\Elements\I;

/**
 * Class     ITest
 *
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class ITest extends TestCase
{
    /* -----------------------------------------------------------------
     |  Tests
     | -----------------------------------------------------------------
     */

    /** @test */
    public function it_can_create_an_i_element(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<i></i>',
            I::make()
        );
    }
}
