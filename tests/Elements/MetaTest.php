<?php

declare(strict_types=1);

namespace Arcanedev\Html\Tests\Elements;

use Arcanedev\Html\Elements\Meta;

/**
 * Class     MetaTest
 *
 * @package  Arcanedev\Html\Tests\Elements
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class MetaTest extends TestCase
{
    /* -----------------------------------------------------------------
     |  Tests
     | -----------------------------------------------------------------
     */

    /** @test */
    public function it_can_be_instantiated(): void
    {
        $expected = '<meta/>';

        static::assertHtmlStringEqualsHtmlString($expected, Meta::make());
    }

    /** @test */
    public function it_make_with_attributes(): void
    {
        $expected = '<meta name="csrf-token" content="12345"/>';

        static::assertHtmlStringEqualsHtmlString(
            $expected,
            Meta::make()->attributes(['name' => 'csrf-token', 'content' => '12345'])
        );
    }
}
