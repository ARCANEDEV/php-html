<?php

declare(strict_types=1);

namespace Arcanedev\Html\Tests\Elements;

use Arcanedev\Html\Elements\Meta;
use PHPUnit\Framework\Attributes\Test;

/**
 * Class     MetaTest
 *
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class MetaTest extends TestCase
{
    /* -----------------------------------------------------------------
     |  Tests
     | -----------------------------------------------------------------
     */

    #[Test]
    public function it_can_be_instantiated(): void
    {
        $expected = '<meta/>';

        static::assertHtmlStringEqualsHtmlString($expected, Meta::make());
    }

    #[Test]
    public function it_make_with_attributes(): void
    {
        $expected = '<meta name="csrf-token" content="12345"/>';

        static::assertHtmlStringEqualsHtmlString(
            $expected,
            Meta::make()->attributes(['name' => 'csrf-token', 'content' => '12345'])
        );
    }
}
