<?php

declare(strict_types=1);

namespace Arcanedev\Html\Tests\Html;

use PHPUnit\Framework\Attributes\Test;

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

    #[Test]
    public function it_can_create_an_i_element(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<i></i>',
            $this->html->i()
        );
    }
}
