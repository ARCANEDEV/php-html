<?php namespace Arcanedev\Html\Tests\Elements;

use Arcanedev\Html\Elements\Fieldset;

/**
 * Class     FieldsetTest
 *
 * @package  Arcanedev\Html\Tests\Elements
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class FieldsetTest extends TestCase
{
    /* -----------------------------------------------------------------
     |  Tests
     | -----------------------------------------------------------------
     */

    /** @test */
    public function it_can_create()
    {
        static::assertHtmlStringEqualsHtmlString(
            '<fieldset></fieldset>',
            Fieldset::make()
        );
    }

    /** @test */
    public function it_can_add_a_legend_to_the_fieldset()
    {
        static::assertHtmlStringEqualsHtmlString(
            '<fieldset><legend>Legend</legend></fieldset>',
            Fieldset::make()->legend('Legend')
        );
    }
}
