<?php

declare(strict_types=1);

namespace Arcanedev\Html\Tests\Elements;

use Arcanedev\Html\Elements\Optgroup;
use PHPUnit\Framework\Attributes\Test;

/**
 * Class     OptgroupTest
 *
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class OptgroupTest extends TestCase
{
    /* -----------------------------------------------------------------
     |  Tests
     | -----------------------------------------------------------------
     */

    #[Test]
    public function it_can_create(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<optgroup></optgroup>',
            Optgroup::make()
        );
    }

    #[Test]
    public function it_can_create_with_a_label(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<optgroup label="Cats"></optgroup>',
            Optgroup::make()->label('Cats')
        );
    }
}
