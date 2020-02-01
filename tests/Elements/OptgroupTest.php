<?php

declare(strict_types=1);

namespace Arcanedev\Html\Tests\Elements;

use Arcanedev\Html\Elements\Optgroup;

/**
 * Class     OptgroupTest
 *
 * @package  Arcanedev\Html\Tests\Elements
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class OptgroupTest extends TestCase
{
    /* -----------------------------------------------------------------
     |  Tests
     | -----------------------------------------------------------------
     */

    /** @test */
    public function it_can_create(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<optgroup></optgroup>',
            Optgroup::make()
        );
    }

    /** @test */
    public function it_can_create_with_a_label(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<optgroup label="Cats"></optgroup>',
            Optgroup::make()->label('Cats')
        );
    }
}
