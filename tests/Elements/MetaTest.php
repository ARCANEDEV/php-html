<?php namespace Arcanedev\Html\Tests\Elements;

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
    public function it_can_be_instantiated()
    {
        $expected = '<meta/>';

        static::assertHtmlStringEqualsHtmlString($expected, Meta::make());
    }

    /** @test */
    public function it_make_with_attributes()
    {
        $expected = '<meta name="csrf-token" content="12345"/>';

        static::assertHtmlStringEqualsHtmlString(
            $expected,
            Meta::make()->attributes(['name' => 'csrf-token', 'content' => '12345'])
        );
    }
}
