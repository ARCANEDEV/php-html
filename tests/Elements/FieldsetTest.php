<?php

declare(strict_types=1);

namespace Arcanedev\Html\Tests\Elements;

use Arcanedev\Html\Elements\Fieldset;

/**
 * Class     FieldsetTest
 *
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class FieldsetTest extends TestCase
{
    /* -----------------------------------------------------------------
     |  Tests
     | -----------------------------------------------------------------
     */

    /** @test */
    public function it_can_create(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<fieldset></fieldset>',
            Fieldset::make()
        );
    }

    /** @test */
    public function it_can_add_a_legend_to_the_fieldset(): void
    {
        static::assertHtmlStringEqualsHtmlString(
            '<fieldset><legend>Legend</legend></fieldset>',
            Fieldset::make()->legend('Legend')
        );
    }
}
